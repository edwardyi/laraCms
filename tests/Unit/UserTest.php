<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

// https://nick-basile.com/blog/post/how-to-build-an-admin-in-laravel-using-tdd
class UserTest extends TestCase
{
    /**
     * @test
     * @group user
     */
    public function a_default_user_is_not_login()
    {
        $user = factory(\App\User::class)->create();
        $this->assertFalse($user->isAdmin());
    }
    
    /**
     * @test
     * @group user
     */
    public function an_admin_user_is_an_admin()
    {
        // states?
        $admin = factory(\App\User::class)
                ->states('admin')
                ->create();
        $this->assertTrue($admin->isAdmin());
    }
}
