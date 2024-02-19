<?php

declare(strict_types=1);

namespace Module\User\Input;

use App\Presentation\Contract\PresenterInterface;
use App\Presentation\User\ShowUserHtmlViewModel;
use Module\User\Output\ShowUserResponse;

class ShowUserQuery extends UserQuery
{
    public function __construct(
        public readonly int $id,
    ) {
    }

    /**
     * @var ?PresenterInterface<ShowUserResponse, ShowUserHtmlViewModel>
     */
    protected ?PresenterInterface $presenter = null;

    /**
     * @param PresenterInterface<ShowUserResponse, ShowUserHtmlViewModel> $presenter
     */
    public function withPresenter(PresenterInterface $presenter): self
    {
        $this->presenter = $presenter;

        return $this;
    }

    /**
     * @return ?PresenterInterface<ShowUserResponse, ShowUserHtmlViewModel>
     */
    public function presenter(): ?PresenterInterface
    {
        return $this->presenter;
    }
}
