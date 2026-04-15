<div class="stack-sm">
    <div class="form-group">
        <label class="form-label" for="category_id">Categorie</label>
        <select class="form-input" id="category_id" name="category_id" required>
            <option value="">Choisir une categorie</option>

            @foreach ($categories as $categoryOption)
                <option
                    value="{{ $categoryOption->id }}"
                    @selected(old('category_id', $article->category_id ?? '') == $categoryOption->id)
                >
                    {{ $categoryOption->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label class="form-label" for="name">Nom</label>
        <input
            class="form-input"
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $article->name ?? '') }}"
            required
        >
    </div>

    <div class="form-group">
        <label class="form-label" for="description">Description</label>
        <textarea
            class="form-input"
            id="description"
            name="description"
            rows="6"
            required
        >{{ old('description', $article->description ?? '') }}</textarea>
    </div>

    <div class="form-actions">
        <button class="button" type="submit">{{ $submitLabel }}</button>
        <a class="button button-secondary" href="{{ route('articles.index') }}">Annuler</a>
    </div>
</div>
