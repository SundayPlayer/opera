<?php

declare(strict_types=1);

namespace App\Bus;

class MapperHandler
{
    public function __construct(
        private readonly array $handler,
    ) {
    }

    public function handle(Command|Query $command): mixed
    {
        return ([app($this->handler[0]), $this->handler[1]])($command);
    }
}
