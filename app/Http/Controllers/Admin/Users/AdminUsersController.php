<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('admin_users')->get();
        return view('Admin.Users.Adminuser',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = DB::table('admin_users')->get();
        // $data['password']=Hash::make($data['password']);
        $data=$request->except('_token','_method');
           $data['password']=Hash::make($data['password']);
        
        if(DB::table('admin_users')->insert($data)){
            echo 1;
        }else{
            echo 2;
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
    public function role($id){
        // var_dump(123);
        // $role=DB::table('role')->get();
        $adminuser= DB::table('admin_users')->where("id",'=',$id)->first(); 
        $role=DB::table('role')->get();
        // $rid = DB::table("user_role")->where("uid",'=',$id)->get();
        // dd($rid);
        // echo $id;
        //获取当前管理员的角色
        $rid=DB::table('user_role')->where('uid','=',$id)->get();
        // dd($uid);
        //遍历角色
        $rids=array();
        if (count($rid)) {
            foreach($rid as $key=>$value){
            //$uids 数组主要存放的是角色id
             $rids[]=$value->rid;
            //  dd($uids);
        }
        return view('Admin.Users.role',['adminuser'=>$adminuser,'role'=>$role,'rids'=>$rids]);
        }else{
             return view('Admin.Users.role',['adminuser'=>$adminuser,'role'=>$role,'rids'=>array()]);
        }
       
        
    } 
    public  function saverole(Request $request){
//         // return '132';
// echo 1;
        $uid=$request->input('uid');
//             // dd($uid) ;
// //把选择的角色存储在user_role表里
             $rids=$_POST['rids'];
//             //  echo $uid;
            DB::table('user_role')->where('uid','=',$uid)->delete();
//     // dd($rids) ;
    foreach($rids as $key=>$value){
        $data['uid']=$uid;
        $data['rid']=$value;
        DB::table('user_role')->insert($data);
    }
    return redirect("/adminuser");
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
        $data=DB::table('admin_users')->find($id);
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
        //
        $data=$request->all();
        
        if ($data['password']==null) {
            $data= $request->except('_token','_method','password');
        }else{
             $data= $request->except('_token','_method');
             $data['password']=Hash::make($data['password']);
        }
        // $data=$request->except('_token','_method');
        // $data['password']=Hash::make($data['password']);
        if (DB::table('admin_users')->where('id','=',$id)->update($data)) {
           echo 1;
        }else{
           echo 2;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DB::table('admin_users')->where('id','=',$id)->delete()) {
            echo 1;
        }else{
            echo 2;
        }
    }
}
