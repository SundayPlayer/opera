<?php

declare(strict_types=1);

namespace App\Presentation\Contract;

/**
 * @template TResponse
 * @template TViewModel
 */
interface PresenterInterface
{
    /**
     * @param TResponse $response
     */
    public function present($response): void;

    /**
     * @return TViewModel
     */
    public function getViewModel();
}
