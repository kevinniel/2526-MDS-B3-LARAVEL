<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier la categorie
        </h2>
    </x-slot>

    <div class="page">
        @include('shared.flash-messages')

        <section class="panel">
            <form method="POST" action="{{ route('categories.update', $category) }}">
                @csrf
                @method('PUT')

                @include('categories.form', ['submitLabel' => 'Enregistrer'])
            </form>
        </section>
    </div>
</x-app-layout>
