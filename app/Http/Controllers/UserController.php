<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Bus\CommandBusInterface;
use App\Bus\QueryBusInterface;
use App\Http\Requests\CreateUserRequest;
use App\Presentation\User\ShowUserHtmlPresenter;
use App\Presentation\User\UserCreatedHtmlPresenter;
use App\View\User\CreatedUserHtmlView;
use App\View\User\ShowUserHtmlView;
use Illuminate\View\View;
use Module\User\Input\CreateUserCommand;
use Module\User\Input\ShowUserQuery;

class UserController extends Controller
{
    public function __construct(
        private readonly QueryBusInterface $queryBus,
        private readonly CommandBusInterface $commandBus,
    ) {
    }

    public function store(CreateUserRequest $request): View
    {
        $this->commandBus->execute(
            (new CreateUserCommand(
                name: $request->get('name'),
                email: $request->get('email'),
            ))
            ->withPresenter($presenter = new UserCreatedHtmlPresenter())
        );

        return (new CreatedUserHtmlView())->generateView($presenter->getViewModel());
    }

    public function show(int $id): View
    {
        $this->queryBus->ask(
            (new ShowUserQuery(
                $id,
            ))
            ->withPresenter($presenter = new ShowUserHtmlPresenter())
        );

        return (new ShowUserHtmlView())->generateView($presenter->getViewModel());
    }
}
