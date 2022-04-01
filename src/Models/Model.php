<?php

namespace Models;

use Database\DBConnection;
use stdClass;

class Model
{
    protected $dbconnect;
    protected $table;

    public function __construct(DBConnection $dbconnect)
    {
        $this->dbconnect = $dbconnect;
    }

    public function getAll() : array
    {
        $stmt = $this->dbconnect->getPDO()->query("SELECT * FROM {$this->table} ORDER BY created_date DESC");
        return $stmt->fetchAll();
    }

    public function findById(int $id) : stdClass
    {
        $stmt = $this->dbconnect->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
