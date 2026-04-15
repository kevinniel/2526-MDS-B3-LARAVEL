<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail de l'article
        </h2>
    </x-slot>

    <div class="page stack">
        @include('shared.flash-messages')

        <section class="panel stack-sm">
            <div class="toolbar">
                <div>
                    <h3 class="section-title">{{ $article->name }}</h3>
                    <p class="section-text">
                        Categorie :
                        <a class="text-link" href="{{ route('categories.show', $article->category) }}">{{ $article->category->name }}</a>
                    </p>
                </div>

                <div class="action-group">
                    <a class="button button-secondary" href="{{ route('articles.index') }}">Retour</a>
                    <a class="button" href="{{ route('articles.edit', $article) }}">Modifier</a>
                </div>
            </div>
        </section>

        <section class="panel stack-sm">
            <div>
                <h3 class="section-title">Description</h3>
            </div>

            <p class="content-text">{{ $article->description }}</p>
        </section>
    </div>
</x-app-layout>
