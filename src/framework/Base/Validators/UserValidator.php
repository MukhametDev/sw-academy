<?php

namespace Framework\Validators;

class UserValidator extends Validator
{
    public static function validateUser(array $data): bool
    {
        $rules = [
            'username' => 'required|regex:/^[a-zA-Z0-9_]{3,20}$/',
            'email' => 'required|email',
            'password' => 'required|min_length:8|max_length:20',
        ];

        return parent::validate($data, $rules);
    }
}
