<?php

namespace Models;

use Exception;

class User extends Model
{

    protected $table = 'users';

    public function getByUsername(string $username): User
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE username = ?", [$username], true);
    }

    public function getByUserEmail(string $useremail): User
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE email = ?", [$useremail], true);
    }

    public function userExistsByEmail(string $email): bool
    {
        return $this->getByUserEmail($email) instanceof User;
    }

    public function userExistsByUsername(string $username): bool
    {
        return $this->getByUsername($username) instanceof User;
    }

        public function unic(string $name)
    {
        if ($this->userExistsByEmail || $this->userExistsByUsername) {
            $e = new Exception("Ce pseudo ou ce mail sont déjà utiliser veuillez 
            choisir un autre pseudo ou une autre adresse email.");
            echo $e->getMessage();
        }
    }
}
