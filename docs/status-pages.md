# HTTP Status Pages

Laravel UX Errors resolves pages with the same naming convention as Laravel:

```text
resources/views/errors/{status}.blade.php
```

For example, `abort(403)` renders `403.blade.php`, while an unrecognized status such as `418` falls back to
`4xx.blade.php`.

## Custom messages

Pass a message to a client error when the response needs more context:

```php
abort(403, 'This project is only available to its owner.');
```

The included `403` and generic `4xx` pages display the exception message when one is available. Dedicated `404`
and all `5xx` pages use safe copy by default.

Server error pages never render exception messages, which prevents database errors and other internal details from
being exposed in production.

## Generic fallbacks

The package includes:

- `4xx.blade.php` for client errors without a dedicated page.
- `5xx.blade.php` for server errors without a dedicated page.

Create a status-specific application view whenever a response needs different copy or actions:

```blade
{{-- resources/views/errors/418.blade.php --}}
@extends('errors::layout')

@section('title', __("I'm a teapot"))
@section('code', '418')
@section('message', __('This endpoint cannot brew coffee.'))
```

## Testing

Assert the response status and visible content in a feature test:

```php
test('missing projects use the custom error page', function () {
    $this->get('/projects/missing')
        ->assertNotFound()
        ->assertSee('Project Not Found');
});
```
