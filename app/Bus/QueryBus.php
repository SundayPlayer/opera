<?php

declare(strict_types=1);

namespace App\Bus;

use App\Contract\RequestInterface;

class QueryBus implements QueryBusInterface
{
    public function __construct(
        private readonly Dispatcher $bus,
    ) {
    }

    public function ask(RequestInterface $query): mixed
    {
        return $this->bus->dispatch($query);
    }

    public function register(array $map): void
    {
        foreach ($map as $key => $callable) {
            $handler = new PresentableRequestHandler($callable);
            $map[$key] = $handler;
        }

        $this->bus->map($map);
    }
}
