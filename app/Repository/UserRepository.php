<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\User;
use Module\User\Entity\SimpleUserEntity;
use Module\User\Entity\UserEntity;
use Module\User\Repository\ReadUserRepositoryContract;
use Module\User\Repository\WriteUserRepositoryContract;
use Module\User\ValueObject\Email;
use Module\User\ValueObject\UserId;
use Module\User\ValueObject\Username;

class UserRepository implements ReadUserRepositoryContract, WriteUserRepositoryContract
{
    public function show(UserId $id): ?UserEntity
    {
        /** @var User $user */
        $user = User::query()->find($id->toNative());

        return $user?->toUserEntity();
    }

    public function create(Username $name, Email $email): UserId
    {
        $id = User::query()->insertGetId([
            'name' => $name->toNative(),
            'email' => $email->toNative(),
            'password' => 'test',
        ]);

        return UserId::from($id);
    }

    public function findByEmail(Email $email): ?SimpleUserEntity
    {
        /** @var User $user */
        $user = User::query()->first(['email' => $email->toNative()]);

        return $user?->toSimpleUserEntity();
    }
}
