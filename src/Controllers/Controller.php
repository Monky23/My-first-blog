<?php

namespace Controllers;

use Database\DBConnection;

abstract class Controller
{

    protected $dbconnect;

    public function __construct(DBConnection $dbconnect)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $dbconnect;
    }

    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        if ($params) {
            $params = extract($params);
        }
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    protected function getDB()
    {
        return $this->db;
    }

    protected function isAdmin()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) {
            return true;
        } else {
            return header('Location: /login');
        }
    }
}