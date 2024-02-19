<?php

declare(strict_types=1);

namespace Module\User\Input;

use App\Presentation\Contract\PresenterInterface;
use App\Presentation\User\UserCreatedHtmlViewModel;
use Module\User\Output\CreateUserResponse;

class CreateUserCommand extends UserCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {
    }

    /**
     * @var ?PresenterInterface<CreateUserResponse, UserCreatedHtmlViewModel>
     */
    protected ?PresenterInterface $presenter = null;

    /**
     * @param PresenterInterface<CreateUserResponse, UserCreatedHtmlViewModel> $presenter
     */
    public function withPresenter(PresenterInterface $presenter): self
    {
        $this->presenter = $presenter;

        return $this;
    }

    /**
     * @return ?PresenterInterface<CreateUserResponse, UserCreatedHtmlViewModel>
     */
    public function presenter(): ?PresenterInterface
    {
        return $this->presenter;
    }
}
