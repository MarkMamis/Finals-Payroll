<?php
class ProfileModel extends Model
{
    protected $table = 'profiles';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
}
