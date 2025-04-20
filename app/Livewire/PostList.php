<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

class PostList extends Component
{

    use WithPagination;

    #[Url]
    public $sort = 'desc';

    #[Url]
    public $search = '';

    public function setSort($sort)
    {
        $this->sort = ($this->sort == 'desc') ? 'asc' : 'desc';
    }

    #[Computed]
    public function posts()
    {
        return Post::published()
        ->orderBy('published_at', $this->sort)
        ->where('title', 'like', "%{$this->search}%")
        ->paginate(5);
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
