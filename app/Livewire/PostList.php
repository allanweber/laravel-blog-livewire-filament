<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use App\Models\Category;
class PostList extends Component
{

    use WithPagination;

    #[Url]
    public $sort = 'desc';

    #[Url]
    public $search = '';

    #[Url]
    public $category = '';

    public function setSort($sort)
    {
        $this->sort = ($this->sort == 'desc') ? 'asc' : 'desc';
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()
        ->orderBy('published_at', $this->sort)
        ->when($this->activeCategory, function ($query) {
            $query->withCategory($this->category);
        })
        ->where('title', 'like', "%{$this->search}%")
        ->paginate(5);
    }

    #[Computed()]
    public function activeCategory()
    {
        return Category::where('slug', $this->category)->first();
    }


    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
