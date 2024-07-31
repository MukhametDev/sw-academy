<?php

namespace Framework\Models;

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
        $sql = "SELECT * FROM {$this->table}";
        return $this->db->fetchAll($sql);
    }

    public function findById(int $id): array
    {
        return $this->db->query("SELECT FROM {$this->table} WHERE id = :id", ["id" => $id])->fetch(\PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $fields = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})";
        return $this->db->execute($sql, $data);
    }

    public function update(int $id, array $data): bool
    {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "{$key} = :{$key}, ";
        }
        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE {$this->table} SET {$setClause} WHERE id = :id";

        $params = array_merge($data, ["id" => $id]);

        return $this->db->execute($sql, $params);
    }

    public function delete(int $id): bool
    {
        return $this->db->execute("DELETE FROM {$this->table} WHERE id = :id", ["id" => $id]);
    }

    public function search(array $conditions): array
    {
        $query = "SELECT * FROM {$this->table} WHERE ";
        $clauses = [];
        $params = [];

        foreach ($conditions as $field => $value) {
            if (is_array($value)) {
                $clauses[] = "{$field} LIKE :{$field}";
                $params[$field] = '%' . $value[0] . '%';
            } else {
                $clauses[] = "{$field} = :{$field}";
                $params[$field] = $value;
            }
        }

        $query .= implode(' AND ', $clauses);
        return $this->db->query($query, $params)->fetchAll(\PDO::FETCH_ASSOC);
    }
}
