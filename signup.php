<?php
session_start();
if(isset($_SESSION['user']))
{
	header("location:profile2.php");
}
else
{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<title>Untitled Document</title>
<style>
table tr td
{
	padding-top:1em;
}
table.controller tr td
{
	padding:1em;
	color:#369;
}
.loginbox
{
	background-color:#fff;
	width:400px;
	padding-left:5em;
	padding-top:0em;
	box-shadow:5px 10px 20px #069;
	margin-top:3em;
	padding-bottom:10px;
}
body
{
	background:url(images/tumblr_n8zm3lrclm1st5lhmo1_1280.jpg);
	background-repeat:no-repeat;
	background-size:1400px;
}
table tr td
{
	padding-top:1em;
}
</style>
</head>

<body>
<div class="row">
<div class="col-lg-2" style="background-color:#fff; height:400px; padding-top:2em; margin-top:3em;">
<h3>
&nbsp;&nbsp;Quick Links
</h3>
<hr>
<table class="controller">
<tr>
<td>
<a href="index.php">Home</a>
</td>
</tr>

</table>
</div>
<div class="col-lg-2">
</div>
<div class="col-lg-4 loginbox">
<h3>
Signup
</h3>
<hr>
<form method="post">
<table class="signup">
<tr>
<td>
<input type="text" name="name"  placeholder="Enter your full name" required class="form-control input-lg">
</td>
</tr>
<tr>
<td>

<input type="text" name="email"  placeholder="enter your email" style="padding-top:5px;" required class="form-control input-lg">
</td>
</tr>
<tr>
<td>
<input type="text" name="phone"  placeholder="enter your phone" required class="form-control input-lg">
</td>
</tr>
<tr>
<td>
<input type="password" name="password"  placeholder="enter your password" required class="form-control input-lg">
</td>
</tr>
<tr>
<td>
<input type="password" name="c_password" placeholder="confirm password" required class="form-control input-lg">
</td>
</tr>
<tr>
<td>
<input type="text" name="parent" placeholder="Joining under" required class="form-control input-lg">
</td>
</tr>
<tr>
<td>
<textarea name="address" cols="30" rows="5" class="form-control" placeholder="Enter your address"></textarea>
</td>
</tr>
<tr>
<td>
<input type="checkbox" value="true" name="terms">&nbsp;&nbsp; I accept the terms and condition
</td>
</tr>
<tr>
<td style="padding-top:2em; padding-left:3.7em;">
<input type="submit" class="btn btn-primary" style="width:6em; height:2.1em; padding-bottom:1em; font-size:16px;"  value="submit" name="submit">
</td>
</tr>
</table>


</form>
 </div>
 <div class="col-lg-4">
 </div> 
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
	$terms=$_POST['terms'];

	$address=$_POST['address'];
	if(($name!="")&&($email!="")&&($password!="")&&($password=$cpassword)&&($terms==true))
	{
		$query1="select * from `user` where u_email='$parent' AND u_approved=1";
		$result1=mysql_query($query1) or die(mysql_error());
		$num1=mysql_num_rows($result1);
		if($num1==1)
		{
			$query4="select * from `user` where u_email='$email'";
			$result4=mysql_query($query4) or die(mysql_error());
			$caluser=mysql_num_rows($result4);
		$query2="select * from `user` where u_parent='$parent'";
		$result2=mysql_query($query2) or die(mysql_error());
		$num2=mysql_num_rows($result2);	
		if($num2<10)
		{
			if($caluser==0)
			{
	  	$query="insert into `user` values('$email','$name','$phone','$address','$date','$password',0,'$parent')";
		$query3="insert into `sales` values('$email','$parent','$name',0,0)";
		mysql_query($query) or die(mysql_error());
		mysql_query($query3) or die(mysql_error());
        echo "<div class=row style=\"margin-top:200px;\"><h3>Hello ".$name." you are done Your Request Was successfuly submited please get yourself approved by your upliner</h3></div>";
			}
			else
			{
				$msg="Sorry ".$name." the user with that email Already exists";
				//header("location:acknowledgement.php?id='$msg'");
				echo "<h3>$msg</h3>";
			}
		}
		else
		{
			$msg="sorry your account can not be created as the selected upliner already has 10 downliner select some other downliner";
			//header("location:acknowledgement.php?id='$msg'");
			echo "<h3>$msg</h3>";
		}
	}
	else
	{
		$msg="sorry your account can not be created as the selected upliner does not exists";
		echo "<h3>$msg</h3>";
	}
	}

}
}
?>