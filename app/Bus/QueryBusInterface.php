<?php

declare(strict_types=1);

namespace App\Bus;

use App\Contract\RequestInterface;

interface QueryBusInterface
{
    public function ask(RequestInterface $query): mixed;

    public function register(array $map): void;
}
