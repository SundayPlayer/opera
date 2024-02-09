<?php

declare(strict_types=1);

namespace App\Presentation\User;

use App\Presentation\Contract\PresenterInterface;
use Module\User\Output\ShowUserResponse;

/**
 * @implements PresenterInterface<ShowUserResponse, ShowUserHtmlViewModel>
 */
class ShowUserHtmlPresenter implements PresenterInterface
{
    private ShowUserHtmlViewModel $viewModel;

    public function present($response): void
    {
        $this->viewModel = new ShowUserHtmlViewModel(
        );
    }

    public function getViewModel(): ShowUserHtmlViewModel
    {
        return $this->viewModel;
    }
}
