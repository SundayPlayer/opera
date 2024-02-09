<?php

declare(strict_types=1);

namespace Module\User\Repository;

use Module\User\ValueObject\Email;
use Module\User\ValueObject\UserId;
use Module\User\ValueObject\Username;

interface WriteUserRepositoryContract
{
    public function create(Username $name, Email $email): UserId;
}
