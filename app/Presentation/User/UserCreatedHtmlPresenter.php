<?php

declare(strict_types=1);

namespace App\Presentation\User;

use App\Presentation\Contract\PresenterInterface;
use Module\User\Output\CreateUserResponse;

/**
 * @implements PresenterInterface<CreateUserResponse, UserCreatedHtmlViewModel>
 */
class UserCreatedHtmlPresenter implements PresenterInterface
{
    private UserCreatedHtmlViewModel $viewModel;

    public function present($response): void
    {
        $success = !$response->hasErrors();

        $this->viewModel = new UserCreatedHtmlViewModel(
            statusCode: $success ? 201 : 422,
            documentTitle: $success ? 'User Created' : 'Creation Failed',
            success: $success,
            errors: $response->getErrors(),
            userId: $response->getUserId(),
        );
    }

    public function getViewModel(): UserCreatedHtmlViewModel
    {
        return $this->viewModel;
    }
}
