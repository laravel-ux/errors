<?php

namespace LaravelUx\Errors\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as IlluminateHandler;

class Handler extends IlluminateHandler
{
    protected function registerErrorViewPaths(): void
    {
        (new RegisterErrorViewPaths)();
    }
}
