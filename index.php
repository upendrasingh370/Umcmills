
<!doctype html>
<html>
<head>
<meta charset="utf-8">

        <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>partyonclick</title>
        
    <script>
	$(document).ready(function(e) {
        function myfun()
		{
			delay(1000);
			window.location.reload();
		}
    });
		</script>
<style>
table.kk tr td
{
	padding-top:30px;
	width:30%;
}
.inner
{
	color:#fff;
	text-align:center;
	left:500px;
}
.slide {
  position: relative;
  width:100%;
  height:100%;
}
.slide .inner {
	width:25%;
  position:relative;
  left: 0;
  bottom: 0;
  top:30px;
  left:35%;
}
html { 
  background: url(images/bg.jpg) no-repeat center center; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
@font-face{
	font-family:"cat";
	src:url(./fonts/fonts_rechtman/RechtmanPlain.ttf);
}
@font-face{
	font-family:"flavors";
	src:url(./fonts/fonts_ostrich-sans/ostrich-regular.ttf);
}
.top
{
	font-weight:700;
	font-size:30px;
	font-family:"flavors";
	background:url(images/choreplay.jpg) no-repeat center center;
	background-position:center;
	background-size:93% 100%;
	height:670px;
	width:110%;
	padding:0px;
	margin-top:0%;
	margin-left:-4%;
	color:#6cf;
}
.title
{
	font-family:cat;
	font-size:70px;
	padding-left:70px;
}
.menu1
{
	padding-top:30px;
}
.box-wrapper
		{
			border:2px #66CCFF solid;
			height:340px;
			background-color:#F0F0F0;
			padding-left:20px;
			margin-left:40px;
		    margin-top:20px;
			padding:0px;
			float:left;
			width:250px;
		}
			.box-wrapper-1
		{
			
			height:340px;
			background-color:#fff;
			padding-left:20px;
			margin-left:20px;
		    margin-top:20px;
			padding:4px;
			float:left;
			width:300px;
			position:absolute;
			margin-left:400px;
		}
		.box-wrapper-img
		{
			width:100%;
			height:60%;
		}
		.menu-box
		{
			width:350px;
			
			background-color:#FFF;
			margin-left:2em;
			margin-top:2em;
			padding:2px;
		}
		.box-wrapper-img img
		{
			width:100%;
			height:100%;
		}
		.filter
		{
			width:100%;
			background-color:#FFF;
			text-align:left;
			
		}
		.fiter > h3
		{
			padding-left:10px;
		}
		.filter ul li
		{
			padding-top:20px;
		}
		.filter ul li:first
		{
			padding-top:10px;
		}
		table.signup
		{
			margin-left:15px;
		}
		table.signup tr td
		{
			font:16px;
			padding:5px;
			height:20px;
		}
		table.signup tr td input[type='text']
		{
			font-variant:small-caps;
			color:#000;
			font-size:22px;
			width:160%;
			opacity:0.9;
		}
		.footer
		{
			width:1370px; 
			height:auto; background-color:#6cc; float:left; margin-left:0%; margin-top:5%; font-size:22px;
			padding:28px; color:#fff;
		}
		table.tfooter tr td
		{
			text-align:left;
			padding-top:0px;
		}
	.footeritem
	{
		margin-top:20px;
	}
	a
	{
		color:#6cf;
	}
	a:hover{
		text-decoration:none;
		color:#6cf;
	}
	.loginbox
	{
		height:300px;
		width:300px;
		background-color:rgba(255,255,255,0.0);
		margin-left:18em;
		margin-top:1em;
	}
</style>
</head>

<body style="background-color:#F0F0F0;">
 
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose type of login</h4>
        </div>
        <div class="modal-body">
          <a href="login.php" target="_blank"><button class="btn btn-primary btn-lg">customer login</button></a>
          <p><h2>OR</h2></p>
          <br>
          <button class="btn btn-primary btn-lg">agent login</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<div class="top">
<div class="row">
<div class="col-lg-2 title">
&nbsp;&nbsp;umcmills
</div>
<div class="col-lg-2">
</div>
<div class="col-lg-1 menu1">
</div>
<div class="col-lg-1 menu1">

</div>
<div class="col-lg-1 menu1">
<a href="#">HOME</a>
</div>
<div class="col-lg-1 menu1">
SERVICES
</div>
<div class="col-lg-1 menu1">
PRODUCTS
</div>
<div class="col-lg-1 menu1">
<?php @session_start(); if(isset($_SESSION['user'])) 
{
	$l=1;
	?>
    <a href="profile2.php">Profile</a>
    <?php
}
	else
	{
		$l=0
	?>
<a href="login.php">LOGIN</a>
<?php
	}
?>
</div>
<div class="col-lg-1 menu1">
<?php if($l==0) {?><a href="signup.php">SIGNUP</a><?php } else {?>Logout<?php } ?>
</div>
</div>
<div id="slideleft" class="slide">
  <div class="inner">
 <h1 style="font-size:66px; color:#6cf;">WELCOME TO UMCMILLS FAMILY</h1>

  </div>
  <div class="loginbox">
  <hr>
  <table class="kk">
 
  <tr>
  <td style="padding-left:100px;">
  <a href="login.php">
  <input type="submit" name="submit" value="Login" class="btn btn-primary" style="width:100px; font-size:22px;">
  </a>
  </td>
  </tr>
  </form>
  </table>
  </div>
</div>

</div>
<div style="background-color:#fff; height:460px; box-shadow:#FFF 200 400; margin-top:3%;">
<div class="row">
<div class="col-lg-12">
<h3 style="text-align:left; font-weight:bold; font-size:34px;">
&nbsp;&nbsp;&nbsp;&nbsp;
</h3>
</div>
</div>
<div style="">
<img src="images/Untitled-1.jpg" width="1100" height="500" style="float:left; margin-top:30px; margin-left:8%;">
<img src="images/umcmill.jpg" width="1100" height="500" style="margin-left:8%;">

</div>
</div>
<div class="footer" style="margin-top:600px;">

<div class="row">
<div class="col-lg-3" class="footeritem" style="margin-top:1em;">
Contact Us
</div>
<div class="col-lg-3" class="footeritem" style="margin-top:1em;">
About Us
</div>
<div class="col-lg-3" class="footeritem" style="margin-top:1em;">
Terms & condition
</div>
<div class="col-lg-3">
<table class="tfooter">
<tr>
<td>
<h3>Find Us On</h3>
</td>
</tr>
<tr>
<td>
<a href="#"><img src="icons/Facebook.png"></a>&nbsp;<a href="#"><img src="icons/Google+.png"></a>
<a href="#"><img src="icons/Twitter.png"></a>

</td>
</tr>
</table>
</div>
</div>
<div class="row">
<div class="col-lg-12" style="font-size:14px; padding-left:400px;">
copyright &copy all right reserved by umc mills private limited since 2005
</div>
</div>
</div>

 <script src="js/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>
      
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	echo "<h1>hello
	</h1>";
	mysql_connect("localhost","root","");
	mysql_select_db("umcmills");
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query="select * from `user` where u_email='$email' AND u_password='$password'";
	$result=mysql_query($query) or die(mysql_error());
	$num=mysql_num_rows($result);
	$row=mysql_fetch_array($result);
	
	if(($num==1)&&($row['u_approved']==1))
	{
		
		@session_start();
		$_SESSION['user']=$email;

		@header("location:profile2.php");
	}
    else if($num==1)
	{
		echo "you are not approved user kindly get your self approved";
	}
	else
	{
		echo "wrong login credentials";
	}
}

?>