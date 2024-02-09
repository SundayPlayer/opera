<?php

declare(strict_types=1);

namespace Module\User\ValueObject;

use Module\User\Exception\InvalidFieldException;

class Email
{
    /** @throws InvalidFieldException */
    public function __construct(
        protected string $email,
    ) {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidFieldException('email', 'malformed-email');
        }
    }

    /** @throws InvalidFieldException */
    public static function from(string $email): self
    {
        return new self($email);
    }

    public function toNative(): string
    {
        return $this->email;
    }
}
