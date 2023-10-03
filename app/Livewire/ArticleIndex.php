<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    public int $page = 1;

    public function render()
    {
        return view('livewire.article-index', [
            'articles' => Article::latest()->paginate(10, ['*'], 'page', $this->page)
        ]);
    }
}
