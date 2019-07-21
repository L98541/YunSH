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
                                            <!-- <td><input type="checkbox" name="item"></td> -->
                                            <th >ID</th>
                                            <th>用户名</th>
                                            <!--<th>密码</th></th>-->
                                            <th>余额</th>
                                            <th>用户邮箱</th>
                                            <th>用户QQ</th>
                                            <!--<th>登录ip</th>-->
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr class="gradeX">
                                            <!-- <td><input type="checkbox" name="item"></td> -->
                                            <td value="{{$value->id}}">{{$value->id}}</td>
                                            <td>{{$value->username}}</td>
                                            <!--<td>{{$value->password}}</td>-->
                                            <td>{{$value->balance}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->userqq}}</td>
                                            <!--<td>{{$value->loginip}}</td>-->
                                            <td>{{$value->status}}</td>
                                            <td>{{$value->phone}}</td>
                                            <td >
                                                <button class="btn btn-info btn-sm " type="button"onclick="edit({{$value->id or 'default'}})" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">修改</button>
                                                <button class="btn btn-danger btn-sm delect" onclick="del({{$value->id or 'default'}})">删除</button>
                                                <button class="btn btn-primary btn-sm delect" onclick="location.href='/useradd/{{$value->id}}'">会员详情</button>
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
                                                        <input  type="text"  class="form-control username useredityz usernameedit" reminder="用户名不能为空" name="edit" name="edit1" placeholder=""><span></span>
                                                </div><br>
                                                    <div>
                                                        <label for="password1">密码:</label>
                                                            <input  type="password"  class="form-control password useredityz passwordedit" reminder="密码不能为空"  placeholder=""><span></span>
                                                    </div><br>
                                                <div>
                                                    <label for="balance">余额:</label>
                                                        <input  type="text"  class="form-control balance " name="balance"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="email">用户邮箱:</label>
                                                        <input  type="text" name="email" reminder="邮箱不能为空" class="form-control email useredityz emailedit"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="QQ">用户QQ:</label>
                                                        <input  type="text" name="QQ"  class="form-control userqq "><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="phone">电话:</label>
                                                        <input  type="text" name="phone" reminder="电话不能为空"  class="form-control phone useredityz phoneedit"><span></span>
                                                </div><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                            <button type="button" class="btn btn-primary Confirm " onclick="useredit({{$value->id or 'default'}})" >修改</button>
                                        </div>
                                    </div>
                                </div>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td><button class="btn btn-info btn-sm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser">添加用户</button></td></td>
                                            <td colspan="99">
                                                <ul class="pagination pull-right "></ul>
                                            </td>
                                        </tr>
                                        
                                        <div class="modal inmodal fade" id="adduser" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">添加用户</h4>
                                            <small class="font-bold">
                                        </div>
                                        <div class="modal-body ">

                                                <div>
                                                    <label for="username">用户名:</label>
                                                        <input type="username"  class="form-control username1 uaernameadd yz" reminder="用户名不能为空" name="username" id="username"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="password">用户密码:</label>
                                                        <input type="password"  class="form-control yz" reminder="密码不能为空" name="password" id="password"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="repassword">重复密码:</label>
                                                        <input type="password"  class="form-control yz" reminder="重复密码不能为空" name="repassword" id="repassword"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="balance">余额:</label>
                                                        <input type="balance" name="balance"   class="form-control balance " id="balance"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="email1">邮箱:</label>
                                                        <input type="email1" name="email" reminder="邮箱不能为空" class="form-control yz emailyz"  id="email"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="userqq">用户QQ:</label>
                                                        <input type="userqq" name="userqq"  class="form-control " id="userqq"><span></span>
                                                </div><br>
                                                <div>
                                                    <label for="status" >用户状态:</label>
                                                        <select name="" id="status"  class="form-control">
                                                            <option value="1" >开启</option>
                                                            <option value="2" >禁用</option>
                                                        </select>
                                                </div><br>
                                                <div>
                                                    <label for="phone1">电话:</label>
                                                        <input type="phone1" name="phone" reminder="手机号不能为空"  class="form-control yz  phone1 " id="useraddphone"><span></span>
                                                </div><br>
                                                 </div>
                                        <div class="modal-footer">
                                        
                                            <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                                            <button type="button" class="btn btn-primary useradd1111 yz1"    id="useradd" >保存</button><span></span>
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
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>
    <!-- 获取用户数据 -->
<script type="text/javascript">
        function edit(id){
            $.ajax({
                type:'GET',
                url:'/useradd/'+id+'/edit',
                data:{},
                dataType:'json',
                success:function (data){
                    // alert(123)
                    $('.id').val(id)
                    $(".username").val(data.username)
                    $(".balance").val(data.balance)
                    $(".password1").val(data.password)
                    $(".email").val(data.email)
                    $(".userqq").val(data.userqq)
                    $(".phone").val(data.phone)
                }
            });
            
        }
