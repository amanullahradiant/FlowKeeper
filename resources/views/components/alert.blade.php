@props(['type' => 'info', 'class' => ''])

<div {{ $attributes->merge(['class' => "alert alert-$type $class"]) }}>
    {{ $slot }}
</div>
