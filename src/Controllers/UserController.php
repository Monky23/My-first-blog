<?php

namespace Controllers;

use Models\User;
use Validation\Validator;
use Exception;

class UserController extends Controller
{

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /login');
            exit;
        }

        $user = (new User($this->getDB()))->getByUsername($_POST['username']);
        //if (!isset($user))
        //throw new Exception("cet identifiant est inconnu");

        if (password_verify($_POST['password'], $user->password)) {
            if ($_SESSION['auth'] = (int) $user->admin) {
                return header('Location: /admin/posts');
            } elseif ($_SESSION['auth'] = (int) $user->subscriber) {
                return header('Location: /');
            }
        } else {
            return header('Location: /login');
        }
    }

    public function logout()
    {
        session_destroy();

        return header('Location: /');
    }

    public function registration()
    {
        return $this->view('subscriber.registration');
    }

    /*private function _checkAndSanitizeStr(string $str, int $minLen = 3): string
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

        /*if ($this->userExists($dto["email"]))
            throw new Exception("Cette adresse mail est déjà utlisée pour un compte existant");*/

    /*
        [
            "username" => "nom",
            "email" => "email",
            "password" => "Hashedpassword"
        ]
        
        return $dto;
    }*/

    public function registrationPost()
    {
        $validator = new Validator($_POST);

        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required'],
            'password' => ['required'],
            'password_retype' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /registration');
            exit;
        }
        $user = new User($this->getDB());
        $array = $_POST;
        $array["password"] = password_hash($array["password_retype"], PASSWORD_ARGON2I);
        unset($array["password_retype"]);
        $result = $user->create($array);
        if ($result) {
            return header('Location: /login');
        }
    }
}
