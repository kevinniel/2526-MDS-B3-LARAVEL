<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nouvelle categorie
        </h2>
    </x-slot>

    <div class="page">
        @include('shared.flash-messages')

        <section class="panel">
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf

                @include('categories.form', ['submitLabel' => 'Creer la categorie'])
            </form>
        </section>
    </div>
</x-app-layout>
