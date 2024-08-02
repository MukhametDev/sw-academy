<?php

namespace Framework\Validators;

abstract class Validator
{
    protected array $errors = [];
    protected array $rules = [];
    protected array $message = [];

    public static function getErrors(): array
    {
        return static::$errors;
    }

    protected static function applyRule(string $rule, $value): bool
    {
        list($ruleName, $ruleParam) = explode(':', $rule) + [null, null];

        switch ($ruleName) {
            case 'required':
                return !empty($value);
            case 'regex':
                return preg_match($ruleParam, $value);
            case 'min_length':
                return strlen($value) >= (int)$ruleParam;
            case 'max_length':
                return strlen($value) <= (int)$ruleParam;
            case 'email':
                return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
            default:
                return true;
        }
    }

    public static function validate(array $data, array $rules): bool
    {
        static::$errors = [];

        foreach ($rules as $field => $fieldRules) {
            $fieldRules = explode('|', $fieldRules);
            foreach ($fieldRules as $rule) {
                if (!static::applyRule($rule, $data[$field] ?? null)) {
                    static::$errors[$field][] = "Validation failed for $field with rule $rule";
                }
            }
        }

        return empty(static::$errors);
    }
}
