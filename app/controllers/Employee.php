<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Employee extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model(['EmployeeModel', 'ProfileModel']);
    }

    public function index()
    {
        $data['title'] = 'Employees';
        // Model::all() is the framework method that returns all records
        $data['employees'] = $this->EmployeeModel->all();
        $this->call->view('/employees/index', $data);
    }

    public function view($id = null)
    {
        $data['employee'] = $this->EmployeeModel->find($id);
        $this->call->view('/employees/view', $data);
    }

    public function create()
    {
        $this->call->view('/employees/create');
    }

    public function store()
    {
        // store new employee - placeholder
        echo 'Store employee - not implemented.';
    }

    public function dashboard()
    {
        // Gather simple placeholder data for the dashboard. Replace with real queries if needed.
        $data = [];
        $data['title'] = 'Employee Dashboard';
        $data['last_clock_in'] = '09:00 AM';
        $data['hours_this_week'] = 42.5;
        $data['hours_change'] = '+2.5 hrs';
        $data['monthly_pay'] = '$6,000';
        $data['attendance'] = [
            'present' => 6,
            'late' => 1,
            'absent' => 0
        ];

        $this->call->view('employee/dashboard', $data);
    }
}
