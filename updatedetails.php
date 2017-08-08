<?php
ob_start();
session_start();
if(isset($_SESSION['user']))
{
	$email=$_SESSION['user'];
	mysql_connect("localhost","root","");
	mysql_select_db("umcmills");
	$query="select * from `user` where u_email='$email'";
	$result=mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);

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
	
	padding-left:100px;
	padding-top:2em;
	box-shadow:5px 10px 20px #069;
	margin-top:3em;
	padding-bottom:1em;
}
body
{
	background-color:#F0F0F0;
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
<a href="profile2.php">Profile</a>
</td>
</tr>
<tr>
<td>
<a href="updatedetails.php">Change Details</a>
</td>
</tr>
<tr>
<td>
<form method="post">
<button class="btn btn-danger" name="logout">Logout</button>
</form>
<?php
if(isset($_POST['logout']))
{
if(isset($_SESSION['user']))
{
	unset($_SESSION['user']);
	header("location:index.php");
}
}
?>
</td>
</tr>
</table>
</div>
<div class="col-lg-1">
</div>
<div class="col-lg-4 loginbox" >
<h2>
Your account details
</h2>
<form method="post">
<table class="signup" cellspacing="20px">



<tr>
<td>
<label for="name">Name</label>
<input type="text" name="name" required class="form-control input-lg" value="<?php echo $row['u_name']; ?>">
</td>
</tr>
<tr>
<td>
<label for="phone">Phone</label>
<input type="text" name="phone" required class="form-control input-lg" value="<?php echo $row['u_mobile']; ?>">
</td>
</tr>
<tr>
<td>
<label for="address">Address</label>
<textarea class="form-control" name="address" cols="30" rows="5" >
<?php
echo $row['u_address'];
?>
</textarea>
</td>
</tr>

<tr>
<td>
<label for="acno">Account No</label>
<input type="text" class="form-control" name="acno" value="<?php if($row['user_acno']!="") {echo $row['user_acno']; }?>">
</td>
</tr>
<tr>
<td>
<label for="ifsc">IFSC Code</label>
<input type="text" class="form-control" name="ifsc" value="<?php if($row['user_ifsc']!="")echo $row['user_ifsc']; ?>">
</td>
</tr>
<tr>
<td style="padding-top:2em; padding-left:3.7em;">
<input type="submit" class="btn btn-primary" style="width:6em; height:2.1em; padding-bottom:20px; font-size:16px;" value="Update" name="submit">
</td>
</tr>

</table>


</form>
</div>
<div class="col-lg-1">
</div>
<div class="col-lg-3 loginbox" style="padding-left:2.5em;">
<h3>
Change Password
</h3>
<form method="post" name="pasform">
<table>
<tr>
<td>
<label for="name">Old password</label>
<input type="password" name="oldpass" required class="form-control input-lg" >
</td>
</tr>
<tr>
<td>
<label for="phone">New Password</label>
<input type="password" name="newpass" required class="form-control input-lg" >
</td>
</tr>
<tr>
<td style="padding-top:2em; padding-left:4.0em;">
<input type="submit" class="btn btn-primary" style="width:6em; height:2.1em; padding-bottom:20px; font-size:16px;" value="Change" name="psubmit">
</td>
</tr
></table>
</table>
</div>
<div class="col-lg-1">
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$address=$_POST['address'];
	$mobile=$_POST['phone'];
	$ifsc=$_POST['ifsc'];
	$acno=$_POST['acno'];
	$query="update`user` set u_name='$name', u_mobile='$mobile', u_address='$address', user_acno='$acno', user_ifsc='$ifsc' where u_email='$email'";
	mysql_query($query) or die(mysql_error());
	header("location:profile2.php");
	
	
}
if(isset($_POST['psubmit']))
{
	$query="select * from `user` where u_email='$email'";
	$result=mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	$pass=$row['u_password'];
	$oldpass=$_POST['oldpass'];
	$newpass=$_POST['newpass'];
	if($pass==$oldpass)
	{
		$uquery="update `user` set u_password='$newpass' where u_password='$pass'";
		mysql_query($uquery) or die(mysql_error());
		header("location:profile2.php");
	}
	else
	{
		echo "Sorry Wrong password details";
	}
}
}
else
{
	header("location:index.php");
}
?>
