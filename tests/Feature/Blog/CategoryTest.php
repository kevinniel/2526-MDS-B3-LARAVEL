<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\User;

test('guests are redirected when accessing category management', function () {
    $this->get(route('categories.index'))
        ->assertRedirect(route('login'));
});

test('authenticated users can manage categories', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('categories.store'), [
            'name' => 'Laravel',
        ])
        ->assertRedirect(route('categories.index'));

    $category = Category::query()->firstOrFail();

    $this->assertDatabaseHas('categories', [
        'name' => 'Laravel',
    ]);

    $this->actingAs($user)
        ->put(route('categories.update', $category), [
            'name' => 'PHP',
        ])
        ->assertRedirect(route('categories.index'));

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'PHP',
    ]);

    $this->actingAs($user)
        ->get(route('categories.show', $category))
        ->assertOk()
        ->assertSee('PHP');

    $this->actingAs($user)
        ->delete(route('categories.destroy', $category))
        ->assertRedirect(route('categories.index'));

    $this->assertDatabaseMissing('categories', [
        'id' => $category->id,
    ]);
});

test('categories containing articles can not be deleted', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create([
        'name' => 'Actualites',
    ]);

    Article::factory()->for($category)->create([
        'name' => 'Premier article',
    ]);

    $this->actingAs($user)
        ->delete(route('categories.destroy', $category))
        ->assertRedirect(route('categories.index'))
        ->assertSessionHas('error');

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
    ]);
});
