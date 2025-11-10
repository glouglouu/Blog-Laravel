<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\View\View;

class ArticleCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Post $post
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.article-card');
    }
}

