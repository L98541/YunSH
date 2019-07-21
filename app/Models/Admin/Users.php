<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //定义与模型关联的数据表
        protected $table="users";
    //主键
        protected $primaryKey="id";
    //设置是否需要自动维护时间戳 created_at updated_at
        public $timestamps =true;     
    //可以被批量复制的属性
        protected $fillable = ['username','password','balance','email','userqq','loginip','status','token','phone','created_at','updated_at'];
    //修改器 status 数据库字段名 对数据做自动处理
        public function getStatusAttribute($value){
            $status =[0=>'禁用',1=>'开启'];
            return $status[$value];
        }
    
    //关联方法 关联User和UserInfo模型类  获取关联数据
    //关联的模型类 'App\Models\Admin\Userinfo'
    //'users_id'关联的字段
    public function info(){
        return $this->hasOne('App\Models\Admin\Userinfo','users_id');
    }
    
    
}
