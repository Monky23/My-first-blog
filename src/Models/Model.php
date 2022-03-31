<?php

namespace Models;

use Database\DBConnection;

class Model
{
    protected $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }
}
