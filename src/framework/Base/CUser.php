<?php

namespace Framework;

use Framework\Models\Model;
use Framework\Enums\CUserEnums as Role;
use Framework\Repository\UserRepository;

class CUser extends Model
{
    protected static string $repository = UserRepository::class;
    protected array $fiillable = ["username", "email", "password", "role_id"];
    public function getFillable(): array
    {
        return $this->fiillable;
    }

    public function setFillable(array $fillable): void
    {
        $this->fiillable = $fillable;
    }

    public static function create(array $data): bool
    {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        return parent::create($data);
    }

    // public static function findById(int $id): ?self
    // {
    //     $sql = "SELECT * FROM {static::$table} WHERE id = :id";
    //     $data = CDatabase::getInstance()->fetchAssoc($sql, ["id" => $id]);
    //     return !empty($data) ? new static($data) : null;
    // }

    public function hasRole(Role $role): bool
    {
        return $this->fiillable['role_id'] === (int) $role->value;
    }

    public function getRoleFromString(string $role): Role
    {
        switch ($role) {
            case '1':
                return Role::ADMIN;
            case '2':
                return Role::USER;
            default:
                throw new \Exception('Unknown role');
        }
    }
}
