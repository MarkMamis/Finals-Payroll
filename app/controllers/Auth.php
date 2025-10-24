<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth extends Controller
{
    protected $profileModel;
    protected $userModel;

    public function __construct()
    {
        parent::__construct();
        // ensure models/libraries are available
        $this->call->model(['ProfileModel', 'UserModel']);
        $this->profileModel = new ProfileModel();
        $this->userModel = new UserModel();
        // session is autoloaded via autoload.php but keep a reference
        $this->session = $this->properties['session'] ?? load_class('Session', 'libraries');
    }

    // Show login form
    public function show()
    {
        $this->call->view('auth/login/index');
    }

    // Handle login POST
    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $this->session->set_flashdata('error', 'Email and password are required');
            header('Location: /login');
            exit;
        }

    // Attempt to find user by email in `users` table
    $user = $this->userModel->get_by_email($email);

        if (!$user) {
            $this->session->set_flashdata('error', 'Invalid credentials');
            header('Location: /login');
            exit;
        }

        // Check password. Support both plain and password_hash storage.
        $stored = $user['password'] ?? $user->password ?? null;

        $ok = false;
        if ($stored) {
            if (password_needs_rehash($stored, PASSWORD_DEFAULT) || password_verify($password, $stored)) {
                // if stored is hashed, verify will succeed; password_needs_rehash will be true
                $ok = password_verify($password, $stored) || ($stored === $password);
            } else {
                // fallback plain comparison
                $ok = ($stored === $password);
            }
        }

        if (!$ok) {
            $this->session->set_flashdata('error', 'Invalid credentials');
            header('Location: /login');
            exit;
        }

        // Authentication successful - set session
        $user_data = is_array($user) ? $user : (array)$user;
        unset($user_data['password']);
        // Allow role override from login form for demo purposes (only in development)
        $posted_role = trim($_POST['role'] ?? '');
        if (!empty($posted_role) && strtolower(config_item('ENVIRONMENT') ?? '') === 'development') {
            $user_data['role'] = $posted_role;
        }

        $this->session->set_userdata('user', $user_data);

        // redirect to a role-appropriate page
        $role = $user_data['role'] ?? ($user_data->role ?? 'employee');
        switch ($role) {
            case 'admin':
                $redirect = '/admin/';
                break;
            case 'hr':
                $redirect = '/hr/';
                break;
            default:
                $redirect = '/employee/';
        }

        header('Location: ' . $redirect);
        exit;
    }

    // Show signup form
    public function signup()
    {
        $this->call->view('auth/signup/index');
    }

    // Handle registration POST
    public function register()
    {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $password_confirm = $_POST['password_confirm'] ?? '';
        $role = strtolower(trim($_POST['role'] ?? 'employee'));
        if (!in_array($role, ['employee','hr','admin'])) {
            $role = 'employee';
        }

        if (empty($name) || empty($email) || empty($password)) {
            $this->session->set_flashdata('error', 'Name, email and password are required');
            header('Location: /signup');
            exit;
        }

        if ($password !== $password_confirm) {
            $this->session->set_flashdata('error', 'Passwords do not match');
            header('Location: /signup');
            exit;
        }

        // Check if email exists in users table
        $exists = $this->userModel->get_by_email($email);
        if ($exists) {
            $this->session->set_flashdata('error', 'Email already registered');
            header('Location: /signup');
            exit;
        }

        // Create new user record in `users` table
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $uid = $this->uuidv4();
        $data = [
            'id' => $uid,
            'username' => $name,
            'email' => $email,
            'password' => $hashed,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s')
        ];

        // insert via UserModel -> use db table insert (Model->insert returns last_id which may not apply to CHAR PK)
        $this->userModel->insert($data);

        // Fetch the created user
        $user = $this->userModel->get_by_email($email);
        $user_data = is_array($user) ? $user : (array)$user;
        unset($user_data['password']);
        $this->session->set_userdata('user', $user_data);

        // Redirect based on role
        $role = $user_data['role'] ?? ($user_data->role ?? 'employee');
        switch ($role) {
            case 'admin':
                $redirect = '/admin';
                break;
            case 'hr':
                $redirect = '/hr';
                break;
            default:
                $redirect = '/';
        }

        header('Location: ' . $redirect);
        exit;
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        header('Location: /login');
        exit;
    }

    // Simple UUID v4 generator (returns 36-char string)
    protected function uuidv4()
    {
        $data = random_bytes(16);
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
