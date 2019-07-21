<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public static function getCates(){
        $data = DB::table('cates')->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy("paths")->get();
        //遍历数据
        foreach($data as $key=>$value){
            // echo $value->path."<br>";
            $path =$value->path;
            //转换为数组
            $arr=explode(",",$path);
            // echo '<pre>';
            // var_dump($arr);
            //获取逗号个数
            $len=count($arr)-1;
           $data[$key]->name= str_repeat("--|",$len).$value->name;
        }
        return $data;
     }
    public function index()
    {
        // echo 111;
         //获取所有分类数据
        $data = DB::table('cates')->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy("paths")->get();
        //遍历数据
        foreach($data as $key=>$value){
            // echo $value->path."<br>";
            $path =$value->path;
            //转换为数组
            $arr=explode(",",$path);
            // echo '<pre>';
            // var_dump($arr);
            //获取逗号个数
            $len=count($arr)-1;
           $data[$key]->name= str_repeat("--|",$len).$value->name;
        }
        //加载分类页面
        return view('Admin/cates/cate',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //获取所有分类数据
        $data = self::getCates();
        dd($data);
        //加载分类页面
        return view('Admin/cates/cates',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // dd($request->all());
            // $request->all();
            // 去除token
            $data =$request->except('_token');
            //获取pid 
            $pid = $request->input('pid');
            // dd($pid);
            if ($pid == 0) {
                //添加到顶级分类
                // dd($data);
                $data['path'] = '0';
                // dd($data);
            }else{
                //否则添加到子类
                //封装path(父类的path和父类的id拼接)
                $info =DB::table("cates")->where('id','=',$pid)->first();
                $data['path']=$info->path.','.$info->id;
                
                //入库
            

                
            }
                if(DB::table('cates')->insert($data)){
                    return redirect('/admincates');
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
         $s=DB::table('cates')->where('pid','=',$id)->count();
         if($s>0){
             echo '非法删除操作';
         }else{
             if(DB::table('cates')->where('id','=',$id)->delete()){
                 echo '1';
             }else{
                 echo '2';
             }
         }
    }
}
