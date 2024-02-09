<?php

declare(strict_types=1);

namespace Module\User\ValueObject;

class UserId
{
    public function __construct(
        protected readonly int $id,
    ) {
    }

    public static function from(int $id): self
    {
        return new self($id);
    }

    public function toNative(): int
    {
        return $this->id;
    }
}
