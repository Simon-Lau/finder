<?php /* Smarty version 2.6.26, created on 2015-04-22 08:39:27
         compiled from user_info_login.tpl */ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Finder | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="../../ColorAdmin/assets/plugins/jquery-ui-1.10.4/jquery-ui.css" rel="stylesheet" />
	<link href="../../ColorAdmin/assets/plugins/bootstrap-3.1.1/css/bootstrap.css" rel="stylesheet" />
	<link href="../../ColorAdmin/assets/plugins/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" />
	<link href="../../ColorAdmin/assets/css/animate.css" rel="stylesheet" />
	<link href="../../ColorAdmin/assets/css/style.css" rel="stylesheet" />
	<link href="../../ColorAdmin/assets/css/style-responsive.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login bg-black animated fadeInDown">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> Finder
                    <small>every thing is new</small>
                </div>
                <div class="icon">
                    <button type="submit" class="btn btn-success btn-lg" id="sign_up">Sign  up</button>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <div><label><?php echo $this->_tpl_vars['login_error']; ?>
</label></div>
                <form action="login.do" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" class="form-control input-lg" placeholder="User Name/ Phone Number" name="user_id" value="<?php echo $this->_tpl_vars['user_id']; ?>
"/>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-lg" placeholder="Password"  name="password" id="password" value="<?php echo $this->_tpl_vars['user_password']; ?>
"/>
                    </div>
                    <label class="checkbox m-b-20">
                        <input type="checkbox" /> Remember Me
                    </label>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg" id="login">Sign  in</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
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
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		$(document).ready(function() {
			App.init();
		});
		$("#login").click(function(event) {
			var userId = $("#user_id").val();
			var password = $("#password").val();
			console.log(userId+"   "+password);
		});
                
                $('#sign_up').click(function(event){
                    window.location = "sign.do";
                });
                
	</script>
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../ColorAdmin/assets/js/analytics.js','ga');
    
      // ga('create', 'UA-53034621-1', 'sean-theme.com');
      // ga('send', 'pageview');
    
    </script>
</body>
</html>