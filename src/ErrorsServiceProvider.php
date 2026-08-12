<?php

namespace LaravelUx\Errors;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Laravel\Head\ErrorPages;
use Laravel\Head\Facades\Head;
use LaravelUx\Errors\Exceptions\Handler;

class ErrorsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ExceptionHandler::class, Handler::class);
    }

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->configureHead();
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/errors'),
        ], 'laravel-ux-errors');
    }

    protected function configureHead(): void
    {
        Head::errors(function (ErrorPages $errors): void {
            $errors->defaults(
                title: 'Something Went Wrong',
                description: 'The request could not be completed.',
                robots: 'noindex, nofollow',
                viewport: 'width=device-width, initial-scale=1',
            );

            $errors->status(
                401,
                title: 'Unauthorized',
                description: 'You need to log in to access this page.',
            );

            $errors->status(
                402,
                title: 'Payment Required',
                description: 'Payment is required to proceed.',
            );

            $errors->status(
                403,
                title: 'Forbidden',
                description: 'You do not have permission to view this page.',
            );

            $errors->status(
                404,
                title: 'Not Found',
                description: 'The page you are looking for could not be found.',
            );

            $errors->status(
                419,
                title: 'Page Expired',
                description: 'The page expired due to inactivity. Please try again.',
            );

            $errors->status(
                429,
                title: 'Too Many Requests',
                description: 'You have sent too many requests in a short period. Please try again later.',
            );

            $errors->status(
                500,
                title: 'Server Error',
                description: 'Something went wrong on our end. Please try again later.',
            );

            $errors->status(
                503,
                title: 'Service Unavailable',
                description: 'The service is temporarily unavailable. Please try again later.',
            );
        });
    }
}
