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


    public function registrationPost()
    {
        $validator = new Validator($_POST);

        $errors = $validator->validate([
            'username' => ['required', 'min:3', 'onlyString'],
            'email' => ['required', 'onlyString', 'checkMail'],
            'password' => ['required', 'onlyString'],
            'password_retype' => ['required', 'onlyString']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /registration');
            exit;
        }
        $user = new User($this->getDB());
        $array = $_POST;
        if ($array["password"] === $array["password_retype"]) {
            $array["password"] = password_hash($array["password"], PASSWORD_ARGON2I);
            unset($array["password_retype"]);
        } else {
            throw new Exception('les deux mots de passe doivent être identiques');
        }
        $result = $user->create($array);
        if ($result) {
            return header('Location: /login');
        }
    }
}
