<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Payroll extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model(['PayrollModel', 'EmployeeModel']);
    }

    public function index()
    {
        $data['title'] = 'Payroll';
        $this->view('payroll/index', $data);
    }

    public function list()
    {
        $data['records'] = $this->PayrollModel->get_all();
        $this->view('payroll/list', $data);
    }

    public function view($id = null)
    {
        $data['record'] = $this->PayrollModel->find($id);
        $this->view('payroll/view', $data);
    }

    public function process()
    {
        // placeholder for processing payroll
        // Implement payroll calculations here
        echo 'Payroll processing not implemented yet.';
    }
}
