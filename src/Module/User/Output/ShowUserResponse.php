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
}
