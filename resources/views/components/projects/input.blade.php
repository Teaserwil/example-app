@props(['value' => ''])

<input {{ $attributes->class([
    'form-control',
    'mb-3',

])->merge([
    'type' => 'text',
    'value' => (old($attributes->get('name')) ?: $value),
]) }}>