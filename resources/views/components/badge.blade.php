@props(['textColor', 'bgColor'])

@php
    $textColor = match($textColor) {
        'gray' => 'text-gray-800',
        'blue' => 'text-blue-800',
        'red' => 'text-red-800',
        'green' => 'text-green-800',
        'yellow' => 'text-yellow-800',
        'purple' => 'text-purple-800',
        'pink' => 'text-pink-800',
        'orange' => 'text-orange-800',
        default => 'text-gray-800'
    };
    
    $bgColor = match($bgColor) {
        'gray' => 'bg-gray-100',
        'blue' => 'bg-blue-100',
        'red' => 'bg-red-100',
        'green' => 'bg-green-100',
        'yellow' => 'bg-yellow-100',
        'purple' => 'bg-purple-100',
        'pink' => 'bg-pink-100',
        'orange' => 'bg-orange-100',
        default => 'bg-gray-100'
    };
    
@endphp

<button {{ $attributes }} class="{{ $bgColor }} {{ $textColor }} rounded-xl px-3 py-1 text-base">
    {{ $slot }}
</button>