<html>
<head>
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>
</html>
<?php
$msg=$_GET['id'];
if(isset($msg))
{
	?>
    <h2 style='margin-top:200px; padding-left:300px;'><?php echo $msg; ?></h2>
    <?php
}
?>
<a href="signup.php"><button class="btn btn-primary" style="margin-left:42%;">Go back</button></a>
<a href="index.php"><button class="btn btn-primary" style="margin-left:2%;">Go to Home</button></a>