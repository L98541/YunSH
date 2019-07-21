<?php

namespace App\Http\Middleware\admin;

use Closure;
use Illuminate\Http\Request;
class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //检查是否具有登录的session
        if ($request->session()->has('adminname')) {
    // 4.用访问模块控制器和方法名和权限列表做对比
        //获取访问模块控制器和方法名字
         $actions=explode('\\', \Route::current()->getActionName());
     //或$actions=explode('\\', \Route::currentRouteAction());
        $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
        $func=explode('@', $actions[count($actions)-1]);
        $controllerName=$func[0];
        $actionName=$func[1];
        // echo $controllerName.":".$actionName;
        //做对比
        //先获取权限信息
        $nodelist=session('nodelist');
        //判断访问控制器是否存在 或者访问的控制器的方法是否存在于权限列表里
        // dd($nodelist);
        if (empty($nodelist[$controllerName]) || !in_array($actionName,$nodelist[$controllerName])) {
            // echo 1;
                    // return 1;
        $mid_params = 1;
        $user = 1;
        // $request->merge($mid_params);//合并参数
                    return redirect('/aa/index');
        }
        //执行下个请求
        return $next($request);
        }else{
            return redirect('/adminlogin');
        }
        // return $next($request);
    }
}
