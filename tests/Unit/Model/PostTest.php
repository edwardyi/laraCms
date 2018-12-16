<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Edward\Posts\Post;
class PostTest extends TestCase
{
    /**
     * @test
     */
    public function post_has_attributes_check()
    {
        $data = [
            'user_id'=>'1',
            'title'=>'test_title',
            'body'=>'test_body'
        ];
        $post = new Post($data);
        $this->assertEquals($data['title'], $post->title);
    }
    
    /**
     * @test
     */
    public function it_can_create_one_post()
    {
       $post = factory(Post::class)->create();
       $this->assertInstanceOf(Post::class, $post);
    }
    
}
