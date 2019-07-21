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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
    
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight ">  
            <div class="row">
                <div class="col-sm-20">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>分类列表</h5>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="搜索表格...">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter >
                                <thead>
                                        <tr>

                                            <th >id</th>
                                            <th>分类名</th>

                                            <th>pid</th>
                                            <th>path</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr class="gradeX">

                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->pid}}</td>
                                            <td>{{$value->path}}</td>
                                        <!--</tr>-->
                                        <td >
                                                <button class="btn btn-info btn-sm " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">修改</button>
                                                <button class="btn btn-danger btn-sm delect" onclick="del({{$value->id or 'default'}})">删除</button>
                                                </td>
                                        </tr>
                                        @endforeach
                                     
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
                $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });
        
    </script>
<!--    $('.demo3').click(function () {-->
<!--    swal({-->
<!--        title: "您确定要删除这条信息吗",-->
<!--        text: "删除后将无法恢复，请谨慎操作！",-->
<!--        type: "warning",-->
<!--        showCancelButton: true,-->
<!--        confirmButtonColor: "#DD6B55",-->
<!--        confirmButtonText: "删除",-->
<!--        closeOnConfirm: false-->
<!--    }, function () {-->
<!--        swal("删除成功！", "您已经永久删除了这条信息。", "success");-->
<!--    });-->
<!--});-->
    
    
    
  <script>
   $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      function del(id){
              swal({
           title: "您确定要删除这条信息吗",
           text: "删除后将无法恢复，请谨慎操作！",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "删除",
           closeOnConfirm: false
       }, function (isTrue) {
        //   swal("删除成功！", "您已经永久删除了这条信息。", "success");
        if(istrue =true){
            $.ajax({
                type:'POST',
                url:'/admincates/'+id,
                data:{
                    _method: 'delete'
                },success:function(data){
                    if(data ==1){
                        swal({
                            title: '删除成功',
                            text: '您已经永久删除了这条信息,',
                            type: 'success'
                        },function() {
                            window.location.reload()
                        },)
                    }else if(data !== 1){
                        swal({
                            title: '非法删除操作',
                            text: '请联系管理员,',
                            type: 'success'
                        },function() {
                            window.location.reload()
                        },)
                    }
                }
            })
        }
       });
      }
  </script>
</body>

</html>
