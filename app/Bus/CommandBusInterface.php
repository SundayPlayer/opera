<?php

declare(strict_types=1);

namespace App\Bus;

use App\Contract\RequestInterface;

interface CommandBusInterface
{
    public function execute(RequestInterface $command): mixed;

    public function register(array $map): void;
}
