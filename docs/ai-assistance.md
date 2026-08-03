# AI Assistance

Laravel UX Errors includes a Laravel Boost skill that teaches supported coding agents how the package resolves,
customizes, and tests HTTP error pages.

## What the skill covers

The `laravel-ux-errors-development` skill provides package-specific guidance for:

- Choosing between an application override and a package-level change.
- Resolving dedicated status views and generic `4xx` or `5xx` fallbacks.
- Publishing views through Laravel's native vendor publishing workflow.
- Customizing the shared layout without introducing a UI package dependency.
- Keeping server error messages free of exception details.
- Testing the rendered error response instead of bypassing the exception handler.

## Discover the skill

Install Laravel Boost skills in the consuming application:

```shell
php artisan boost:install --skills
```

For an existing Boost installation, discover newly available package skills:

```shell
php artisan boost:update --discover
```

Once discovered, supported agents can automatically use the skill for work involving Laravel UX error pages and
HTTP exception rendering.
