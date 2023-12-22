<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Module\User\Repository\ReadUserRepositoryContract;
use Module\User\Repository\WriteUserRepositoryContract;
use Module\User\ValueObject\Email;

class UserRepository implements ReadUserRepositoryContract, WriteUserRepositoryContract
{
    public function show(int $id): ?object
    {
        return DB::table('users')->find($id);
    }

    public function create(string $name, Email $email): int
    {
        return DB::table('users')->insertGetId([
            'name' => $name,
            'email' => $email->toNative(),
            'password' => 'test',
        ]);
    }
}
