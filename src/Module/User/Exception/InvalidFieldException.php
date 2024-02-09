<?php

declare(strict_types=1);

namespace Module\User\Exception;

class InvalidFieldException extends \Exception
{
    public function __construct(public readonly string $field, public readonly string $error)
    {
        parent::__construct('Error of type '.$this->error.' on field .'.$this->field);
    }
}
