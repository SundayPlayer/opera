<?php

declare(strict_types=1);

namespace Module\User\Repository;

use Module\User\Entity\SimpleUserEntity;
use Module\User\Entity\UserEntity;
use Module\User\ValueObject\Email;
use Module\User\ValueObject\UserId;

interface ReadUserRepositoryContract
{
    public function show(UserId $id): ?UserEntity;

    public function findByEmail(Email $email): ?SimpleUserEntity;
}
