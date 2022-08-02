<?php

namespace Controllers;

use Database\DBConnection;
use Exception;

abstract class Controller
{

    protected $db;

    public function __construct(DBConnection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }

    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require sprintf("%s%s", VIEWS, 'layout.php');
    }

    protected function getDB()
    {
        return $this->db;
    }

    /**
     * @throws Exception
     */
    protected function isAdmin(): bool
    {        
        if (isset($_SESSION['role']) && $_SESSION['role'] === "admin")
            return true;

        //throw new Exception("Vous n'êtes pas admin");
    }

    protected function isSubscriber(): bool
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] === "sub") {
            return true;
        } else {
            return header('Location: /login');
        }
    }
}
