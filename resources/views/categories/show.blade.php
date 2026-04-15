<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail de la categorie
        </h2>
    </x-slot>

    <div class="page stack">
        @include('shared.flash-messages')

        <section class="panel stack-sm">
            <div class="toolbar">
                <div>
                    <h3 class="section-title">{{ $category->name }}</h3>
                    <p class="section-text">{{ $category->articles->count() }} article(s) dans cette categorie.</p>
                </div>

                <div class="action-group">
                    <a class="button button-secondary" href="{{ route('categories.index') }}">Retour</a>
                    <a class="button" href="{{ route('categories.edit', $category) }}">Modifier</a>
                </div>
            </div>
        </section>

        <section class="panel stack-sm">
            <div>
                <h3 class="section-title">Articles associes</h3>
            </div>

            @if ($category->articles->count() > 0)
                <ul class="simple-list">
                    @foreach ($category->articles as $article)
                        <li>
                            <a class="text-link" href="{{ route('articles.show', $article) }}">{{ $article->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="empty-state">Cette categorie ne contient encore aucun article.</p>
            @endif
        </section>
    </div>
</x-app-layout>
