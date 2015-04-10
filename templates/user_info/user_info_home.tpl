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
                        <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> Finder </a>
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
                                <span class="hidden-xs" id="user_name" data-value="<!--{$user_name}-->"><!--{$user_name}--></span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li class="arrow"></li>
                                <li><a href="javascript:;">Edit Profile</a></li>
                                <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                                <li><a href="javascript:;">Calendar</a></li>
                                <li><a href="javascript:;">Setting</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:;">Log Out</a></li>
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
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-state bg-purple">
                            <div class="state-icon">
                                <a href="javascript:;" data-toggle="modal" data-target="#myModal" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div class="state-info">
                                <h4>Message</h4>
                                <p>3,291,922</p>	
                            </div>
                            <div class="state-link">
                                <a href="javascript:;">Write New <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-state bg-blue">
                            <div class="state-icon"><a href="javascript:;"><i class="fa fa-chain-broken"></i></a></div>
                            <div class="state-info">
                                <h4>Activity</h4>
                                <p>20.44%</p>	
                            </div>
                            <div class="state-link">
                                <a href="javascript:;">Write New <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-state bg-green">
                            <div class="state-icon"><a href="javascript:;"><i class="fa fa-users"></i></a></div>
                            <div class="state-info">
                                <h4>Friends</h4>
                                <p>1,291,922</p>	
                            </div>
                            <div class="state-link">
                                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-state bg-red">
                            <div class="state-icon"><a href="javascript:;"><i class="fa fa-database"></i></a></div>
                            <div class="state-info">
                                <h4>Data</h4>
                                <p>00:12:23</p>	
                            </div>
                            <div class="state-link">
                                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                </div>
                <!-- end row -->
                <!--  Begin Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal form-bordered" action="http://localhost/finder/htdocs/user_info/home/addNewMood.do" 
                                  method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Message</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="btn-group m-r-5">
                                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-bold"></i></a>
                                        <a class="btn btn-white active" href="javascript:;"><i class="fa fa-italic"></i></a>
                                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-underline"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-left"></i></a>
                                        <a class="btn btn-white active" href="javascript:;"><i class="fa fa-align-center"></i></a>
                                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-right"></i></a>
                                        <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-justify"></i></a>
                                    </div>
                                    <input type="hidden" id="user_id" name="user_id" value="<!--{$user_id}-->" />
                                    <input type="hidden" id="user_name" name="user_name" value="<!--{$user_name}-->" />
                                    <textarea class="form-control no-rounded-corner" rows="5" name="mood_content" id="mood_content"></textarea>
                                    <div id="queue"></div>
                                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                                    <div class="gallery">
                                        <div class=" image mood_pic">
                                            <input type="hidden" id="mood_pic_id" name="mood_pic_id" value="" />
                                            <a href="" id = "show_img_href" data-lightbox="mood_pic">
                                                <img id ="show_img" src="">
                                            </a>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <label class="control-label col-md-2 col-sm-2 ui-sortable">Mood Type</label>
                                    <div class="col-md-4 col-sm-4 ui-sortable">
                                        <select class="form-control parsley-validated" id="mood_type" name="mood_type" data-required="true">
                                            <option selected="selected" value="1">Public</option>
                                            <option value="2">Private</option>
                                            <option value="3">Friends</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--  End Modal -->
                <!-- begin row -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs  nav-justified nav-justified-mobile">
                            <li class="active"><a href="#default-tab-1" data-toggle="tab">Hot</a></li>
                            <li class=""><a href="#default-tab-2" data-toggle="tab">Nearby</a></li>
                            <li class=""><a href="#default-tab-3" data-toggle="tab">Friends</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="default-tab-1">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                    <!--{foreach from=$timeline item=time}-->    
                                        <div class="panel panel-inverse">
                                            <div class="panel-heading">
                                                <div class="panel-heading-btn">
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                                </div>									      
                                            </div>
                                            <div class="panel-body">
                                                <div class="timeline-header">
                                                    <span class="userimage"><img src="../../../uploads/<!--{$time.user_pic_id}-->" /></span>
                                                    <span class="username"><!--{$time.user_name}--></span>
                                                    <span class="pull-right text-muted"><!--{$time.user_visit}--></span>
                                                </div>
                                                <div class="timeline-content">
                                                    <h4 class="template-title">
                                                        <i class="fa fa-map-marker text-danger fa-fw"></i>
                                                        795 Folsom Ave, Suite 600 San Francisco, CA 94107
                                                    </h4>
                                                    <p><!--{$time.mood_content}--></p>
                                                    <div class="gallery">
                                                        <div class=" image user_pic">
                                                            <a href="../../../uploads/<!--{$time.mood_pic_id}-->"  data-lightbox="user_pic">
                                                                <img id ="show_img" src="../../../uploads/<!--{$time.mood_pic_id}-->">
                                                            </a>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="javascript:;" class="m-r-15"><i class="fa fa-thumbs-up fa-fw"></i> Like(<!--{$time.user_like}-->)</a>
                                                    <a href="javascript:;" class="m-r-15"><i class="fa fa-thumbs-o-down fa-fw"></i> Hit(<!--{$time.user_hit}-->)</a>
                                                    <a href="javascript:;"><i class="fa fa-comments fa-fw"></i> Comment</a>
                                                </div>
                                            </div>
                                        </div>
                                    <!--{/foreach}-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="default-tab-2">
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                                </blockquote>
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <p>
                                    Nullam ac sapien justo. Nam augue mauris, malesuada non magna sed, feugiat blandit ligula. 
                                    In tristique tincidunt purus id iaculis. Pellentesque volutpat tortor a mauris convallis, 
                                    sit amet scelerisque lectus adipiscing.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="default-tab-3">
                                <p>
                                    <span class="fa-stack fa-4x pull-left m-r-10">
                                        <i class="fa fa-square-o fa-stack-2x"></i>
                                        <i class="fa fa-twitter fa-stack-1x"></i>
                                    </span>
                                    Praesent tincidunt nulla ut elit vestibulum viverra. Sed placerat magna eget eros accumsan elementum. 
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis lobortis neque. 
                                    Maecenas justo odio, bibendum fringilla quam nec, commodo rutrum quam. 
                                    Donec cursus erat in lacus congue sodales. Nunc bibendum id augue sit amet placerat. 
                                    Quisque et quam id felis tempus volutpat at at diam. Vivamus ac diam turpis.Sed at lacinia augue. 
                                    Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla. 
                                    Quisque adipiscing dui nec orci fermentum blandit.
                                    Sed at lacinia augue. Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla. 
                                    Quisque adipiscing dui nec orci fermentum blandit.
                                </p>
                            </div>
                        </div>
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
        <script type="text/javascript">
            $(function () {
                $('#file_upload').uploadify({
                    'swf': '../../uploadify/uploadify.swf',
                    'uploader': '../../uploadify/uploadify_pic.php',
                    'formData': {},
                    'onUploadStart': function (file) {
                        var user_name = $('#user_name').attr('data-value');
                        var timestamp = new Date().getTime();
                        var mood_pic_id = user_name + "_" + timestamp;
                        $('#file_upload').uploadify('settings', 'formData',{'mood_pic_id':mood_pic_id});
                    },
                    'onUploadSuccess': function (file, data, response) {
                            var formData = $('#file_upload').uploadify('settings', 'formData');
                            var file_name = "../../../uploads/mood_pic_" + formData.mood_pic_id + file.type;
                            $('#mood_pic_id').val("mood_pic_" + formData.mood_pic_id + file.type);
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
    </body>
</html>
