<div">
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($categories as $category)
            <x-badge wire:navigate href="{{ request()->fullUrlWithQuery(['category' => $category->slug]) }}"  :bgColor="$category->bg_color" :textColor="$category->text_color">
                {{ $category->title }}
            </x-badge>
        @endforeach
    </div>
</div>