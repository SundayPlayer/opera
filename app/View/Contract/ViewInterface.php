<?php

declare(strict_types=1);

namespace App\View\Contract;

/**
 * @template TViewModel
 */
interface ViewInterface
{
    /**
     * @param TViewModel $viewModel
     */
    public function generateView($viewModel);
}
