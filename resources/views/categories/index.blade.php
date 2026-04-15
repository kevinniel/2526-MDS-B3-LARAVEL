<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>

    <div class="page">
        @include('shared.flash-messages')

        <section class="panel stack-sm">
            <div class="toolbar">
                <div>
                    <h3 class="section-title">Liste des categories</h3>
                    <p class="section-text">Chaque categorie peut contenir plusieurs articles.</p>
                </div>

                <a class="button" href="{{ route('categories.create') }}">Nouvelle categorie</a>
            </div>

            @if ($categories->count() > 0)
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Articles</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->articles_count }}</td>
                                    <td>
                                        <div class="action-group">
                                            <a class="button button-secondary" href="{{ route('categories.show', $category) }}">Voir</a>
                                            <a class="button button-secondary" href="{{ route('categories.edit', $category) }}">Modifier</a>

                                            <form method="POST" action="{{ route('categories.destroy', $category) }}">
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

                {{ $categories->links() }}
            @else
                <p class="empty-state">Aucune categorie pour le moment.</p>
            @endif
        </section>
    </div>
</x-app-layout>
