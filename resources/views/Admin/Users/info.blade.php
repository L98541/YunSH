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
                                            <th>兴趣</th>
                                            <!--<th>密码</th></th>-->
                                            <th>性别</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <!-- <td><input type="checkbox" name="item"></td> -->
                                            <td>{{$info->id or ''}}</td>
                                            <td>{{$info->hobby  or ''}}</td>
                                            <td>{{$info->sex  or ''}}</td>
                                        </tr>
                                </div>
                                    </tbody>
                                    <tfoot>
                                      
                                        
                                      
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
  

</script>

</body>

</html>
