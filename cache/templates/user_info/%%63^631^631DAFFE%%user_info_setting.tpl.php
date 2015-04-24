<?php /* Smarty version 2.6.26, created on 2015-04-10 17:31:34
         compiled from user_info_setting.tpl */ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"><!--<![endif]--><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Color Admin | Form Validation</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="../../ColorAdmin/assets/plugins/jquery-ui-1.10.4/jquery-ui.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/plugins/bootstrap-3.1.1/css/bootstrap.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/plugins/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/css/animate.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/css/style.css" rel="stylesheet" /> 
        <link href="../../ColorAdmin/assets/css/style-responsive.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="../../ColorAdmin/assets/plugins/parsley/css/parsley.css" rel="stylesheet">
        <link href="../../ColorAdmin/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/css/isotope.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/plugins/lightbox/lightbox.css" rel="stylesheet" />
        <link href="../../uploadify/uploadify.css" rel="stylesheet" type="text/css" >

        <!-- ================== END PAGE LEVEL STYLE ================== -->
        <style type="text/css">
        body {
                font: 13px Arial, Helvetica, Sans-serif;
        }
        </style>
    </head>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade">
            <!-- begin #header -->
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <!-- begin container-fluid -->
                <div class="container-fluid">
                    <!-- begin mobile sidebar expand / collapse button -->
                    <div class="navbar-header">
                        <a href="" class="navbar-brand"><span class="navbar-logo"></span> Finder </a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- end mobile sidebar expand / collapse button -->

                    <!-- begin header navigation right -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <form class="navbar-form full-width">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter keyword" />
                                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                                <i class="fa fa-bell-o"></i>
                                <span class="label">5</span>
                            </a>
                            <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                                <li class="dropdown-header">Notifications (5)</li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left media-object bg-red"><i class="fa fa-bug"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Server Error Reports</h6>
                                            <div class="text-muted">3 minutes ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left"><img src="../../ColorAdmin/assets/img/user-1.jpg" class="media-object" alt="" /></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">John Smith</h6>
                                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                            <div class="text-muted">25 minutes ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left"><img src="../../ColorAdmin/assets/img/user-2.jpg" class="media-object" alt="" /></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Olivia</h6>
                                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                            <div class="text-muted">35 minutes ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left media-object bg-green"><i class="fa fa-plus"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading"> New User Registered</h6>
                                            <div class="text-muted">1 hour ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left media-object bg-blue"><i class="fa fa-envelope"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading"> New Email From John</h6>
                                            <div class="text-muted">2 hour ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-footer text-center">
                                    <a href="javascript:;">View more</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../../../uploads/<?php echo $this->_tpl_vars['user_pic_id']; ?>
" alt="" /> 
                                <input type="hidden" id="user_pic_id" value="<?php echo $this->_tpl_vars['user_pic_id']; ?>
" />
                                <span class="hidden-xs" id="user_name" data-value="<?php echo $this->_tpl_vars['user_name']; ?>
