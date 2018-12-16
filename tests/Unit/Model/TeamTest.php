<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Models\Exceptions\TeamResizeException;

class TeamTest extends TestCase
{
    use DatabaseTransactions;
    
    /** @test */
    public function a_team_has_name()
    {
        // 傳入陣列測試(不一定要用factory來做)
        $team = new \App\Models\Team(['name'=>'Test Team']);
        $this->assertEquals('Test Team', $team->name);
    }
    
    
    /** @test */
    public function a_team_has_many_users()
    {
        // $team = new \App\Models\Team(['name'=>'Test Team']);
        // $user_one = new \App\User(['name'=>'曉明']);
        // $user_two = new \App\User(['name'=>'中明']);
        $team = factory(\App\Models\Team::class)->create();
        $user_one = factory(\App\User::class)->create();
        $user_two = factory(\App\User::class)->create();
        
        $team->add($user_one);
        $team->add($user_two);
        // 可以直接改寫掉count的方法
        $this->assertEquals(2, $team->count());
    }
    
    /**
     * @test
     */
    public function a_team_can_add_multi_users()
    {
        $team = factory(\App\Models\Team::class)->create();
        $users = factory(\App\User::class,3)->create();
        $team->add($users);
        $this->assertEquals(3, $team->count());
    }
    
    /**
     * @test
     */
    public function a_team_can_remove_user()
    {
        $team = factory(\App\Models\Team::class)->create();
        $users = factory(\App\User::class,3)->create();
        $team->add($users);
        $team->remove($users->first());
        $this->assertEquals(2, $team->count());
        
    }
    
    /**
     * @test
     */
    public function a_team_can_remove_more_than_one_user()
    {
        $team = factory(\App\Models\Team::class)->create();
        $users = factory(\App\User::class,3)->create();
        $team->add($users);
        $team->remove($users->take(2));
        $this->assertEquals(1, $team->count());
    }
    
    /**
     * @test
     */
    public function a_team_can_remove_all_members()
    {
        $team = factory(\App\Models\Team::class)->create();
        $users = factory(\App\User::class,3)->create();
        $team->add($users);
        $team->removeMany($users);
        $this->assertEquals(0, $team->count());
    }
    
     /**
      * @test
     * @expectedException \Exception
     */
    public function a_team_has_maxium_size()
    {
        //  * @expectedException \App\Models\Exceptions\TeamResizeException;
        $team = factory(\App\Models\Team::class)->create(['size'=>2]);
        $user_one = factory(\App\User::class)->create();
        $user_two = factory(\App\User::class)->create();
        
        $team->add($user_one);
        $team->add($user_two);
        
        // 可以直接改寫掉count的方法
        $this->assertEquals(2, $team->count());
        $user_three = factory(\App\User::class)->create();
        // 先註解起來
        $team->add($user_three);
    }
    
     /**
      * @test
     * @expectedException \Exception
     */
    public function fix_bug_a_team_add_over_size_member_to_teams()
    {
        $team = factory(\App\Models\Team::class)->create(['size'=>2]);
        $user_one = factory(\App\User::class,3)->create();
        $team->add($user_one);
        
        // 可以直接改寫掉count的方法
        // $this->assertEquals(1, $team->count());
    }
    
}
