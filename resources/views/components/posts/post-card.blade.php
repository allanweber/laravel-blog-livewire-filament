@props(['post'])
<div class="">
    <a wire:navigate href="{{ route('posts.show', $post->slug) }}">   
        <div>
            <img class="w-full rounded-xl" src="{{ $post->getThumbnailImage() }}" alt="{{ $post->title }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-2">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :$category />
            @endforeach
            <p class="text-gray-500 text-sm">{{ $post->published_at->diffForHumans() }}</p>
        </div>
        <a wire:navigate href="{{ route('posts.show', $post->slug) }}" class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
</div>
