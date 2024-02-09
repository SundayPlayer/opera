<?php

declare(strict_types=1);

namespace Module\User\Entity;

use Module\User\ValueObject\Email;
use Module\User\ValueObject\UserId;
use Module\User\ValueObject\Username;

class SimpleUserEntity
{
    public function __construct(
        protected UserId $id,
        protected Username $username,
        protected Email $email,
    ) {
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getUsername(): Username
    {
        return $this->username;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}
