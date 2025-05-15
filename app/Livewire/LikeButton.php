<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Reactive;

class LikeButton extends Component
{

    // Reactive is used to make the post property reactive so that the component is updated when the post is updated
    #[Reactive]
    public Post $post;

    //From PHP 8 donn't need to use mount method
    // public function mount(Post $post)
    // {
    //     $this->post = $post;
    // }

    public function toogleLike()
    {
        if(auth()->guest()) {
            return $this->redirect(route('login'));
        }

        $user = auth()->user();

        if($user->hasLiked($this->post)) {
            $user->likes()->detach($this->post);
        } else {
            $user->likes()->attach($this->post);
        }

        $this->post->refresh();
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
