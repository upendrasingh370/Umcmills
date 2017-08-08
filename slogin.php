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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Untitled Document</title>
<style>
.loginbox
{
	background-color:#fff;
	height:200px;
	padding-left:100px;
	padding-top:2em;
	box-shadow:5px 10px 20px #069;
	margin-top:3em;
	height:30em;
}
body
{
	background:url(images/login1.jpg);
	background-size:1400px;
}
table tr td
{
	padding-top:1em;
}
table tr td
{
	padding-top:1em;
}
table.controller tr td
{
	padding:1em;
	color:#369;
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
<tr>
<td>
<a href="logout.php"><button class="btn btn-danger">Logout</button></a>
</td>
</tr>
</table>
</div>
<div class="col-lg-2">
</div>
<div class="col-lg-4 loginbox" >
<h2>
Portal Login
</h2>
<form method="post">
<table class="signup" cellspacing="20px">

<tr>
<td>
<label for="email">Email</label>
<input type="text" name="email"  placeholder="enter your email" style="padding-top:5px;" required class="form-control input-lg">
</td>
</tr>

<tr>
<td>
<label for="email">Password</label>
<input type="password" name="password"  placeholder="enter your password" required class="form-control input-lg">
</td>
</tr>
<tr>
<td style="padding-top:2em; padding-left:3.7em;">
<input type="submit" class="btn btn-primary" style="width:6em; height:2.1em; padding-bottom:20px; font-size:16px;" value="Login" name="submit">
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
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query="select * from `user` where u_email='$email' AND u_password='$password'";
	$result=mysql_query($query) or die(mysql_error());
	$num=mysql_num_rows($result);
	$row=mysql_fetch_array($result);
	
	if(($num==1)&&($row['u_approved']==1))
	{
		
		session_start();
		$_SESSION['user']=$email;
		header("location:profile2.php");
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
}

?>