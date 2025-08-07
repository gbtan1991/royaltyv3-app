@props(['method' => 'POST', 'action' => '', 'hasFiles' => false])


<?php

    $actualMethod = strtoupper($method);
    $spoofMethod = in_array($actualMethod, ['PUT', 'PATCH', 'DELETE']);
?>

<form
    action="{{ $action }}"
    method="{{ $actualMethod ? 'POST' : $actualMethod }}"
    @if($hasFiles) enctype='multipart/form-data' @endif
    {{ $attributes->merge(['class' => 'space-y-4']) }}
>
    @csrf

    @if($spoofMethod)
        @method($actualMethod)
    @endif

    {{ $slot }}
</form>