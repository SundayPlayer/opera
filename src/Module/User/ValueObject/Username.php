<?php

declare(strict_types=1);

namespace Module\User\ValueObject;

use Module\User\Exception\InvalidFieldException;

class Username
{
    /** @throws InvalidFieldException */
    public function __construct(
        protected string $username,
    ) {
        $this->username = trim($this->username);

        if (strlen($this->username) === 0) {
            throw new InvalidFieldException('username', 'empty-username');
        }
    }

    /** @throws InvalidFieldException */
    public static function from(string $username): self|false
    {
        return new self($username);
    }

    public function toNative(): string
    {
        return $this->username;
    }
}