function useredit(id) {
      
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    swal({
        title: "您确定要修改这条信息吗",
        text: "数据无价,修改后将无法还原！",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "是的，我要修改！",
        cancelButtonText: "让我再考虑一下…",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm) {
        
        if (isConfirm == true) {
            // console.log($('.id').val())
            $.ajax({
                type: 'POST',
                url: '/useradd/' + $('.id').val(),
                data: {
                    _method: 'PATCH',
                    username:$(".username").val(),
                    password:$(".password").val(),
                    balance:$(".balance").val(),
                    email:$(".email").val(),
                    userqq:$(".userqq").val(),
                    phone:$(".phone").val()
                },
                success: function(data) {
                    // alert(data)
                    if (data == 1) {
                        swal("修改成功！", "您不能修改管理员数据", "success");
                        console.log(data)
                    }
                }
            }
       ) 
    }else if(isConfirm== false){
        swal("取消修改！", "您已取消修改", "success");
    }
       
    },
    )}
//修改用户数据验证


//用户名验证
$('.useredityz').blur(function(){
    reminder=$(this).attr("reminder");
    $(this).next("span").css('color','red').html(reminder);
});
$(".usernameedit").blur( function(){
       usernameedit=$(this).val()
        // alert(useredit1)
        if(usernameedit.match(/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/)==null){
            $(this).next("span").css("color",'red').html("字母开头，允许5-16字节，允许字母数字下划线");
        }else{
            // $('.usernameedit').blur(function(){
                $.ajax({
                    type:"POST",
                    url:"/usernameedityz/",
                    data:{
                        name:$('.usernameedit').val(),
                    },success:function(data){
                        if(data==1){
                            $('.usernameedit').next("span").css("color","red").html("用户名已存在");
                        }else{
                            $('.usernameedit').next("span").css("color","red").html("");
                        }
                    }
                }
                // )
            // }
            )
        }
    }
    )
//密码验证
$(".passwordedit").blur(function(){
    password=$('.passwordedit').val();
    // console.log(password)
    if(password.match(/^[a-zA-Z]\w{5,17}$/)==null){
        $(this).next("span").css('color','red').html("密码(以字母开头，长度在6~18之间，只能包含字母、数字和下划线)");
    }else{
        $(this).next("span").css('color','green').html("");
    }
})
//邮箱验证
$(".emailedit").blur(function(){
    email=$('.emailedit').val();
    if(email.match(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/)==null){
        $(this).next("span").css('color','red').html('邮箱格式不正确,请重新输入!!!');
    }else{
        $(this).next("span").css('color','green').html("");
    }
})

//手机号验证
$(".phoneedit").blur(function(){
    phone=$('.phoneedit').val();
    if(phone.match(/^1[3456789]\d{9}$/)==null){
        $(this).next("span").css('color','red').html('手机号码不能为空,请重新输入!!!');
    }else{
        // $(this).blur(function(){
            $.ajax({
                type:'POST',
                url:"/phoneedit/",
                data:{
                    phone:$('.phoneedit').val(),
                },success:function(data){
                    if(data == 1){
                        $('.phoneedit').next("span").css("color","red").html("手机号已存在");
                    }else{
                        $('.phoneedit').next("span").css("color","red").html("");
                    }
                }
            })
        }
        // )
    }
// }
)
// 添加用户数据验证
// var inp=$('.yz').val();
// console.log(inp)
// var 
// $('.yz1').click(function(){
//     // alert(13)
//   var inp=$('.yz').val();
//   console.log(inp)
//     if(inp=$('.yz').val() ==""){
//         $('.yz1').attr('disabled',true)
//           $(".yz").next("span").css("color","red").html("请确保每条信息不为空!!!");
        
         
        
//     }else{
//         $('#useradd').unbind('attr').attr('disabled',false);
//     }
// })











