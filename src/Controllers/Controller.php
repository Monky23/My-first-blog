<?php

namespace Controllers;

use Database\DBConnection;

class Controller
{
    protected $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    protected function getDB()
    {
        return $this-> db;
    }
}