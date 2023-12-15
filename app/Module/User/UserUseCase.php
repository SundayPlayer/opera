<?php

declare(strict_types=1);

namespace App\Module\User;

use App\Module\User\Command\CreateUserCommand;
use App\Module\User\Query\FindUserQuery;
use App\Module\User\Repository\ReadUserRepositoryContract;
use App\Module\User\Repository\WriteUserRepositoryContract;

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
