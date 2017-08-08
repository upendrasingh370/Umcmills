<?php
mysql_connect("localhost","root","");
mysql_select_db("umcmills");
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1="select * from `waiting` where u_id='$id'";
$result=mysql_query($query1);
$num=mysql_num_rows($result);
$row=mysql_fetch_array($result);
if($num>0)
{
	$email=$row['u_email'];
	$name=$row['u_name'];
	$mobile=$row['u_phone'];
	$address=$row['u_address'];
	$date=$row['u_date'];
	$password=$row['u_password'];
	$approved=$row['u_approved'];
	$parent=$row['u_parent'];
		$query="insert into `user` values('$email','$name','$mobile','$address','$date','$password',0,'$parent')";
		mysql_query($query) or die(mysql_error());
		$query2="delete from `waiting` where u_id='$id'";
		$query3="insert into `sales` values('$email','$parent','$name',0,0)";
		mysql_query($query2);
		mysql_query($query3);
		echo"<h1>"."your email was successfully verified"."</h1>";
		
}
else
{
	echo"<h1>"."your email could not be verified"."</h1>";
 
}
}

?>
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
        </head>
        <body>
        <a href="www.umcmills.com/index.php"><button class="btn btn-primary" style="margin-left:40%; margin-top:20%;">GOTO HOME</button></a>
        </body>
        </html>
        