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

        $rule = match ($ruleName) {
            'required' => !empty($value),
            'regex' => preg_match($ruleParam, $value),
            'min_length' => strlen($value) >= (int)$ruleParam,
            'max_length' => strlen($value) <= (int)$ruleParam,
            'email' => filter_var($value, FILTER_VALIDATE_EMAIL) !== false,
            default => true
        };
        return $rule;
    }

    public static function validate(array $data, array $rules): bool
    {
        static::$errors = [];

        foreach ($rules as $field => $fieldRules) {
            $fieldRules = explode('|', $fieldRules);
            foreach ($fieldRules as $rule) {
                if (!static::applyRule($rule, $data[$field] ?? null)) {
                    static::$errors[$field][] = $rule;
                }
            }
        }

        return empty(static::$errors);
    }
}
