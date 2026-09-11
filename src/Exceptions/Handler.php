<?php

declare(strict_types=1);

namespace LaravelUx\Errors\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as IlluminateHandler;
use Laravel\Head\Facades\Head;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends IlluminateHandler
{
    protected function renderHttpException(HttpExceptionInterface $e): Response
    {
        Head::status($e->getStatusCode());

        return parent::renderHttpException($e);
    }

    protected function registerErrorViewPaths(): void
    {
        (new RegisterErrorViewPaths)();
    }
}
