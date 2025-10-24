<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Attendance extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model(['AttendanceModel', 'EmployeeModel']);
    }

    public function index()
    {
        $data['title'] = 'My Attendance';
        $this->view('/attendance/index', $data);
    }

    public function clock()
    {
        // simple clock in/out placeholder
        echo json_encode(['status' => 'ok', 'message' => 'Clock recorded']);
    }

    public function history()
    {
        $data['records'] = $this->AttendanceModel->get_all();
        $this->view('attendance/history', $data);
    }
}
