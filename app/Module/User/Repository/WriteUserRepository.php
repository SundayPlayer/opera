<?php

declare(strict_types=1);

namespace App\Module\User\Repository;

use Illuminate\Support\Facades\DB;
use App\Module\User\ValueObject\Email;

class WriteUserRepository implements WriteUserRepositoryContract
{
    public function create(string $name, Email $email): int
    {
        return DB::table('users')->insertGetId([
            'name' => $name,
            'email' => $email->toNative(),
            'password' => 'test',
        ]);
    }
}
