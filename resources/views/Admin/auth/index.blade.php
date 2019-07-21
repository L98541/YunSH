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
                            <h5>用户列表</h5>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="搜索表格...">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter >
                                <thead>
                                        <tr>
                                            <th >ID</th>
                                            <th>权限名</th>
                                            <th>权限控制器</th>
                                            <th>权限方法</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr class="gradeX">
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->mname}}</td>
                                            <td>{{$value->aname}}</td>
                                            <td >
                                                <button class="btn btn-info btn-sm " type="button" class="btn btn-primary" onclick="authedit({{$value->id}})" data-toggle="modal" data-target="#myModal5">修改</button>
                                                <button class="btn btn-danger btn-sm delect" onclick="del({{$value->id}})" >删除</button>
                                                <button class="btn btn-primary btn-sm delect" >会员详情</button>
                                                </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">权限修改</h4>
                                            <small class="font-bold"><script type="text/javascript" src="https://api.lwl12.com/hitokoto/v1?encode=js&charset=utf-8"></script><span id="lwlhitokoto"><script>lwlhitokoto()</script></span>
                                        </div>
                                        <div class="modal-body">
                                                <div>
                                                    <label for="ID">ID:</label>
                                                        <input  type="text"  class="form-control authid " name="ID"  disabled placeholder="已被禁用">
                                                </div><br>                                    
                                                <div>
                                                    <label for="edit">权限名:</label>
                                                        <input  type="text"  class="form-control username authname usernameedit"  name="edit" name="edit1" placeholder="已被禁用"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="status" >脚本地址:</label>
                                                        <select   name="pid" class="form-control">
                                                            <option value="0"  >------请选择------</option>
                                                            @foreach($cates as $value)
                                                            <option value="{{$value->id}}" class="cateid">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                </div><br>
                                                <div>
                                                    <label for="balance">权限方法:</label>
                                                        <input  type="text"  class="form-control balance authff " name="balance"><span></span>
                                                </div><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                            <input type="hidden" id="editid" value="">
                                            <button type="button" class="btn btn-primary Confirm" id="authffedit" >修改</button>
                                        </div>
                                    </div>
                                </div>
                                    </tbody>
                                      <tr>
                                        <td><button class="btn btn-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser">添加用户</button></td></td>
                                            <td colspan="99">
                                                <ul class="pagination pull-right "></ul>
                                            </td>
                                        </tr>
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
        // $('.useradd1111').click(function(){
        //     var inp =$('.yz').val();
        //     if(inp ==''){
        //         $('.useradd1111').attr("disabled",true);
        //         return false;
        //     }else{
        //         $('.useradd1111').removeAttr('disabled');
                
        //     }
        // })
        
        
    </script>
    <script>


    </script>
    <!-- 获取用户数据 -->
    <script>
    //获取数据
    function authedit(id){
        //alert(id);
        // $('.authid').val($value.id)
        $.ajax({
            type:'GET',
            url:'/auth/'+id+'/edit',
            dataType:'json',
            data:{
                
            },
            success:function(data){
                //console.log(data)
                $("#editid").val(id);
                $('.authid').val(id);
                $('.authname').val(data.name);
                $('.authcl').val(data.mname);
                $('.authff').val(data.aname);
            }
            
        })
    }
    

    
    </script>
    <!--修改操作-->
    <script>

$('#authffedit').click(function () {
     $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    swal({
        title: "您确定要删除这条信息吗",
        text: "修改后将无法恢复，请谨慎操作！",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "删除",
        closeOnConfirm: false
    }, function (istrue) {
        var id = $("#editid").val();
        // swal("删除成功！", "您已经永久删除了这条信息。", "success");
        $.ajax({
            type:'post',
            url:'/auth/'+$("#editid").val(),
            data:{
                _method: 'PATCH',
                    name:$(".authname").val(),
                    mname:$(".authcl").val(),
                    aname:$(".authff").val(),
            },success:function(data){
                    if(data == 1){
                        swal("修改成功！", "您已经永久修改了这条信息。", "success");
                        // console.log(data)
                    }else{
                         swal("修改失败！", "请联系超级管理员解决此问题。", "success");
                    }
            }
        })
    });
});
    </script>
    <script>
        function del(id){
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
               swal({
        title: "您确定要删除这条信息吗",
        text: "删除后将无法恢复，请谨慎操作！",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "删除",
        closeOnConfirm: false
    }, function (istrue) {
        // swal("删除成功！", "您已经永久删除了这条信息。", "success");
        $.ajax({
            type:'post',
            url:'/auth/'+id,
            data:{
                 _method: 'delete'
            },success:function(data){
               if(data == 1){
                   swal("删除成功！", "您已经永久删除了这条信息。", "success");
               }
            }
        })
    });
        }
        
        
    </script>
</body>

</html>
