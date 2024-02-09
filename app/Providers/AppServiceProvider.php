<?php

declare(strict_types=1);

namespace App\Providers;

use App\Bus\CommandBus;
use App\Bus\CommandBusInterface;
use App\Bus\QueryBus;
use App\Bus\QueryBusInterface;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;
use Module\User\Input\CreateUserCommand;
use Module\User\Input\ShowUserQuery;
use Module\User\Repository\ReadUserRepositoryContract;
use Module\User\Repository\WriteUserRepositoryContract;
use Module\User\UserUseCase;

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
            ShowUserQuery::class => [UserUseCase::class, 'show'],
        ]);
    }
}
