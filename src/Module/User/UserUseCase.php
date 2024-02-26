<?php

declare(strict_types=1);

namespace Module\User;

use Module\User\Entity\UnpersistedUserEntity;
use Module\User\Exception\InvalidFieldException;
use Module\User\Input\CreateUserCommand;
use Module\User\Input\ShowUserQuery;
use Module\User\Output\CreateUserResponse;
use Module\User\Output\ShowUserResponse;
use Module\User\Repository\ReadUserRepositoryContract;
use Module\User\Repository\WriteUserRepositoryContract;
use Module\User\ValueObject\Email;
use Module\User\ValueObject\UserId;
use Module\User\ValueObject\Username;

final class UserUseCase
{
    public function __construct(
        private readonly ReadUserRepositoryContract $readUserRepository,
        private readonly WriteUserRepositoryContract $writeUserRepository,
    ) {
    }

    public function show(ShowUserQuery $query): ShowUserResponse
    {
        if ($user = $this->readUserRepository->show(UserId::from($query->id))) {
            return ShowUserResponse::withUser(user: $user);
        } else {
            return ShowUserResponse::notFound();
        }
    }

    public function create(CreateUserCommand $command): CreateUserResponse
    {
        $response = new CreateUserResponse();

        $unpersistedUser = $this->validateCreateUserCommand($command, $response);

        if (!$unpersistedUser) {
            return $response;
        }

        $id = $this->writeUserRepository->create(
            name: $unpersistedUser->username,
            email: $unpersistedUser->email,
        );

        return $response->withUserId($id->toNative());
    }

    private function validateCreateUserCommand(CreateUserCommand $command, CreateUserResponse $response): ?UnpersistedUserEntity
    {
        try {
            $username = Username::from($command->name);
        } catch (InvalidFieldException $e) {
            $invalid = true;
            $response->addError($e->field, $e->error);
        }

        try {
            $email = Email::from($command->email);
        } catch (InvalidFieldException $e) {
            $invalid = true;
            $response->addError($e->field, $e->error);
        }

        if ($this->readUserRepository->findByEmail($email)) {
            $invalid = true;
            $response->addError('email', 'email-already-exist');
        }

        if ($invalid ?? false) {
            return null;
        }

        return new UnpersistedUserEntity($username, $email);
    }
}
