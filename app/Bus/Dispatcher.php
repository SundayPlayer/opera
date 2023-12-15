<?php

declare(strict_types=1);

namespace App\Bus;

class Dispatcher extends \Illuminate\Bus\Dispatcher
{
    public function getCommandHandler($command)
    {
        if ($this->hasCommandHandler($command)) {
            return $this->handlers[get_class($command)];
        }

        return false;
    }
}
