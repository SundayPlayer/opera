<?php

declare(strict_types=1);

namespace App\Module\User\Repository;

use App\Module\User\ValueObject\Email;

interface WriteUserRepositoryContract
{
    public function create(string $name, Email $email): int;
}
