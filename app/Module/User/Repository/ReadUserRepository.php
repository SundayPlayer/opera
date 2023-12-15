<?php

declare(strict_types=1);

namespace App\Module\User\Repository;

use Illuminate\Support\Facades\DB;

class ReadUserRepository implements ReadUserRepositoryContract
{
    public function show(int $id): ?object
    {
        return DB::table('users')->find($id);
    }
}
