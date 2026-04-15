<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articles
        </h2>
    </x-slot>

    <div class="page">
        @include('shared.flash-messages')

        <section class="panel stack-sm">
            <div class="toolbar">
                <div>
                    <h3 class="section-title">Liste des articles</h3>
                    <p class="section-text">Chaque article appartient a une categorie.</p>
                </div>

                <a class="button" href="{{ route('articles.create') }}">Nouvel article</a>
            </div>

            @if ($articles->count() > 0)
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Categorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->name }}</td>
                                    <td>{{ $article->category->name }}</td>
                                    <td>
                                        <div class="action-group">
                                            <a class="button button-secondary" href="{{ route('articles.show', $article) }}">Voir</a>
                                            <a class="button button-secondary" href="{{ route('articles.edit', $article) }}">Modifier</a>

                                            <form method="POST" action="{{ route('articles.destroy', $article) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="button button-danger" type="submit">Supprimer</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $articles->links() }}
            @else
                <p class="empty-state">Aucun article pour le moment.</p>
            @endif
        </section>
    </div>
</x-app-layout>
