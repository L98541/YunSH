<?php

namespace App\Http\Controllers\Admin\Shop;
use App\Http\Controllers\Admin\CatesController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //两表关联
        $data= DB::table('shops')->join('cates','shops.cate_uid','=','cates.id')->select('shops.name as sname','shops.id','shops.descr','shops.num','shops.price','cates.id as cid','cates.name as cname')->get();
        $cates=CatesController::getCates();
        // $data = DB::table('shops')->get();
       return view('Admin.Shop.Index',['data'=>$data,'cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取所有类别
        //跨控制器调用方法
        $cates=CatesController::getCates();
        // dd($cates);
        return view('Admin.Shop.Shopadd',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   $data=$request->all();
    $data =$request->except('_token');
    //   return json_encode($data);
    if (DB::table('shops')->insert($data)) {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('shops')->where('id','=',$id)->first();
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
        $data=$request->except('_method');
        // return json_encode($data);
        if (DB::table('shops')->where('id','=',$id)->update($data)) {
            echo  1;
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
        $data= DB::table('shops')->where('id','=',$id)->delete();
        if ($data == 1) {
            echo 1;
        }else{
            echo 2;
        }
    }
}
