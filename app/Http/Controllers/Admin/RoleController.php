<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo '123';
        $data=DB::table('role')->get();
        // dd($data);
        // var_dump($data);
        return view('Admin.Users.auth',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function adminauth($id){
        //  echo $id
        $auth=DB::table('node')->get();
            $user=DB::table('role')->where('id','=',$id)->first();
            //获取当前角色已有的权限信息
            $data = DB::table('role_node')->where('rid','=',$id)->get();
            $nid=array();
            // dd($data);''
            if(count($data)){
                foreach($data as $key=>$value){
                $nid[]=$value->nid;
                
            }
            return  view('Admin.auth.roleauth',['auth'=>$auth,'user'=>$user,'nid'=>$nid]);
            }else{
                return  view('Admin.auth.roleauth',['auth'=>$auth,'user'=>$user,'nid'=>array()]);
            }
     }
     //保存权限
     public function saveauth(Request $request){
        // echo '1'; 
        //向role_node表插入数据
        //获取角色id
        $rid= $request->input('rid');
        $nid = $_POST['nid']; 
        DB::table('role_node')->where("rid",'=',$rid)->delete();
        // echo $rid;
        $nids=array();
        // dd($nid);
        foreach($nid as $key=>$value){
            //封装要插入的数据
            $nids['rid']=$rid;
            $nids['nid']=$value;
            
            DB::table("role_node")->insert($nids);
        }
        return redirect('adminroles');
     }
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
        //
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
}
