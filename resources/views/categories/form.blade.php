<div class="stack-sm">
    <div class="form-group">
        <label class="form-label" for="name">Nom</label>
        <input
            class="form-input"
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $category->name ?? '') }}"
            required
        >
    </div>

    <div class="form-actions">
        <button class="button" type="submit">{{ $submitLabel }}</button>
        <a class="button button-secondary" href="{{ route('categories.index') }}">Annuler</a>
    </div>
</div>
