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
        
    
<style>
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
	background:url(images/tumblr_n9hxdqatsK1st5lhmo1_1280.jpg) no-repeat center center;
	background-position:center;
	background-size:93% 100%;
	height:670px;
	width:110%;
	padding:0px;
	margin-top:0%;
	margin-left:-4%;
	color:#fff;
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
umcmills
</div>
<div class="col-lg-2">
</div>
<div class="col-lg-1 menu1">

</div>
<div class="col-lg-1 menu1">

</div>
<div class="col-lg-1 menu1">
HOME
</div>
<div class="col-lg-1 menu1">
SERVICES
</div>
<div class="col-lg-1 menu1">
PRODUCTS
</div>
<div class="col-lg-1 menu1">
LOGIN
</div>
<div class="col-lg-1 menu1">
<a data-toggle="modal" href="#myModal">SIGNUP</a>
</div>
</div>
<div id="slideleft" class="slide">
  <div class="inner">
 <h1>WELCOME TO UMCMILLS FAMILY</h1>
<form method="post">
<table class="signup">
<tr>
<td>
<input type="text" name="name"  placeholder="Enter your full name" required>
</td>
</tr>
<tr>
<td>

<input type="text" name="email"  placeholder="enter your email" style="padding-top:5px;" required>
</td>
</tr>
<tr>
<td>
<input type="text" name="phone"  placeholder="enter your phone" required>
</td>
</tr>
<tr>
<td>
<input type="text" name="password"  placeholder="enter your password" required>
</td>
</tr>
<tr>
<td>
<input type="text" name="c_password" placeholder="confirm password" required>
</td>
</tr>
<tr>
<td>
<input type="text" name="address" placeholder="address" required>
</td>
</tr>
</table>

<input type="submit" class="btn btn-primary" style="width:100px; height:40px; padding-bottom:20px; font-size:24px;" value="submit">
</form>
  </div>
</div>

</div>
<div style="background-color:#fff; height:460px; box-shadow:#FFF 200 400; margin-top:3%;">
<div class="row">
<div class="col-lg-12">
<h3 style="text-align:left; font-weight:bold; font-size:34px;">
&nbsp;&nbsp;&nbsp;&nbsp;Best Offers
</h3>
</div>
</div>
<div class="box-wrapper">
<div class="box-wrapper-img">
<img src="images/ucmills/bigstock-Moisturizing-shampoo-product-d-27404594.jpg">
</div>
<h4>
Antidandruff Shampoo
</h4>
Price:180 <br>
<button class="btn btn-primary btn-block" style="margin-top:43px;">
BUY
</button>
</div>
<div class="box-wrapper">
<div class="box-wrapper-img">
<img src="images/ucmills/0007069_fena_ultra_detergent_powder_500gm.jpeg">
</div>
<h4>
Antidandruff Shampoo
</h4>
Price:180 <br>
<button class="btn btn-primary btn-block" style="margin-top:43px;">
BUY
</button>

</div>
<div class="box-wrapper">
<div class="box-wrapper-img">
<img src="images/ucmills/Foaming-Hand-Wash.jpg">
</div>
<h4>
Antidandruff Shampoo
</h4>
Price:180 <br>
<button class="btn btn-primary btn-block" style="margin-top:43px;">
BUY
</button>

</div>
<div class="box-wrapper">
<div class="box-wrapper-img">
<img src="images/ucmills/Foaming-Hand-Wash.jpg">
</div>
<h4>
Antidandruff Shampoo
</h4>
Price:180 <br>
<button class="btn btn-primary btn-block" style="margin-top:43px;">
BUY
</button>

</div>
</div>
<div style="" class="footer">

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
<div class="col-lg-12" style="font-size:14px;">
copyright &copy 2015 UMCMILLS
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
	mysql_connect("localhost","root","");
	mysql_select_db("umcmills");
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['c_password'];
	$phone=$_POST['phone'];
	$date=date("Y-m-d");
	$parent=$_POST['parent'];
	$address=$_POST['address'];
	if(($name!="")&&($email!="")&&($password!="")&&($password==$cpassword))
	{
		$query1="select * from `user` where u_email='$parent' AND u_approved=1";
		$result1=mysql_query($query1) or die(mysql_error());
		$num1=mysql_num_rows($result1);
		if($num1==1)
		{
		$query2="select * from `user` where u_parent='$parent'";
		$result2=mysql_query($query2) or die(mysql_error());
		$num2=mysql_num_rows($result2);	
		if($num2<10)
		{
	  	$query="insert into `user` values('$email','$name','$phone','$address','$date','$password',0,'$parent')";
		$query3="insert into `sales` values('$email','$parent','$name',0,0)";
		mysql_query($query) or die(mysql_error());
		mysql_query($query3) or die(mysql_error());
		}
		else
		{
			echo "sorry your account can not be created as the selected upliner already has 10 downliner kindly select some other downliner";
		}
	}
	else
	{
		echo "sorry your account can not be created as the selected upliner does not exists";
	}
	}

}
?>