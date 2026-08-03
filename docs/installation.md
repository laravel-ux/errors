# Installation

Install Laravel UX Errors with Composer.

```shell
composer require laravel-ux/errors
```

Laravel package discovery registers the service provider automatically. No configuration or route changes are
required.

## Frontend assets

The error layout loads the application's standard Vite entrypoints:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

Make sure the frontend assets have been built before serving the application in production.

```shell
npm run build
```

The layout also uses the default family configured by Laravel UX Fonts. If your application uses a different
family, set it in `vite.config.js`; the error pages will follow it automatically.

## Verify the installation

Open a missing URL in a non-debug environment or temporarily add an error response to an application route:

```php
abort(404);
```

When `APP_DEBUG=true`, Laravel's development exception page may be shown for unexpected exceptions. HTTP error
responses still use Laravel's normal rendering flow.
