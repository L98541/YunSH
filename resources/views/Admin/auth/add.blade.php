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
/*            {*/
/*    * { touch-action: pan-y; } */
/*}*/
    </style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight ">  
            <div class="row">
                <div class="col-sm-20">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>添加权限</h5>
                        </div>
                        <div class="ibox-content">
                            
                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter >
                                                <div>
                                                    <label for="name">权限名称:</label>
                                                        <input type="text" name="authname" class="form-control authname" id="name"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="name">权限控制器:</label>
                                                        <input type="text" name="clname" class="form-control clname" id="name"><span></span>
                                                </div><br> 
                                                <div>
                                                    <label for="name">权限控制器方法:</label>
                                                        <input type="text" name="clff" class="form-control clff" id="name"><span></span>
                                                </div><br>                                                  
                                        
                                            <button type="button" class="btn btn-white"  data-dismiss="modal">关闭</button>
                                            <!--<button type="button" class="btn btn-primary useradd1111 yz1"    id="useradd" >保存</button><span></span>-->
                                              <!--{{csrf_field()}}-->
                                            <!--<input type="submit"  class="btn btn-primary useradd1111 yz1" value="添加">-->
                                            <button class="btn btn-primary useradd1111 yz1" onclick="add()">添加</button>
                                        </div>
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
</body>
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    function add(){
        $.ajax({
            type:'post',
            url:'/auth',
            dataType:'json',
            data:{
                name:$('.authname').val(),
                mname:$('.clname').val(),
                aname:$('.clff').val()
                
            },success:function(data){
               if(data){
                     swal("添加成功！", "成功添加一条权限。", "success");
               }else{
                     swal("添加失败！", "请联系管理员解决此问题!。", "success");
               }
            }
            
        })
    }
</script>
</html>
