<?php

declare(strict_types=1);

namespace App\Bus;

class QueryBus implements QueryBusInterface
{
    public function __construct(
        private readonly Dispatcher $bus,
    ) {
    }

    public function ask(Query $query): mixed
    {
        return $this->bus->dispatch($query);
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
