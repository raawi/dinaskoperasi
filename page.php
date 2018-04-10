<?php session_start();
include_once "library/koneksi.php";
include_once "library/fungsi.php";
include_once "library/tanggal.php";

if(!isset($_SESSION['userid']) || $_SESSION['userid'] == ''){
	echo '<script type="text/javascript">window.location = "index.php"; </script>';
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

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	
	<link type="text/css" href="js/calender/themes/base/ui.all.css" rel="stylesheet" /> 
	<script type="text/javascript" src="js/calender/ui.core.js"></script>
	<script type="text/javascript" src="js/calender/ui.datepicker.js"></script>

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
		.header.company-name {
            height:54px;
			
        }
		.dua{float:left;width:33%; line-height:45px; border:0px solid black;}
		.small-font{font-size:13px;}
		.toolbar-fixed{position:fixed;bottom:-10px;padding:20px;background:white;right:1px;left:229px;border-top:1px solid black;z-index:120}
		.table-left{float:left;width:50%;line-height:45px; color:#3c3c3c;text-aligen:left}
		.table-left td{text-aligen:left}
		.min-line-height{line-height:0px;}
		.no-padding{padding:10px}
		.no-border{border:none}
		.block-color{background-color:#ECF0F1;}
		.no-margin{border:0px solid black;padding:0px;}
		.bottom-margin{margin-bottom:600px;}
		
		
    </style>
	<script type="text/javascript">
	 
$(document).ready(function() {
	$('#loaderImage').show();	
	var main_page="dashboard.php";
	
	$(".dashboard_menu").addClass("active");
	$("#main_page").load(main_page, function(){ $('#loaderImage').hide(); });
	$('.menu a').click(function() {
		var url = $(this).attr('href');
		$('#loaderImage').show();
		$('#load_page').load(url);
		$("#main_page").hide(main_page, function(){ $('#loaderImage').hide(); });
		return false;
	});
})
		$(function() { $(window).scroll(function() { if($(this).scrollTop()>60) { $('#ScrollToTop').fadeIn()} else { $('#ScrollToTop').fadeOut();}});
$('#ScrollToTop').click(function(){$('html,body').animate({scrollTop:0},400);return false})});


</script>
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body class=""> 
    
   <div class="navbar navbar-fixed">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $_SESSION['username'];?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" >Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Your</span> <span class="second">Company</span></a>
        </div>
    </div>
	
    <?php include"menu.php";?>
	
    <div class="content content-bottom">
	<div style="margin:auto; position:fixed; border:0px solid black; left:0px;top:0px; right:0px; z-index:1000">
					<div id="loaderImage" style="margin:auto; width:100px;"><img src="images/ajax-loader.gif" /></div>
				</div>
    <div id="main_page"></div> 
	<div id="load_page">
				<?php include "OpenPage.php";?>
	</div>
	   <style type='text/css' scoped='scoped'>
#ScrollToTop{text-align:center; position:fixed; bottom:40px; right:3px; cursor:pointer;display:none}
</style>
<div id='ScrollToTop'><img alt='Back to top' src='images/arrow-up3.png'></div>

                    
    </div>
 

    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
	<script src="js/jquery-1.8.3.min.js"></script>
    
  </body>
</html>


