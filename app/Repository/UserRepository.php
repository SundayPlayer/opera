<?php

declare(strict_types=1);

namespace App\Repository;

use App\Module\User\Repository\ReadUserRepositoryContract;
use App\Module\User\Repository\WriteUserRepositoryContract;
use App\Module\User\ValueObject\Email;
use Illuminate\Support\Facades\DB;

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
