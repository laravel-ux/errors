# Introduction

A polished set of HTTP error pages that follows Laravel's existing error view conventions.

```blade preview
<div class="mx-auto max-w-md py-12 text-center">
    <p class="text-6xl font-semibold tracking-[-0.05em] sm:text-7xl">404</p>
    <p class="mt-4 text-base leading-7 text-muted-foreground">
        The page you are looking for could not be found.
    </p>
    <a
        href="/"
        class="mt-6 inline-flex h-10 items-center justify-center rounded-md bg-foreground px-4 text-sm font-medium text-background"
    >
        Go to homepage
    </a>
</div>
```

## Laravel conventions

The package extends Laravel's normal error rendering instead of introducing a separate API. Calls such as
`abort(404)` and framework HTTP exceptions automatically use the matching page.

Application views in `resources/views/errors` always take precedence. When no application override exists, the
package provides the fallback view.

## Included pages

Ready-made pages are included for the most common HTTP statuses:

- `401` Unauthorized
- `402` Payment Required
- `403` Forbidden
- `404` Not Found
- `419` Page Expired
- `429` Too Many Requests
- `500` Server Error
- `503` Service Unavailable

Generic `4xx` and `5xx` views cover every other client and server error.

## Application-aware styling

The layout uses your application's Vite entrypoints, color tokens, and default font configured through `@fonts`.
It does not require Laravel UX UI, so error rendering remains self-contained.

## Head metadata

The shared layout uses Laravel Head to render the error title, viewport, and non-indexable robots metadata. Global
head defaults from the application continue to apply, including title prefixes or suffixes, icons, and theme
metadata.
