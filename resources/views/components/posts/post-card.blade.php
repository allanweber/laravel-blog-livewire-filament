@props(['post'])
<div class="">
    <a href="#">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->getThumbnailImage() }}" alt="{{ $post->title }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-2">
            @foreach ($post->categories as $category)
                <x-badge wire:navigate href="{{ request()->fullUrlWithQuery(['category' => $category->slug]) }}" :bgColor="$category->bg_color" :textColor="$category->text_color">
                    {{ $category->title }}
                </x-badge>
            @endforeach
            <p class="text-gray-500 text-sm">{{ $post->published_at->diffForHumans() }}</p>
        </div>
        <a href="#" class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
</div>
