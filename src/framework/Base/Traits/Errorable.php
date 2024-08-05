<?php

namespace Framework\Traits;

trait Errorable
{
    protected static $errors = [];

    public function addError(string $field, \Exception $error): void
    {
        static::$errors[$field][] = $error;
    }

    public function getErrors(): array
    {
        return static::$errors;
    }

    public function clearErrors(): void
    {
        static::$errors = [];
    }

    public function hasErrors(): bool
    {
        return !empty(static::$errors);
    }
}
