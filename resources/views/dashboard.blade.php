<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="page">
        <section class="panel stack-sm">
            <div>
                <h3 class="section-title">Administration du blog</h3>
                <p class="section-text">Accedez a la gestion des articles et des categories depuis cette page.</p>
            </div>

            <div class="action-group">
                <a class="button" href="{{ route('articles.index') }}">Gerer les articles</a>
                <a class="button button-secondary" href="{{ route('categories.index') }}">Gerer les categories</a>
            </div>
        </section>
    </div>
</x-app-layout>
