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
body {
	font: 14px/150% microsoft yahei,tahoma;
	}
.clear {
	clear: both
	}
.RadioStyle input {
	display: none
	}
.RadioStyle label {
	border: 1px solid #00a4ff;
	padding: 2px 10px 2px 5px;
	line-height: 28px;
	min-width: 80px;
	text-align: center;
	float: left;
	margin: 2px;
	border-radius: 4px
	}
.RadioStyle input:checked + label {
	background: url(images/ico_checkon.svg) no-repeat right bottom;
	background-size: 21px 21px;
	color: #00a4ff
	}
    </style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight ">  
            <div class="row">
                <div class="col-sm-20">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>用户详细</h5>
                        </div>
                        <div class="ibox-content">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter >
                                <thead>
                                        <tr>
                                            <!-- <td><input type="checkbox" name="item"></td> -->
                                            <th >ID</th>
                                            <th>用户名</th>
                                            <!--<th>密码</th></th>-->
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $value)
                                        <tr class="gradeX">
                                            <!-- <td><input type="checkbox" name="item"></td> -->
                                            <td>{{$value->id or ''}}</td>
                                            <td>{{$value->name or ''}}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm delect" data-toggle="modal" data-target="#myModal5"onclick="edit({{$value->id or 'default'}})">修改</button>
                                                <button class="btn btn-danger btn-sm delect" onclick="del({{$value->id or ''}})">删除</button>
                                                <a href="/adminrole/{{$value->id}}"> <button class="btn btn-primary btn-sm delect" data-toggle="modal" onclick="addauth({{$value->id}})" data-target="#myModal6">添加权限</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">用户修改</h4>
                                            <small class="font-bold"><script type="text/javascript" src="https://api.lwl12.com/hitokoto/v1?encode=js&charset=utf-8"></script><span id="lwlhitokoto"><script>lwlhitokoto()</script></span>
                                        </div>
                                        <div class="modal-body">
                                                <div>
                                                    <label for="ID">ID:</label>
                                                        <input  type="text"  class="form-control id " name="ID"  disabled placeholder="已被禁用">
                                                </div><br>                                    
                                                <div>
                                                    <label for="edit">用户名:</label>
                                                        <input  type="text"  class="form-control editname" reminder="用户名不能为空" name="edit" name="edit1" placeholder=""><span></span>
                                                </div><br>
                                                    <div>
                                                        <label for="password1">密码:</label>
                                                            <input  type="password"  class="form-control editpassword  " reminder="密码不能为空"  placeholder=""><span></span>
                                                    </div><br>
                                               
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                            <button type="button" class="btn btn-primary Confirm " onclick="useredit({{$value->id or 'default'}})" >修改</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td><button class="btn btn-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser">添加管理员</button></td></td>
                                            <td colspan="99">
                                                <ul class="pagination pull-right "></ul>
                                            </td>
                                        </tr>
                                                                                <div class="modal inmodal fade" id="adduser" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">添加管理员</h4>
                                            <small class="font-bold">
                                        </div>
                                        <div class="modal-body ">

                                                <div>
                                                    <label for="username">用户名:</label>
                                                        <input type="username"  class="form-control username1 uaernameadd yz" reminder="用户名不能为空" name="username" id="username"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="password">用户密码:</label>
                                                        <input type="password"  class="form-control yz password" reminder="密码不能为空" name="password" id="password"><span></span>
                                                </div><br>
                                                 </div>
                                        <div class="modal-footer">
                                        
                                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                            <button type="button" class="btn btn-primary useradd1111 yz1"    id="useradd" >添加</button><span></span>
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
  

</script>

</body>
<script>
    function edit(id){
        // alert(23132)
        $.ajax({
            type:'get',
            url:'/adminuser/'+id+'/edit',
            data:{},
            dataType:'json',
            success:function (data){
                $('.id').val(id)
                $('.editname').val(data.name)
            }
        })
    }
        function useredit(id){
             
            swal(
                {title:"您确定要删除这条数据吗",
                    text:"删除后将无法恢复，请谨慎操作！",
                    type:"warning",
                    showCancelButton:true,
                    confirmButtonColor:"#DD6B55",
                    confirmButtonText:"确定删除！",
                    cancelButtonText:"取消",
                    closeOnConfirm:false,
                    closeOnCancel:false
                },
                function(isConfirm ){
                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                    if(isConfirm == true)
                    {
                        $.ajax({
                            type:'post',
                            url:'/adminuser/'+$('.id').val(),
                            data:{
                                _method: 'PATCH',
                                name:$('.editname').val(),
                                password:$('.editpassword').val()
                            },success:function(data){
                                if(data == 1){
                             swal({title:"修改成功！",
                            text:"您已经永久修改了这条数据。",
                            type:"success"},function(){window.location.reload()
                                
                            })
                                }
                            }
                        })

                    }else if(isConfirm == false){
                     swal("取消修改！", "您已取消修改", "success");
                }
                }
            )
        }
</script>



<!--,else if(istrue == false){-->
                    
<!--                        swal({title:"已取消",-->
<!--                            text:"您取消了删除操作！",-->
<!--                            type:"error"})-->
                    
<!--                }-->
<script>
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    function del(id){
          swal(
                {title:"您确定要删除这条数据吗",
                    text:"删除后将无法恢复，请谨慎操作！",
                    type:"warning",
                    showCancelButton:true,
                    confirmButtonColor:"#DD6B55",
                    confirmButtonText:"确定删除！",
                    cancelButtonText:"取消",
                    closeOnConfirm:false,
                    closeOnCancel:false
                },
                function(isConfirm)   {
                    if(isConfirm == true)
                    {
                         
                        $.ajax({
                            type:'post',
                            url:'/adminuser/'+id,
                            data:{
                                _method: 'delete'
                            },success:function(data){
                                if(data == true){
                                                  swal({
                    title: "恭喜你",
                    text: "删除管理员成功", 
                    type: "success"},function(){
                        window.location.reload()
                    });
                                }
                            }
                        })
                    }else if(isConfirm == false){
                        swal("取消修改！", "您已取消修改", "success");
            }
        }
    )
}
</script>
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $('#useradd').click(function(){
        // alert(123);?
        var name=$('.uaernameadd').val();
        var password=$('.password').val();
        $.ajax({
            type:'post',
            url:'/adminuser',
            data:{
            'name':name,
            'password':password,
            },success:function(data){
                if(data == 1){
                    
                     swal({
                    title: "恭喜你",
                    text: "添加用户成功", 
                    type: "success"},function(){
                        window.location.reload()
                    });
                }
            }

        })
    })
</script>
<script>
    function addpath(id){
        $('.id1').val(id);
        var name=$('.editname').val()
    }
    // function editpath(id){
    //     alert(id);
    //     $.ajax({
    //         type:'get',
    //         url:'/adminrole/'+id,
    //         data:{
                
    //         },success:function(data){
    //             console.log(data)
    //         }
    //     })
    // }
</script>
</html>
