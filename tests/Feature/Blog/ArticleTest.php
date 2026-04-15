<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\User;

test('guests are redirected when accessing article management', function () {
    $this->get(route('articles.index'))
        ->assertRedirect(route('login'));
});

test('authenticated users can manage articles', function () {
    $user = User::factory()->create();
    $firstCategory = Category::factory()->create([
        'name' => 'Laravel',
    ]);
    $secondCategory = Category::factory()->create([
        'name' => 'PHP',
    ]);

    $this->actingAs($user)
        ->post(route('articles.store'), [
            'category_id' => $firstCategory->id,
            'name' => 'Premier article',
            'description' => 'Une description de test.',
        ])
        ->assertRedirect();

    $article = Article::query()->firstOrFail();

    $this->assertDatabaseHas('articles', [
        'name' => 'Premier article',
        'category_id' => $firstCategory->id,
    ]);

    $this->actingAs($user)
        ->put(route('articles.update', $article), [
            'category_id' => $secondCategory->id,
            'name' => 'Article modifie',
            'description' => 'Une autre description.',
        ])
        ->assertRedirect(route('articles.show', $article));

    $this->assertDatabaseHas('articles', [
        'id' => $article->id,
        'name' => 'Article modifie',
        'category_id' => $secondCategory->id,
    ]);

    $this->actingAs($user)
        ->get(route('articles.show', $article))
        ->assertOk()
        ->assertSee('Article modifie')
        ->assertSee('PHP');

    $this->actingAs($user)
        ->delete(route('articles.destroy', $article))
        ->assertRedirect(route('articles.index'));

    $this->assertDatabaseMissing('articles', [
        'id' => $article->id,
    ]);
});
