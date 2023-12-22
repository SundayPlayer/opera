<?php

declare(strict_types=1);

namespace Module\User\Query;

class FindUserQuery extends UserQuery
{
    public function __construct(
        public readonly int $id,
    ) {
    }
}
