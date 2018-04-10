<?php
/*
Simple ajax live login script by asif18.com
*/
include 'library/koneksi.php';
if(isset($_SESSION['userid']) && $_SESSION['userid'] != ''){ // Redirect to secured user page if user logged in
	echo '<script type="text/javascript">window.location = "page.php"; </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- Bootstrap -->
    <link href="stylesheets/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="stylesheets/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Bootslider -->
    <link href="stylesheets/bootslider.css" rel="stylesheet">
	
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
		.login-style{position:fixed; z-index:100000;right:35%;top:10%}
    </style>
	<script type="text/javascript">
$(document).ready(function(){
	$('#username').focus(); // Focus to the username field on body loads
	$('#masuk').click(function(){ // Create `click` event function for login
		var username = $('#username'); // Get the username field
		var password = $('#password'); // Get the password field
		var login_result = $('.login_result'); // Get the login result div
		login_result.html('loading..'); // Set the pre-loader can be an animation
		if(username.val() == ''){ // Check the username values is empty or not
			username.focus(); // focus to the filed
			login_result.html('<span class="error">Masukkan username dahulu</span>');
			return false;
		}
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<span class="error">Masukkan password Dulu</span>');
			return false;
		}
		if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					login_result.html('<span class="error">Kombinasi Username dan password tidak cocok!</span>');
				}
				else if(responseText == 1){
					window.location = 'page.php';
				}
				else{
					alert(data);
				}
			}
			});
		}
		return false;
	});
});
</script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    <div class="navbar navbar-fixed">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Your</span> <span class="second">Company</span></a>
        </div>
    </div>
<div id="full-screen-slider" class="carousel slide">
<div class="row-fluid">

  <div class="dialog login-style">
        <div class="block">
            <p class="block-heading">Sign In</p>
            <div class="block-body">
                <form>
					<div class="login_result" style="color:red;text-align:center;font-style:italic;" id="login_result"></div>
                    <label>Username</label>
                    <input type="text" id="username" name="username" class="span12">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="span12">
                    <button class="btn btn-primary pull-right" id="masuk" >Masuk</button>
                   <label class="remember-me"><input type="checkbox"> Remember me</label>
                  
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
 </div>


      <div class="carousel-inner">
        <div class="active item">
         <!-- <img src="img/bg.jpg" alt="Mountain view">
         <!-- <div class="carousel-caption">
            <h4>Awesome slide title goes here</h4>
            <p>
              Few attractive words about the slide goes here.Few attractive words about the slide goes here.
              Few attractive words about the slide goes here.Few attractive words about the slide goes here.
              Few attractive words about the slide goes here.Few attractive words about the slide goes here.
            </p>
          </div>-->
        </div>
        <div class="item">
          <img src="img/mountain.jpg" alt="Mountain view">
          <!--<div class="carousel-caption">
            <h4>Slide title</h4>
            <p>
              Few attractive words about the slide goes here.Few attractive words about the slide goes here.
              Few attractive words about the slide goes here.Few attractive words about the slide goes here.
              Few attractive words about the slide goes here.Few attractive words about the slide goes here.
            </p>
          </div>-->
        </div>
      </div>
    <!--  <a class="left carousel-control" href="#full-screen-slider" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#full-screen-slider" data-slide="next">&rsaquo;</a>-->
    </div>
	</div>

    

    



    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
	 <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootslider.js"></script>
    
  </body>
</html>


