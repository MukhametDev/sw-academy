<?php

namespace Framework;

use Framework\Models\Model;
use Framework\Base\Enums\Role;

class CUser extends Model
{
    protected string $table = "users";
    public function findById(int $id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        return $this->db->fetchAll($sql, ["id" => $id]);
    }
}
