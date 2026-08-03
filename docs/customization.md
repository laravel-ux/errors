# Customizing Error Pages

Publish the package views with Laravel's standard vendor publishing workflow.

```shell
php artisan vendor:publish --tag=laravel-ux-errors
```

The command copies the views into:

```text
resources/views/errors
```

Edit the published files directly. Laravel checks application error views before the package fallbacks, so every
published page can be changed without modifying `vendor`.

## Customize one page

You do not have to publish every view when only one status needs custom content. Create the matching file in the
application:

```text
resources/views/errors/404.blade.php
```

The view may extend the package layout:

```blade
@extends('errors::layout')

@section('title', __('Project Not Found'))
@section('code', '404')
@section('message', __('The project may have been removed or you may not have access.'))
```

## Customize the shared layout

After publishing, edit `resources/views/errors/layout.blade.php` to change the structure shared by every status
page. The default layout intentionally uses plain Blade and HTML instead of package components, keeping fatal error
rendering independent from the UI package.

## Publish package updates

Publishing does not overwrite existing application views. To replace them with the latest package versions, review
your local changes first and then run:

```shell
php artisan vendor:publish --tag=laravel-ux-errors --force
```

The `--force` option overwrites the published files.
