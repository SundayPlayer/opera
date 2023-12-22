<?php

declare(strict_types=1);

namespace Module\User\Repository;

use Module\User\ValueObject\Email;

interface WriteUserRepositoryContract
{
    public function create(string $name, Email $email): int;
}
