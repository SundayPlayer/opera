<?php

declare(strict_types=1);

namespace Module\User\Output;

use Module\User\Entity\UserEntity;

class ShowUserResponse
{
    public function __construct(
        public readonly bool $userFound,
        public readonly ?UserEntity $user = null,
    ) {
    }

    public static function notFound(): self
    {
        return new self(userFound: false);
    }

    public static function withUser(UserEntity $user): self
    {
        return new self(userFound: true, user: $user);
    }
}
