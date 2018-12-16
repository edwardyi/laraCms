<?php
namespace Tests\Model;

// 這一行一定要加,否則phpunit會沒有反應
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Models\Article;

class ArticleTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * @test
     */
    public function no_articles()
    {
        $articles = Article::all();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $articles);
        $this->assertEquals(0, count($articles));
    }
    
    /**
     * @test
     */
    public function ten_articles()
    {
        factory(Article::class,10)->create();
        $articles = Article::all();
        $this->assertEquals(10, count($articles));
    }
    
    /** @test */
    public function get_trending_article()
    {
        factory(Article::class,3)->create();
        factory(Article::class)->create(['reads'=>10]);
        $most_views_articles = factory(Article::class)->create(['reads'=>222]);
        $articles = Article::trending();
        
        $this->assertEquals($most_views_articles->id, $articles->first()->id);
        $this->assertCount(3, $articles);
    }
}