$('.yz').blur(function(){
    // console.log(123);
    reminder=$(this).attr("reminder");
    $(this).next("span").css("color","red").html(reminder);
});
 $("input[name='username']").blur(function(){
     username1=$(this).val();
     if(username1.match(/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/)==null){
         $(this).next("span").css("color","red").html("字母开头，允许5-16字节，允许字母数字下划线");
        // alert(1);
     }else{
        //
        // $('.username1').blur(function( ){
    $.ajax({
        type:'POST',
        url:'/username/',
        data:{
            name:username1
        },
        // dataType:"json",
        // alert(123),
        success:function(data){
            if(data == 1){
                console.log(data)
                 $("input[name='username']").next("span").css("color","red").html("用户名已存在");
            }else if(data== 2){
                console.log(data)
                // alert('不存在');
                 $("input[name='username']").next("span").css("color","green").html("");
                //  console.log('1')
            }
        }
    })
}
// )
     }
//  }
 );
 $("input[name='password']").blur(function(){
     password=$("input[name='password']").val();
     if(password.match(/^[a-zA-Z]\w{5,17}$/)==null){
         $("input[name='password']").next("span").css("color","red").html("密码(以字母开头，长度在6~18之间，只能包含字母、数字和下划线)");
         
     }else{
        //  alert(123456);
         $("input[name='password']").next("span").css("color","green").html("");
     }
 });
 $("input[name='repassword']").blur(function(){
     repassword=$("input[name='repassword']").val();
     if($("input[name='password']").val()==repassword){
         $("input[name='repassword']").next("span").css("color","green").html("");
     }else{
         $("input[name='repassword']").next("span").css("color","red").html("请确保两次密码输入一致!!!");
     }
 })
$(".emailyz").blur(function(){
    email=$('.emailyz').val();
    if(email.match(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/)==null){
        $(this).next("span").css('color','red').html('邮箱格式不正确,请重新输入!!!');
    }else{
        $(this).next("span").css('color','green').html("");
    }
})
 $("input[name='phone']").blur(function(){
     phone=$(this).val();
     if(phone.match(/^1[3456789]\d{9}$/)==null){
         $("input[name='phone1']").next("span").css("color","red").html("请输入正确的手机号");
        //  alert(123)
     }else{
        //  $('#useraddphone').blur(function(){
            //  alert(1)
             $.ajax({
                 type:'POST',
                 url:'/phone/',
                 data:{
                     phone:$('#useraddphone').val(),
                 },
                 success:function(data){
                     console.log(data)
                     if(data == 1){
                         $("input[name='phone']").next("span").css('color','red').html('手机号已存在');
                     }else{
                         $("input[name='phone']").next("span").css('color','green').html("");
                     }
                 }
             })
         }
        //  )
     }
//  }
 )
</script>
<!-- 添加用户 -->
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
$('#useradd').click(function(){
    var name = $('#username').val();
    var password =$('#password').val();
    var repassword =$('#repassword').val();
    var balance =$('#balance').val();
    var email =$('.emailyz').val();
    var userqq =$('#userqq').val();
    var selects= $('#selects').val();
    var phone= $('.phone1').val();
    // alert(phone);
    alert(email);
    //  var inp=$('.yz').val();
            if(name ==''){
                // $('.useradd1111').attr("disabled",true);
                 $(".yz").next("span").css("color","red").html("请确保每条信息不为空!!!");
                return false;
            }else if(password ==''){
                 $(".yz").next("span").css("color","red").html("请确保每条信息不为空!!!");
                return false;
            }else if(repassword =''){
                $(".yz").next("span").css("color","red").html("请确保每条信息不为空!!!");
                return false;
            }else if(phone == ''){
                  $(".yz").next("span").css("color","red").html("请确保每条信息不为空!!!");
                return false;
            }else{
                // $('.useradd1111').removeAttr('disabled');
                    $.post('/useradd',{
                            'username':name,
                            'password':password,
                            'repassword':repassword,
                            'balance':balance,
                            'email':email,
                            'userqq':userqq,
                            'status':status,
                            'phone':phone,
        
    },function(data){
        // alert(request)
        
        console.log(data)
         if(data==1){
              swal({
                    title: "恭喜你",
                    text: "添加用户成功", 
                    type: "success"},function(){
                        window.location.reload()
                    });
            //   
    }else{
                      swal({
                    title: "恭喜你",
                    text: "添加用户失败", 
                    type: "error"},function(){
                        window.location.reload()
                    });
    }
    
    });
                
            }

});
</script>
<script>

function del(id) {
    swal({
        title: "您确定要删除这条信息吗",
        text: "删除后将无法恢复，请谨慎操作！",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "删除",
        closeOnConfirm: false
    },
    function(istrue) {
        // console.log(123);
        if (istrue == true) {
            $.ajax({
                type: 'POST',
                url: '/useradd/' + id,
                data: {
                    _method: 'delete'
                },
                success: function(data) {
                    if (data == 1) {
                        swal({
                            title: '删除成功',
                            text: '您已经永久删除了这条信息,',
                            type: 'success'
                        },
                        function() {
                            window.location.reload()
                        },
                        )
                    } else if (data !== 1) {
                        swal({
                            title: '删除成功',
                            text: '您已经永久删除了这条信息,',
                            type: 'success'
                        },
                        function() {
                            window.location.reload()
                        })
                    }
                }
            })
        }
    });
};

</script>

</body>

</html>
