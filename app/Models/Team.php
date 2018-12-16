<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Exceptions\TeamResizeException;
class Team extends Model
{
    protected $fillable = ['name','size'];
    //protected $users;
    
    public function add($users)
    {
        $this->oversizeExpcetion($users);
        
        $method = ($users instanceof \App\User) ? 'save' : 'saveMany';
       
        // 用一對多的關係去存
        return $this->members()->$method($users);
    }
    
    public function remove($users)
    {
        // 直接針對users的table更新team_id為null
        // Users Model的@fillable的欄位記得要加上去
        if ($users instanceof \App\User) {
            return $users->update(['team_id'=>null]);    
        }
        // 方法1:參數法
        // $users->each(function($user){
        //      return $user->update(['team_id'=>null]);    
        // });
        $this->removeMany($users);
    }
    
    public function removeMany($users)
    {
        // 方法2:關聯法pluck
        return $this->members()->whereIn('id', $users->pluck('id'))->update(['team_id'=>null]);
    }
    
    public function resize()
    {
        return $this->members()->update(['team_id'=>null]);
    }
    
    // 定義一個一對多的關係
    public function members()
    {
        return $this->hasMany(\App\User::class);
    }
    // 可以直接改寫掉count方法,可以之後再寫
    public function count()
    {
        // 之後的操作都透過member這層關係處理
        return $this->members()->count();
    }
    
    protected function oversizeExpcetion($users)
    {
        // 當前的數量加上加進來的數量是否大於size的判斷
        // collection不能count,只有陣列或物件才可以
        $newTeamMembers = $this->count() + $users->count();
        // 呼叫自己定義的count方法
        // 從0開始count所以要在扣1(或是大於等於)
        if ($newTeamMembers > $this->size)    {
            // var_dump(get_class($users));
            throw new \Exception("一般的Exception也來試看看");
            // throw new TeamResizeException("你家太多人進來囉");
            // 暫時注解掉
            //  throw new \Exception("Exception");
        }
    }
}
