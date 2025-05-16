@props(['author'])
<img class="w-10 h-10 rounded-full mr-3" src="{{ $author->profile_photo_url }}" alt="avatar">
<span class="mr-1">{{ $author->name }}</span>