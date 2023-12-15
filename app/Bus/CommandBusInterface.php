<?php

declare(strict_types=1);

namespace App\Bus;

interface CommandBusInterface
{
    public function execute(Command $command): mixed;

    public function register(array $map): void;
}
