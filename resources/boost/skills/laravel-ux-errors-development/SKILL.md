---
name: laravel-ux-errors-development
description: "Build, customize, review, or debug Laravel HTTP error pages with laravel-ux/errors. Use when a task involves Laravel error views, abort responses, custom 4xx or 5xx pages, publishing or overriding package error templates, editing the shared error layout, testing rendered HTTP errors, or diagnosing why an application or package fallback view is selected."
---

# Laravel UX Errors Development

Follow Laravel's native HTTP exception and error-view conventions. Keep application overrides separate from the
package fallbacks.

## Workflow

1. Inspect `resources/views/errors` for application-owned overrides.
2. Identify whether the task affects one status page, every page through the shared layout, or package internals.
3. Prefer an application view for product-specific copy and styling. Modify package views only when maintaining the
   package itself.
4. Preserve safe production messages, especially for server errors.
5. Render the relevant HTTP response and run the smallest focused feature test.

## View Resolution

Laravel UX Errors preserves Laravel's conventional `errors` namespace:

1. `resources/views/errors/{status}.blade.php`
2. `resources/views/errors/{status-family}xx.blade.php`
3. Package views with the same names

Application views always take precedence. Do not replace the package exception handler or view-path registration
for ordinary customization.

The package exception handler also passes the HTTP status to Laravel Head before rendering. Preserve this behavior
when changing package internals so `Head::errors()` metadata resolves for the active status.

The package includes dedicated views for `401`, `402`, `403`, `404`, `419`, `429`, `500`, and `503`, plus generic
`4xx` and `5xx` fallbacks.

## Customize Views

Create one application view when only one response needs different copy:

```blade
{{-- resources/views/errors/404.blade.php --}}
@extends('errors::layout')

@section('title', __('Project Not Found'))
@section('code', '404')
@section('message', __('The project may have been removed or you may not have access.'))
```

Publish all package views only when broad customization is required:

```shell
php artisan vendor:publish --tag=laravel-ux-errors
```

Published views belong to the application. Do not edit files in `vendor`.

## Shared Layout

- Keep the layout self-contained with Blade and HTML. Do not introduce a dependency on Laravel UX UI.
- Load the consuming application's standard Vite entrypoints.
- Use `@fonts` and `font-sans` so the page follows the application's configured default family.
- Use application color tokens such as `background`, `foreground`, and `muted-foreground`.
- Keep only the `@head` rendering directive in the layout; register metadata outside Blade.
- Configure error metadata through `Head::errors()` in a service provider.
- Keep the package's default viewport and `noindex, nofollow` robots metadata for every error page.
- Keep the page useful when JavaScript is unavailable.
- Link the recovery action to `url('/')`, not a hardcoded deployment URL.

## Error Messages

Use exception messages only for intentional client errors:

```php
abort(403, 'This project is only available to its owner.');
```

- Allow the dedicated `403` and generic `4xx` views to show an intentional message.
- Keep dedicated `404` copy generic unless the application owns a custom view.
- Never render `$exception->getMessage()`, stack traces, SQL, file paths, or request secrets on `5xx` pages.
- Keep `500` and generic `5xx` responses on safe, static copy.
- Wrap user-facing copy in Laravel translation helpers.

## Testing

Test the rendered response through the HTTP layer:

```php
test('missing projects render the application error page', function () {
    $this->get('/projects/missing')
        ->assertNotFound()
        ->assertSee('Project Not Found');
});
```

Do not call `withoutExceptionHandling()` when the goal is to inspect the rendered error page; it bypasses the
behavior under test.

## Validation

- Confirm the expected status-specific or family fallback view is selected.
- Verify application overrides win over package views.
- Verify application-defined `Head::errors()` metadata overrides the package's runtime defaults.
- Check light and dark tokens, the configured font, responsive centering, and keyboard focus.
- Confirm `5xx` output contains no internal exception details.
- Run PHP formatting, the focused feature test, and the frontend build when layout classes change.
