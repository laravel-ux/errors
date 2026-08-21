<?php

declare(strict_types=1);

namespace LaravelUx\Errors\Exceptions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

class RegisterErrorViewPaths
{
    public function __invoke(): void
    {
        View::replaceNamespace(
            'errors',
            Collection::make(config('view.paths'))
                ->map(fn (string $path): string => "{$path}/errors")
                ->push(__DIR__.'/../../resources/views')
                ->all(),
        );
    }
}
