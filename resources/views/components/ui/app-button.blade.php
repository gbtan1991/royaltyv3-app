<button 
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 
            'w-full h-11 px-6 bg-brand-600 text-white rounded-lg hover:bg-brand-700 transition ' . $class
    ]) }}
>
    {{ $slot }}
</button>
