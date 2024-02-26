<?php

declare(strict_types=1);

namespace App\Bus;

use App\Contract\RequestInterface;

class CommandBus implements CommandBusInterface
{
    public function __construct(
        private readonly Dispatcher $bus,
    ) {
    }

    public function execute(RequestInterface $command): mixed
    {
        return $this->bus->dispatch($command);
    }

    /** @param array{0: class-string, 1: callable} $map */
    public function register(array $map): void
    {
        foreach ($map as $key => $callable) {
            $handler = new PresentableRequestHandler($callable);
            $map[$key] = $handler;
        }

        $this->bus->map($map);
    }
}
