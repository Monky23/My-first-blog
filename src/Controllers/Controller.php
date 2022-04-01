<?php

namespace Controllers;

use Database\DBConnection;

class Controller
{
    protected $dbconnect;

    public function __construct(DBConnection $dbconnect)
    {
        $this->dbconnect = $dbconnect;
    }

    protected function getDB()
    {
        return $this-> dbconnect;
    }
}