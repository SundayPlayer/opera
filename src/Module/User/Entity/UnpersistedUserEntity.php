<?php

declare(strict_types=1);

namespace Module\User\Entity;

use Module\User\ValueObject\Email;
use Module\User\ValueObject\Username;

class UnpersistedUserEntity
{
    public function __construct(
        public readonly Username $username,
        public readonly Email $email,
    ) {
    }
}
