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
                                            <th>商品名称</th>
                                             <th>商品分类</th>
                                            <th>商品简介</th>
                                            <th>商品数量</th>
                                            <th>商品价格</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr class="gradeX">

                                            <td>{{$value->id}}</td>
                                            <td>{{$value->sname}}</td>
                                            <td>{{$value->cname}}</td>
                                            <td>{{$value->descr}}</td>
                                            <td>{{$value->num}}</td>
                                            <td>{{$value->price}}</td>
                                        <!--</tr>-->
                                        <td >
                                                <button class="btn btn-info btn-sm " type="button" class="btn btn-primary editshop" data-toggle="modal" onclick="shopedit({{$value->id}})" data-target="#myModal5">修改</button>
                                                <button class="btn btn-danger btn-sm delect" onclick="del({{$value->id or 'default'}})">删除</button>
                                                </td>
                                        </tr>
                                        @endforeach
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
                                                    <label for="ID">商品ID:</label>
                                                        <input  type="text"  class="form-control shopid" name="ID"  disabled placeholder="已被禁用">
                                                </div><br>                                    
                                                <div>
                                                    <label for="shopname">商品名称:</label>
                                                        <input  type="text"  class="form-control shopname  "  name="edit" name="shopname" placeholder="已被禁用"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="address">脚本地址:</label>
                                                        <input  type="text"  class="form-control address  "  name="edit" name="address" placeholder="已被禁用"><span></span>
                                                </div><br>
                                                     <div>
                                                    <label for="status" >商品所在分类:</label>
                                                        <select   name="pid" class="form-control">
                                                            <option value="0"  >------请选择------</option>
                                                            @foreach($cates as $value)
                                                            <option value="{{$value->id}}" class="cateid">{{$value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                </div><br>
                                                <div>
                                                    <label for="descr">商品简介:</label>
                                                        <input  type="text"  class="form-control descr" name="descr"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="num">商品数量:</label>
                                                        <input  type="text"  class="form-control num" name="num"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="price">商品价格:</label>
                                                        <input  type="text"  class="form-control price" name="price"><span></span>
                                                </div><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                            <input type="hidden" id="editid" value="">
                                            <button type="button" class="btn btn-primary Confirm editshop" id="authffedit" >修改</button>
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
  //删除操作
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
        // alert(id);
        if(istrue){
            $.ajax({
                type:'POST',
                url:'/shop/'+id,
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
                    }
                }
            })
        }
      });
      }

  </script>
  <!--获取要修改的数据-->
  <script>
          function shopedit(id){
        //alert(id);
        // $('.authid').val($value.id)
        $.ajax({
            type:'GET',
            url:'/shop/'+id+'/edit',
            dataType:'json',
            data:{
                
            },
            success:function(data){
                //console.log(data)
                $(".shopid").val(id);
                $('.shopname').val(data.name);
                $('.address').val(data.address);
                $('.cateid').val(data.cate_uid);
                $('.descr').val(data.descr);
                $('.num').val(data.num);
                $('.price').val(data.price);
            }
            
        })
    }
  </script>
  <!--//修改操作-->
  
  <script>
      $('.editshop').click(function () {
     $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    swal({
        title: "您确定要修改这条信息吗",
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
            url:'/shop/'+$(".shopid").val(),
            data:{
                _method: 'PATCH',
                    name:$(".shopname").val(),
                    address:$(".address").val(),
                    cate_uid:$(".cateid").val(),
                    descr:$('.descr').val(),
                    num:$('.num').val(),
                    price:$('.price').val(),
            },success:function(data){
                    if(data == 1){
                        swal("修改成功！", "您已经永久修改了这条信息。", "success");
                        console.log(data)
                    }else{
                         swal("修改失败！", "请联系超级管理员解决此问题。", "success");
                          console.log(data)
                    }
            }
        })
    });
});
  </script>
</body>

</html>
