<?php
class UserModel extends Model
{
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_email($email)
    {
        return $this->db->table($this->table)->where('email', $email)->get();
    }
}
