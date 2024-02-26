<?php

declare(strict_types=1);

namespace App\Bus;

use App\Contract\RequestInterface;

class PresentableRequestHandler
{
    public function __construct(
        /** @var array{0: class-string, 1: string} */
        private readonly array $handler,
    ) {
    }

    public function handle(RequestInterface $command): void
    {
        $response = ([app($this->handler[0]), $this->handler[1]])($command);

        $command->presenter()?->present($response);
    }
}
