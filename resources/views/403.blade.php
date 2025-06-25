<x-ux.layouts::error
    code="403"
    :title="__('Forbidden')"
    :message="$exception->getMessage() ?: __('You do not have permission to view this page.')"
/>

