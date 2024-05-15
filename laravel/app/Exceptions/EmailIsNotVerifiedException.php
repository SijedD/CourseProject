<?php

namespace App\Exceptions;

class EmailIsNotVerifiedException extends ApiException
{
    public function __construct($code = 422, $message = 'Сначала подтвердите email')
    {
        parent::__construct($code, $message);
    }
}
