<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nouvel article
        </h2>
    </x-slot>

    <div class="page">
        @include('shared.flash-messages')

        <section class="panel">
            @if ($categories->count() === 0)
                <div class="alert alert-error">
                    Creez d'abord une categorie avant d'ajouter un article.
                </div>

                <a class="button" href="{{ route('categories.create') }}">Creer une categorie</a>
            @else
                <form method="POST" action="{{ route('articles.store') }}">
                    @csrf

                    @include('articles.form', ['submitLabel' => 'Creer l\'article'])
                </form>
            @endif
        </section>
    </div>
</x-app-layout>
