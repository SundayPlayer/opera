<?php

declare(strict_types=1);

namespace App\Presentation\User;

class UserCreatedHtmlViewModel
{
    public function __construct(
        public readonly int $statusCode,
        public readonly string $documentTitle,
        public readonly bool $success,
        public readonly array $errors,
        public readonly ?int $userId,
    ) {
    }
}
