<?php

namespace App\Http\Livewire\Backend;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Statistics extends Component
{
    public function render()
    {

        $all_users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->whereStatus(1)->count();

        $active_posts = Post::whereStatus(1)->wherePostType('post')->count();
        $inactive_posts = Post::whereStatus(0)->wherePostType('post')->count();
        $active_comments = Comment::whereStatus(1)->count();


        return view('livewire.backend.statistics', [
            'all_users'         => $all_users,
            'active_posts'      => $active_posts,
            'inactive_posts'    => $inactive_posts,
            'active_comments'   => $active_comments,
        ]);
    }
}