"><?php echo $this->_tpl_vars['user_name']; ?>
</span> <b class="caret"></b>
                                <div class="progress progress-striped progress-sm active pull-right m-t-5">
                                     <div class="progress-bar progress-bar-success" style="width: 40%">Grade 40%</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li class="arrow"></li>
                                <li><a href="javascript:;">Edit Profile</a></li>
                                <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                                <li><a href="http://localhost/finder/htdocs/user_info/calendar/index.do">Calendar</a></li>
                                <li><a href="http://localhost/finder/htdocs/user_info/setting/index.do">Setting</a></li>
                                <li class="divider"></li>
                                <li><a href="http://localhost/finder/htdocs/user_info/login/index.do">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- end header navigation right -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end #header -->

            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin page-header -->
                <h1 class="page-header">Sign Up<small>  form your presonal information here</small></h1>
                <!-- end page-header -->

                <!-- begin row -->
                <div class="row">
                    <!-- begin col-8 -->
                    <div class="col-md-8 col-sm-8 ui-sortable">
                        <!-- begin panel -->
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">Basic Form Validation</h4>
                            </div>
                            <div class="panel-body panel-form">
                                <form class="form-horizontal form-bordered" action="http://localhost/finder/htdocs/user_info/login/signUp.do" method="POST" data-validate="parsley">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable" for="user_name">User Name * :</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <input class="form-control parsley-validated" id="user_name" name="user_name" data-required="true" placeholder="nick name" type="text">
                                            <label id="user_test_label"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable" for="user_phone">Phone * :</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <input class="form-control parsley-validated" id="user_phone" name="user_phone" data-trigger="change" data-type="phone" data-required="true" placeholder="XXX-XXXX-XXXX" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable" for="user_password">Password * :</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <input class="form-control parsley-validated" id="user_password" name="user_password"  data-required="true"  type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable" for="user_password_2">Password Again * :</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <input class="form-control parsley-validated" id="user_password_2" name="user_password_2"  data-required="true" type="password">
                                            <label id="password_test_label"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable" for="user_email">Email  :</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <input class="form-control parsley-validated" id="user_email" name="user_email" data-trigger="change" data-type="email" placeholder="Email" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable" for="user_website">WeiBo:</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <input class="form-control parsley-validated" id="user_website" name="user_website" data-trigger="change"  placeholder="weibo_name" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable" for="message">Message (20 chars min, 200 max) :</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <textarea class="form-control parsley-validated" id="user_message" name="user_message" rows="4" data-trigger="keyup" data-rangelength="[10,200]" placeholder="Range from 10 - 200"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label col-md-4  col-sm-4 ui-sortable">Birth Date</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <input class="form-control" id="user_birth" name="user_birth"  placeholder="YYYY-MM" data-date-format="yyyy-mm" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable">Gender</label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <select class="form-control parsley-validated" id="user_gender" name="user_gender" data-required="true">
                                                <option selected="selected" value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <input id ="user_pic_id" name="user_pic_id" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>
                                        <div class="col-md-6 col-sm-6 ui-sortable">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>  
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end panel -->
                    </div>
                    <!-- end col-8 -->
                    <div class="col-md-2  col-sm-2 ui-sortable">
	                    <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">Your picture here</h4>
                            </div>
	                        <div class="panel-body" >
	                           <form>
                                    <div id="queue"></div>
                                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                                </form>
                                <div class="gallery">
                                    <div class=" image user_pic">
                                        <a href="" id = "show_img_href" data-lightbox="user_pic">
                                            <img id ="show_img" src="">
                                        </a>                                        
                                    </div>
                                </div>
	                        </div>
	                </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end #content -->

            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

        <!-- ================== BEGIN BASE JS ================== -->
        <script src="../../ColorAdmin/assets/plugins/jquery-1.7.2/jquery-1.7.2.js"></script>
        <script src="../../ColorAdmin/assets/plugins/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
        <script src="../../ColorAdmin/assets/plugins/bootstrap-3.1.1/js/bootstrap.min.js"></script>
        <script src="../../ColorAdmin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../../ColorAdmin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        <!--[if lt IE 9]>
                <script src="assets/crossbrowserjs/html5shiv.js"></script>
                <script src="assets/crossbrowserjs/respond.min.js"></script>
                <script src="assets/crossbrowserjs/excanvas.min.js"></script>
        <![endif]-->
        <script src="../../ColorAdmin/assets/plugins/parsley/js/parsley.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="../../ColorAdmin/assets/js/apps.js"></script>
        <script src="../../uploadify/jquery.uploadify.js"></script>
        <script src="../../ColorAdmin/assets/plugins/jquery-isotope/jquery.isotope.js"></script>
        <script src="../../ColorAdmin/assets/plugins/lightbox/lightbox.js"></script>
        <script src="../../ColorAdmin/assets/js/gallery.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function () {
                    App.init();
                    $("#user_birth").datepicker({todayHighlight:true,autoclose:true,minViewMode:1});
                });
            $('#user_password_2').change(function(){
               var password_1 = $('#user_password').val();
               var password_2 = $('#user_password_2').val();
               if(password_1 !== password_2){
                   $('#password_test_label').attr("class","bg-warning");   
                   $('#password_test_label').html("password not the same");
                }else{
                     $('#password_test_label').html("");
                }
           });   
          $('#user_name').change(function(){
            var data = {};
            data.user_name = $('#user_name').val();
            $.ajax({
              url:'http://localhost/finder/htdocs/user_info/login/AjaxTestUserName.do',
              type:'get',
              async:false,
              data:data,
              dataType:'json',
              success:function(data){
                if(data.msg  === 1){
                  $('#user_test_label').attr("class","bg-success");   
                  $('#user_test_label').html("you can use it");
                }else{
                  $('#user_test_label').attr("class","bg-warning");   
                  $('#user_test_label').html("already exists");
                }
              }
            });
         });
        </script>
        <script type="text/javascript">
            $(function() {
                $('#file_upload').uploadify({
                    'swf'      : '../../uploadify/uploadify.swf',
                    'uploader' : '../../uploadify/uploadify.php',
                    'fromData' : { },
                    'onUploadStart': function(file){
                         var user_name = $('#user_name').val();
                        $('#file_upload').uploadify('settings','formData',{'user_name':user_name});
                    },
                    'onUploadSuccess' : function(file, data, response){
                        var user_name = $('#user_name').val();
                        var file_name = "../../../uploads/user_tag_"+user_name+file.type;
                        $('#user_pic_id').val("user_tag_"+user_name+file.type);
                        $('#show_img').attr("src", file_name);
                        $('#show_img_href').attr("href", file_name);
                    }
                });
            });
	</script>
        <script>
                (function (i, s, o, g, r, a, m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)}, i[r].l = 1 * new Date()
                ; a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '../../ColorAdmin/assets/js/analytics.js', 'ga');
                        ga('create', 'UA-53034621-1', 'sean-theme.com');
                ga('send', 'pageview');

        </script>


    </body></html>