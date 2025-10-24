<?php
class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
}
