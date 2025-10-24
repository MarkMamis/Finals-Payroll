<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model(['UserModel']);
    }

    protected function require_admin()
    {
        $user = $this->session->userdata('user') ?? null;
        $role = is_array($user) ? ($user['role'] ?? null) : ($user->role ?? null);
        if ($role !== 'admin') {
            $this->session->set_flashdata('error', 'Admin area only');
            header('Location: /');
            exit;
        }
    }

    public function dashboard()
    {
        $this->require_admin();
        $this->call->view('/admin/dashboard');
    }

    public function users()
    {
        $this->require_admin();
        $users = $this->UserModel->all();
        $this->call->view('/admin/users', ['users' => $users]);
    }

    public function settings()
    {
        $this->require_admin();
        $this->call->view('/admin/settings');
    }
}
