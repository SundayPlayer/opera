<?php

declare(strict_types=1);

namespace Module\User\Command;

use Module\User\ValueObject\Email;

class CreateUserCommand extends UserCommand
{
    public function __construct(
        public readonly string $name,
        public readonly Email $email,
    ) {
    }
}
