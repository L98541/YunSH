<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //销毁session
        $request->session()->pull('adminname');
        //删除权限
        $request->session()->pull('nodelist');
        return redirect('/adminlogin/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("Admin.Login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // echo "this is login html";
        // $name= $request->input("name");
        // $password=$request->input("password");
        // //检测管理员名字
        // $info=DB::table("admin_users")->where("name","=",$name)->first();
        // if($info){
        //     // echo "adminname ok!";
        //     //密码检测
        //     if (Hash::check($password,$info->password)) {
        //             // echo "ppassword ok!";
        //             return redirect("/admin")->with("success","登陆成功");
        //     }
        // }else{
        //     echo "adminuser error!"; 
        // }
        $data=$request->all();
        $date=$_POST['password'];
        $name =$request->input("name");
        // return $name;/
        $pwd=$request->only("password");
        // return $pwd;
        
        // $session=session(['adminname'=>$name]);
        // return json_encode($pwd);
        $name=DB::table("admin_users")->where("name","=",$name)->first();
        // return json_encode(session(['adminname'=>$name]));
        $password=Hash::check($date,$name->password);
        // return $data;
        if ($name) {
            if ($password) {
                session(['adminname'=>$name]);
                //获取管理员所有信息

                // dd($nodelist);
                // $value='132';
                // $value = session('adminname');
                // return $value;
               
            $list=DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$name->id}");
            //2.初始化权限信息
            // dd($nodelist) ;
            //让所有管医院都可以访问到后台首页 Admin是控制器名字 index是方法
            $nodelist['IndexController'][]="index";
            // $nodelist1['IndexController'][]=
            foreach($list as $key=>$value){
                $nodelist[$value->mname][]=$value->aname;
                //如果有carate方法  加入store方法
                if ( $value->aname =="create") {
                    $nodelist[$value->mname][]="store";
                }
                //如果有edit方法  加入update
                if($value->aname=="edit"){
                    $nodelist[$value->mname][]="update";
                }
                 
            }
            session(['nodelist'=>$nodelist]);
        //       $input_params =  $request->input();//获取参数
        //      $mid_params = $request->get('mid_params');//中间件产生的参数
        // // return ;

        //     // dd($nodelist)
        //     //3.把初始化后的当前登录的信息写入session里
        //     // $all_params =  $request->input();//获取参数
        //  var_dump($input_params);
            
                
                echo 1;
            }else{
                echo 2;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function asd(Request $request){
        $value = session('adminname');
        dd($value->name);
    }
}
