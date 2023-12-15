<?php

declare(strict_types=1);

namespace App\Bus;

class CommandBus implements CommandBusInterface
{
    public function __construct(
        private readonly Dispatcher $bus,
    ) {
    }

    public function execute(Command $command): mixed
    {
        return $this->bus->dispatch($command);
    }

    public function register(array $map): void
    {
        foreach ($map as $key => $callable) {
            $handler = new MapperHandler($callable);
            $map[$key] = $handler;
        }

        $this->bus->map($map);
    }
}
