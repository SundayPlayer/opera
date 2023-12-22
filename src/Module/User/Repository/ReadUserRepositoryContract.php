<?php

declare(strict_types=1);

namespace Module\User\Repository;

interface ReadUserRepositoryContract
{
    public function show(int $id): ?object;
}
