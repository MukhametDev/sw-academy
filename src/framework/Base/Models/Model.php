<?php

namespace Framework\Base\Models;

use Framework\CDatabase;

class Model
{
    protected CDatabase $db;
    protected string $table;

    public function __construct(CDatabase $db)
    {
        $this->db = $db;
    }

    public function findAll(): array
    {
        return $this->db->query("SELECT * FROM {$this->table}")->fetchAll(\PDO::FETCH_ASSOC);
    }
}
