<?php

namespace Models;

class User extends Model
{

    protected $table = 'users';

    public function getByUsername(string $username): User
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE username = ?", [$username], true);
    }

    public function getByUserEmail(string $usernemail): User
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE email = ?", [$usernemail], true);
    }
}
