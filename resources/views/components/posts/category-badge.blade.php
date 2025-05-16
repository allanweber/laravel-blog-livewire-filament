@props(['category'])
<x-badge wire:navigate href="{{ request()->fullUrlWithQuery(['category' => $category->slug]) }}" :bgColor="$category->bg_color" :textColor="$category->text_color">
    {{ $category->title }}
</x-badge>