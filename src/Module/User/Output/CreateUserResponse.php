<?php

declare(strict_types=1);

namespace Module\User\Output;

class CreateUserResponse
{
    private ?int $userId = null;

    private array $errors = [];

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function withUserId(int $id): self
    {
        $this->userId = $id;

        return $this;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) !== 0;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError(string $fieldName, string $error): self
    {
        $this->errors[$fieldName] = $error;

        return $this;
    }
}
