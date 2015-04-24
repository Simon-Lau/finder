<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Color Admin | Page with Right Sidebar</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="simonLau" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="../../ColorAdmin/assets/plugins/jquery-ui-1.10.4/jquery-ui.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/plugins/bootstrap-3.1.1/css/bootstrap.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/plugins/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/css/animate.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/css/style.css" rel="stylesheet" />
        <link href="../../ColorAdmin/assets/css/style-responsive.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
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
        <div id="page-container" class="fade page-with-right-sidebar">
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
                                <img src="../../../uploads/<!--{$user_pic_id}-->" alt="" /> 
                                <input type="hidden" id="user_pic_id" value="<!--{$user_pic_id}-->" />
                                <span class="hidden-xs" id="user_name" data-value="<!--{$user_name}-->"><!--{$user_name}--></span> <b class="caret"></b>
                                <div class="progress progress-striped progress-sm active pull-right m-t-5">
                                     <div class="progress-bar progress-bar-success" style="width: 40%">Grade 40%</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li class="arrow"></li>
                                <li><a href="javascript:;">Edit Profile</a></li>
                                <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                                <li><a href="../calendar/index.do">Calendar</a></li>
                                <li><a href="../setting/index.do">Setting</a></li>
                                <li class="divider"></li>
                                <li><a href="../login/index.do">Log Out</a></li>
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
                <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li><a href="javascript:;">Home</a></li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">Finder <small>find a new world here...</small></h1>
                <!-- end page-header -->
                <!-- begin row -->
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end #content -->

            <!-- begin #footer -->
            <div id="footer" class="footer">
                &copy; 2015 Finder Coop - Simon Lau All Rights Reserved
            </div>
            <!-- end #footer -->

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
    </body>
</html>
