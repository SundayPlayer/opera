<?php

declare(strict_types=1);

namespace Module\User\Input;

use App\Presentation\Contract\PresenterInterface;

class ShowUserQuery extends UserQuery
{
    public function __construct(
        public readonly int $id,
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
