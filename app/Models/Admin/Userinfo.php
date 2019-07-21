<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
      //定义与模型关联的数据表
        protected $table="users_info";
    //主键
        protected $primaryKey="id";
    //设置是否需要自动维护时间戳 created_at updated_at
        public $timestamps =true;     
}
