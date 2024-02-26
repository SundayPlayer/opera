<?php

declare(strict_types=1);

namespace App\Contract;

use App\Presentation\Contract\PresenterInterface;

interface RequestInterface
{
    public function presenter(): ?PresenterInterface;
}
