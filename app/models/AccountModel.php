<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AccountModel extends Model
{
    protected $table       = 'accounts';
    protected $primary_key = 'id';
    protected $fillable    = ['username', 'password'];

    public function get_by_username($username)
    {
        return $this->find_by('username', $username);
    }
}