<?php

declare(strict_types=1);

namespace App\Module\User\ValueObject;

use InvalidArgumentException;

class Email
{
    public function __construct(
        protected string $email,
    ) {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address provided');
        }
    }

    public static function from(string $email): self
    {
        return new self($email);
    }

    public function toNative(): string
    {
        return $this->email;
    }
}
