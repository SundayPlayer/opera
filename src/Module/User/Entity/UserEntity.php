<?php

declare(strict_types=1);

namespace Module\User\Entity;

use Module\User\ValueObject\Email;
use Module\User\ValueObject\UserId;
use Module\User\ValueObject\Username;

class UserEntity extends SimpleUserEntity
{
    public function __construct(
        UserId $id,
        Username $username,
        Email $email,
        protected \DateTimeImmutable $createdAt,
        protected \DateTimeImmutable $updatedAt,
    ) {
        parent::__construct($id, $username, $email);
    }

    public static function fromSimpleUserEntity(
        SimpleUserEntity $simpleUserEntity,
        \DateTimeImmutable $createdAt,
        \DateTimeImmutable $updatedAt
    ): self {
        return new self(
            id: $simpleUserEntity->id,
            username: $simpleUserEntity->username,
            email: $simpleUserEntity->email,
            createdAt: $createdAt,
            updatedAt: $updatedAt,
        );
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
