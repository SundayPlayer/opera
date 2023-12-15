<?php

declare(strict_types=1);

namespace App\Module\User\Repository;

interface ReadUserRepositoryContract
{
    public function show(int $id): ?object;
}
