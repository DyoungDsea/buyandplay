<?php 
// echo md5("admin");
// die();
session_start(); ?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Buy and Bet : Admin</title>
<!--// Stylesheets //-->
<link href="webcontrol/assets/css/A.style.css%2bbootstrap.css%2cMcc.0ONHoLZfWm.css.pagespeed.cf.2IS1LTyY4Z.css" rel="stylesheet" media="screen"/>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link href="shared/toastr.min.css" rel="stylesheet">
<link rel="rel icon" href="assets/images/icon-.png">

<script type="text/javascript" src="webcontrol/assets/js/jquery.js.pagespeed.jm.ZzSiN_5Whq.js"></script>
<script src="webcontrol/assets/js/bootstrap.min.js%2bicheck.min.js.pagespeed.jc.iWFNLGOGoP.js">
</script>
<!-- <script>eval(mod_pagespeed_4faLXq7bXy);</script> -->
<!-- <script>eval(mod_pagespeed_THTTwgJFDR);</script> -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style>
    .loginwrapper{
        background-image: url(back.png);
    }
</style>
</head>

<body>
<!-- Wrapper Start -->
<div class="loginwrapper">
	<span class="circle"></span>
	<div class="loginone">
    	<header>
        	<a href="admin_main">
        	     <img style="max-width:250px" src="assets/images/buybets.png" alt="Buy and Bet">
        	     </a>
            <p>Enter your credentials to login to your account</p>
            <!-- <span style="color:red; font-size:20px;"><?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?></span> -->
        </header>
        <form method="post" action="loginprocess">
        	<div class="username">
        		<input type="text" class="form-control" name="email" placeholder="Enter your email" required/>
                <i class="glyphicon glyphicon-user"></i>
            </div>
            <div class="password">
            	<input type="password" class="form-control" name="password" placeholder="Enter your password" required/>
                <i class="glyphicon glyphicon-lock"></i>
            </div>
            
		
            <input type="submit" name="log" class="btn btn-primary style2" value="Sign In"/>
        </form>
        <footer>
        	<!-- <a href="#" class="forgot pull-left">I forgot my password</a> -->
            <div class="clear"></div>
        </footer>
    </div>
</div>
<!-- Wrapper End -->

<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');ga('create','UA-42761673-1','extracoding.com');ga('send','pageview');</script>
<script src="shared/toastr.min.js"></script>

<?php
if(isset($_SESSION['msg'])){ ?>
<script> toastr.info("<?php echo $_SESSION['msg']; ?>"); </script>
<?php } ?>
</body>

</html>
<?php
unset($_SESSION['msg']);
?>