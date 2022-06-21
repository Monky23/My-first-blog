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

    public function userExists(string $email): bool
    {
        return $this->getByUserEmail($email) instanceof User;
    }

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);

    }

    /*private function _checkAndSanitizeStr(string $str, int $minLen = 10): string
    {
        if (empty($str) || strlen($str) < $minLen || is_string($str))
            throw new Exception("Vérifier les données");
        return htmlspecialchars($str);
    }*/

    /*private function prepareDataForUserCreation(): array
    {

        $dto = [];
        foreach ($_POST as $key => $value)
            $dto[$key] = $this->_checkAndSanitizeStr($value);

        if ($dto["password"] !== $dto["password_retype"])
            throw new Exception("Les deux mots de passes doivent être identiques");
        $dto["password"] = password_hash($dto["password_retype"], PASSWORD_ARGON2I);
        unset($dto["password_retype"]);

        if (!filter_var($dto["email"], FILTER_VALIDATE_EMAIL))
            throw new Exception("Veuillez saisir une adresse mail valide");

        if ($this->userExists($dto["email"]))
            throw new Exception("Cette adresse mail est déjà utlisée pour un compte existant");

        /*
        [
            "username" => "nom",
            "email" => "email",
            "password" => "Hashedpassword"
        ]
        */
        /*return $dto;
    }*/



    public function createUser()
    {
        //not implented
    }
}
