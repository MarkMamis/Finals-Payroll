<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Hr extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model(['EmployeeModel', 'AttendanceModel']);
    }

    public function dashboard()
    {
        // Ensure user has HR or Admin role before showing dashboard
        $user = $this->session->userdata('user') ?? null;
        $role = is_array($user) ? ($user['role'] ?? null) : ($user->role ?? null);

        if (!in_array($role, ['hr', 'admin'])) {
            // Not authorized
            $this->session->set_flashdata('error', 'Access denied. HR area is restricted.');
            header('Location: /');
            exit;
        }

        $data['title'] = 'HR Dashboard';
        $this->call->view('hr/dashboard', $data);
    }
}
