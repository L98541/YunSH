<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Users;
// 导入哈希类
use Hash;
//导入效验请求类
// use App\Http\Requests\UserInsertRequest;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  echo date('Y-m-d H:i:s');
        // echo  $request->getClientIp();
        // $date=$request->getClientIp();
        // echo $date;
        //使用DB获取数据库所有数据
        // echo date('Y-m-d');
        // $data=DB::table("users")->get();
        // return view('Admin.Users.Index',['data'=>$data]);
        //使用模型获取数据库所有数据
        // $session=session(['adminname'=>$name]);
        $data=Users::get();
        // return json_encode($session);
         return view('Admin.Users.Index',['data'=>$data]);
         
        // dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        // echo 1;
            // dd(1);
        // return view('Admin.Users.useradd');
        //获取所有数据
        
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   //注册ip获取
        
    //   //去除字段
    //  $date=date('Y-m-d');
     $data=$request->except(['repassword','_token']);
     $data['password']=Hash::make($data['password']);
     $data['status']=1;
     $data['token']=str_random(50);
    //  $data['regtime']=$date;
     $ip=$request->getClientIp();
      
     $data['loginip']=$ip;
     
     //使用DB执行数据库插入
    //  if (DB::table('users')->insert($data) ) {
    //      echo 1;
    //  }else{
    //      echo 2;
    //  }
    //  return json_encode($data);
    //使用模型执行数据库插入
     if (Users::create($data)) {
        echo 1;
     }else{
         echo 2;
     }
    //  return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $id;
        //使用模型获取数据库单条关联数据 info为模型关联方法
        $info=Users::find($id)->info;
        // dd($info);
        return view('Admin.Users.info',['info'=>$info]);
    //  $data=$request->all();
            //  $data =$_POST();
            // echo $data;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //DB获取需要修改的数据
        // $data=DB::table('users')->where("id","=",$id)->first();
        // return json_encode($data);
        //模型获取需要修改的数据
         $data =Users::find($id);
         return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //使用DB修改数据
        $data=$request->except(["_token","_method"]);
        $data['password']=Hash::make($data['password']);
        // dd($dat)
        
        // // var_dump($data);
        // if(DB::table("users")->where("id","=",$id)->update($data)){
        //     echo '1';
        // }else{
        //     echo '2';
        // }
        // if($_POST['password'] == null){
        //     $data['password']=Users::where('password','=',$data['password'])->first();
        // }
        //使用模型修改数据
        if (Users::where('id','=',$id)->update($data)) {
            echo 1;
        }else{
            echo 2;
        }
        return json_encode($data['email']);
        // return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Users:: where("id","=",$id)->delete()){
            echo '1';
        }
        // if($id == 1){
        //     // echo '禁止删除';
        //     }elseif(DB::table('users')->where("id","=",$id)->delete()){
        //     echo 1;
        // }
    }
}
