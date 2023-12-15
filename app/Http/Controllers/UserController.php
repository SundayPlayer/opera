<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Bus\CommandBusInterface;
use App\Bus\QueryBusInterface;
use App\Http\Requests\CreateUserRequest;
use App\Module\User\Command\CreateUserCommand;
use App\Module\User\Query\FindUserQuery;
use App\Module\User\ValueObject\Email;

class UserController extends Controller
{
    public function __construct(
        private readonly QueryBusInterface $queryBus,
        private readonly CommandBusInterface $commandBus,
    ) {
    }

    public function store(CreateUserRequest $request): array
    {
        $id = $this->commandBus->execute(
            new CreateUserCommand(
                name: $request->get('name'),
                email: Email::from($request->get('email')),
            )
        );

        return ['id' => $id];
    }

    public function show(int $id)
    {
        return $this->queryBus->ask(
            new FindUserQuery($id),
        );
    }
}
