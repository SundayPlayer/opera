<?php

declare(strict_types=1);

namespace App\Providers;

use App\Bus\CommandBusInterface;
use App\Bus\CommandBus;
use App\Bus\QueryBus;
use App\Bus\QueryBusInterface;
use App\Module\User\UserUseCase;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Module\User\Command\CreateUserCommand;
use App\Module\User\Query\FindUserQuery;
use App\Module\User\Repository\ReadUserRepositoryContract;
use App\Module\User\Repository\WriteUserRepositoryContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $singletons = [
            QueryBusInterface::class => QueryBus::class,
            CommandBusInterface::class => CommandBus::class,

            ReadUserRepositoryContract::class => UserRepository::class,
            WriteUserRepositoryContract::class => UserRepository::class,
        ];

        foreach ($singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /** @var CommandBusInterface $commandBus */
        $commandBus = app(CommandBusInterface::class);

        $commandBus->register([
            CreateUserCommand::class => [UserUseCase::class, 'create'],
        ]);

        /** @var QueryBusInterface $queryBus */
        $queryBus = app(QueryBusInterface::class);

        $queryBus->register([
            FindUserQuery::class => [UserUseCase::class, 'find'],
        ]);
    }
}
