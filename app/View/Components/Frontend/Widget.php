<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;

class Widget extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tags;
    public $categories;
    public $latestPosts;
    public function __construct($tags, $categories, $latestPosts)
    {
        $this->tags = $tags;
        $this->categories = $categories;
        $this->latestPosts = $latestPosts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.widget');
    }
}
