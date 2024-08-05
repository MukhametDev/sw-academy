<?php

namespace Framework\Validators;

use Framework\Validators\Validator;

class UserValidator extends Validator
{
    public function setRules(array $rules = []): void
    {
        parent::setRules([
            'name' => 'required|min_length:3',
            'email' => 'required|email',
            'password' => 'required|min_length:8',
        ]);
    }

    public function setMessages(array $messages = []): void
    {
        parent::setMessages([
            'required' => 'Это поле обязательно для заполнения.',
            'min_length' => 'Это поле должно содержать минимум :param символов.',
            'email' => 'Это поле должно быть действительным email адресом.',
        ]);
    }

    public function validate(array $data): bool
    {
        $this->setRules();
        $this->setMessages();
        return parent::validate($data);
    }
}
