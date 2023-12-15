<?php

declare(strict_types=1);

namespace App\Module\User\Command;

use App\Module\User\ValueObject\Email;

class CreateUserCommand extends UserCommand
{
    public function __construct(
        public readonly string $name,
        public readonly Email $email,
    ) {
    }
}
