<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H+ 后台主题UI框架 - 登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Admin/css/font-awesome.css" rel="stylesheet">
    <link href="/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="/Admin/css/animate.css" rel="stylesheet">
    <link href="/Admin/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">Y</h1>

            </div>
            <h3>欢迎使用 YunSH</h3>


                <div class="form-group">
                    <input type="name" class="form-control name" class="name"name="name" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control password" name="password"placeholder="密码" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" onclick="login()">登 录</button>


                <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a>
                </p>

        </div>
    </div>

    <!-- 全局js -->
    <script src="/Admin/js/jquery.min.js"></script>
    <script src="/Admin/js/bootstrap.min.js"></script>
    <script src="/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    <!--统计代码，可删除-->

</body>
<script>
 $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    function login(){
        // alert(123);?
        $.ajax({
            type:'post',
            url:'/adminlogin',
            jsonType:"json",
            data:{
                name:$('.name').val(),
                password:$('.password').val()
            },success:function(data){
                // console.log($data)
                if(data == 1){
                    // alert(123)
                    console.log(data);
                    swal({
                          title: '登陆成功',
                            text: '马上为你跳转到后台,',
                            type: 'success'
                           
                    },function(){
                         
                        $(location).attr('href', '/admin'
                        );}
                    )
                }else{
                    swal({
                          title: '登陆失败',
                            text: '账号或密码错误',
                            type: 'error'
                    }
                    ) 
                }
            }
        })
    }
</script>
</html>
