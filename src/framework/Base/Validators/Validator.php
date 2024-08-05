<?php

namespace Framework\Validators;

use Framework\Traits\Errorable;

abstract class Validator
{
    use Errorable;

    protected array $rules = [];
    protected array $messages = [];

    public function setRules(array $rules = []): void
    {
        $this->rules = $rules;
    }

    public function setMessages(array $messages = []): void
    {
        $this->messages = $messages;
    }

    protected function applyRule(string $rule, $value): bool
    {
        list($ruleName, $ruleParam) = explode(':', $rule) + [null, null];

        $result = match ($ruleName) {
            'required' => !empty($value),
            'regex' => preg_match($ruleParam, $value),
            'min_length' => strlen($value) >= (int)$ruleParam,
            'max_length' => strlen($value) <= (int)$ruleParam,
            'email' => filter_var($value, FILTER_VALIDATE_EMAIL) !== false,
            default => true
        };
        return $result;
    }

    public function validateField($field, $value): void
    {
        if (!isset($this->rules[$field])) {
            return;
        }

        $fieldRules = $this->rules[$field];
        foreach (explode('|', $fieldRules) as $rule) {
            list($ruleName, $ruleParam) = explode(':', $rule) + [null, null];
            if (!$this->applyRule($rule, $value)) {
                $message = $this->messages[$rule] ?? "Поле {$field} не прошло валидацию.";
                $this->addError($field, new \Exception($message));
            }
        }
    }

    public function validate(array $data): bool
    {
        $this->clearErrors();

        foreach ($data as $field => $value) {
            $this->validateField($field, $value);
        }
        return !$this->hasErrors();
    }
}
