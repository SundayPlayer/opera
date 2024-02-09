<?php

declare(strict_types=1);

namespace App\View\User;

use App\Presentation\User\ShowUserHtmlViewModel;
use App\View\Contract\ViewInterface;
use Illuminate\View\View;

/**
 * @implements ViewInterface<ShowUserHtmlViewModel>
 */
class ShowUserHtmlView implements ViewInterface
{
    public function generateView($viewModel): View
    {
        return view('user.show', $viewModel);
    }
}
