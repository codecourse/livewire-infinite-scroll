<div class="space-y-8">
    @foreach ($articles as $article)
        <div>
            <h2 class="text-xl font-bold">#{{ $article->id }} {{ $article->title }}</h2>
            <p>{{ $article->teaser }}</p>
        </div>
    @endforeach

    @if ($this->paginator->hasMorePages())
        <button wire:click="loadMore">Load more</button>
    @endif
</div>
