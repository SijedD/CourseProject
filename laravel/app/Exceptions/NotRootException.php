<?php

namespace App\Exceptions;

class NotRootException extends ApiException
{
    public function __construct($code = 403, $message = 'Запрещено в доступе')
    {
        parent::__construct($code, $message);
    }
}
