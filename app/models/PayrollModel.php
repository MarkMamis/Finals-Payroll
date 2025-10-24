<?php
class PayrollModel extends Model
{
    protected $table = 'payroll_records';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
}
