<?php

declare(strict_types=1);

namespace App\View\User;

use App\Presentation\User\UserCreatedHtmlViewModel;
use App\View\Contract\ViewInterface;
use Illuminate\Contracts\View\View;

/**
 * @implements ViewInterface<UserCreatedHtmlViewModel>
 */
class CreatedUserHtmlView implements ViewInterface
{
    public function generateView($viewModel): View
    {
        return view('user.created', $viewModel);
    }
}
