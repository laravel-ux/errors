# Installation

Install Laravel UX Errors with Composer.

```shell
composer require laravel-ux/errors
```

Laravel package discovery registers the Laravel UX Errors and Laravel Head service providers automatically. No
configuration or route changes are required.

## Verify the installation

Open a missing URL in a non-debug environment or temporarily add an error response to an application route:

```php
abort(404);
```

When `APP_DEBUG=true`, Laravel's development exception page may be shown for unexpected exceptions. HTTP error
responses still use Laravel's normal rendering flow.
