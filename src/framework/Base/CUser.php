<?php

namespace Framework;

use Framework\Models\Model;
use Framework\Enums\CUserEnums as Role;
use Framework\Repository\UserRepository;

class CUser extends Model
{
    protected static string $repository = UserRepository::class;
    protected array $fiillable = ["username", "email", "password", "role_id"];
}
