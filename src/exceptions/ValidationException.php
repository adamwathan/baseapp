<?php

use Illuminate\Support\MessageBag;

class ValidationException extends Exception
{
    protected $errors;

    public function __construct(MessageBag $errors)
    {
        $this->errors = $errors;
    }

    public function errors()
    {
        return $this->errors;
    }
}
