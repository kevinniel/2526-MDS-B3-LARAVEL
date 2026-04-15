<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'article
        </h2>
    </x-slot>

    <div class="page">
        @include('shared.flash-messages')

        <section class="panel">
            <form method="POST" action="{{ route('articles.update', $article) }}">
                @csrf
                @method('PUT')

                @include('articles.form', ['submitLabel' => 'Enregistrer'])
            </form>
        </section>
    </div>
</x-app-layout>
