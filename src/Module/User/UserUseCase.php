<?php

declare(strict_types=1);

namespace Module\User;

use Module\User\Command\CreateUserCommand;
use Module\User\Query\FindUserQuery;
use Module\User\Repository\ReadUserRepositoryContract;
use Module\User\Repository\WriteUserRepositoryContract;

final class UserUseCase
{
    public function __construct(
        private readonly ReadUserRepositoryContract $readUserRepository,
        private readonly WriteUserRepositoryContract $writeUserRepository,
    ) {
    }

    public function find(FindUserQuery $query)
    {
        return $this->readUserRepository->show($query->id);
    }

    public function create(CreateUserCommand $command)
    {
        return $this->writeUserRepository->create(
            name: $command->name,
            email: $command->email,
        );
    }
}
