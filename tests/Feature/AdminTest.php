<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    // use RefreshDatabase;
    
    /**
     * @test
     * @group user
     */
     public function a_default_user_cannot_access_the_admin_section()
     {
         $user = factory(\App\User::class)->create();
         // 訪問admin頁面的時候,跳轉到home頁面
         $this->actingAs($user)
             ->get('/admin')
             ->assertRedirect('home');
     }
     
     /**
      * @test
      * @group user
      */
     public function an_admin_can_access_the_admin_section()
     {
         $admin = factory(\App\User::class)
            ->states('admin')
            ->create();
         // 訪問admin頁面的時候,回傳200
        $this->actingAs($admin)
            ->get('/admin')
            ->assertStatus(200);
     }
}
