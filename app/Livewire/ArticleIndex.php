<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    public int $page = 1;

    public Collection $articles;

    public function mount()
    {
        $this->articles = collect();
        $this->loadMore();
    }

    public function loadMore()
    {
        $this->articles->push(
            ...$this->paginator->getCollection()
        );

        $this->page = $this->page + 1;
    }

    #[Computed()]
    public function paginator()
    {
        return Article::latest()->paginate(10, ['*'], 'page', $this->page);
    }

    public function render()
    {
        return view('livewire.article-index');
    }
}
