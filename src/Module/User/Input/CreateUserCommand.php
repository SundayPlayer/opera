<?php

declare(strict_types=1);

namespace Module\User\Input;

use App\Presentation\Contract\PresenterInterface;

class CreateUserCommand extends UserCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {
    }

    protected ?PresenterInterface $presenter = null;

    public function withPresenter(PresenterInterface $presenter): self
    {
        $this->presenter = $presenter;

        return $this;
    }

    public function presenter(): ?PresenterInterface
    {
        return $this->presenter;
    }
}
