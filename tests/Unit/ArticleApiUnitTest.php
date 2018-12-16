<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleApiUnitTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_create_an_article()
    {
        $data = [
            'title' => $this->faker->sentence,
            'reads' => 0
        ];
        $this->post(route('articles.store'), $data)
            // ->dump()
            ->assertStatus(201);
            // ->assertJson($data);
    }
}
