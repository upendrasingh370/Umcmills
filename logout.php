<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
session_start();
if(isset($_SESSION['user']))
{
unset($_SESSION['user']);
header("location:index.php");
}
else
{
	header("location:index.php");
}
?>