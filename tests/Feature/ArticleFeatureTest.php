<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_index_page_shows_articles()
    {
        Article::factory()->create(['title' => 'Laravel Rocks']);

        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertSee('Laravel Rocks');
    }

    public function test_can_create_article()
    {
        $response = $this->post('/articles', [
            'title' => 'New Article',
            'content' => 'Content here',
        ]);

        $response->assertRedirect('/articles');
        $this->assertDatabaseHas('articles', ['title' => 'New Article']);
    }

    public function test_validation_error_when_missing_title()
    {
        $response = $this->post('/articles', [
            'title' => '',
            'content' => 'Content here',
        ]);

        $response->assertSessionHasErrors('title');
    }
}
