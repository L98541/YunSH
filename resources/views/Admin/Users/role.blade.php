<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - FooTable</title>
    <meta name="/Admin/keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="/Admin/description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/Admin/css/plugins/footable/footable.core.css" rel="stylesheet">
<link href="/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="/Admin/css/animate.css" rel="stylesheet">
    <!--<script type="text/javascript" src="http://api.hitokoto.us/rand?encode=js&charset=utf-8"></script>-->
    <link href="/Admin/css/style.css?v=4.1.0" rel="stylesheet">
    <style type="text/css">

    </style>
<!--<meta name="csrf-token" content="{{ csrf_token() }}">-->
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight ">  
            <div class="row">
                <div class="col-sm-20">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>用户详细</h5>
                        </div>
                        <form action="/saverole" method="post">
                        <div class="ibox-content">

                            <!--<table class="footable table table-stripped" data-page-size="8" data-filter=#filter >-->
                                    <tbody>
                                    
                                        <div class="modal-body">
                                                <div>
                                                    <label for="ID">ID:</label>
                                                        <input  type="text"  class="form-control id " name="ID"  disabled placeholder="{{$adminuser->id}}">
                                                </div><br>                                    
                                                <div>
                                                  
                                                    <label for="edit">用户名:</label>
                                                        <input  type="text"  class="form-control username useredityz usernameedit" reminder="用户名不能为空"  placeholder="{{$adminuser->name}}" name="edit" name="edit1" placeholder="">
                                                </div><br>
                                                <div>
                                                    <label for="phone">角色信息:</label>
                                                    @foreach($role as $value)
                                                        <input type="checkbox" name="rids[]" id="model1" value="{{$value->id,$rids}}" @if(in_array($value->id,$rids)) checked @endif >
                                                        <label for="model1">{{$value->name}}</label>
                                                        @endforeach
                                                </div><br>
                                        </div>
                                         
                                          <input type="hidden" value="{{$adminuser->id}}" name="uid">
                                        <div class="modal-footer">
                                            {{csrf_field()}}
                                           <input type="submit" value="修改权限">
                                        </div>
                                    </div>
                                    
                                </div>
                                    </tbody>
                                    <tfoot>
                                      </form>
                                        
                                      
                                    </div>
                                </div>
                               
                                        </div>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- 全局js -->
    <script src="/Admin/js/jquery.min.js"></script>
    <script src="/Admin/js/bootstrap.min.js"></script>
    <script src="/Admin/js/plugins/footable/footable.all.min.js"></script>

    <!-- 自定义js -->
    <script src="/Admin/js/content.js"></script>
    <script src="/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
 <script>
    //  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    //  var uid = $('#uid').val()
    //  function update(){
    //     $.ajax({
    //         type:'post',
    //         url:'/severole',
    //         data:{
    //             'uid':uid;
    //         },success:function(data){
    //             console.log(data)
    //         }
    //     })
    //  }
 </script>

</script>

</body>

</html>
