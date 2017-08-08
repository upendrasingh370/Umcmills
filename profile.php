<?php
session_start();
if(isset($_SESSION['user']))
{
mysql_connect("localhost","root","");
mysql_select_db("umcmills");
$email=$_SESSION['user'];
$query="select * from `user` where u_email='$email'";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
	$name=$row['u_name'];
	$email=$row['u_email'];
	$address=$row['u_address'];
	$mobile=$row['u_mobile'];
	$user_parent=$row['u_parent'];
}
function find_downliner($node)
{
	if($node!="")
	{
		static $downliner_arr=array();
		$dquery="select * from `user` where u_parent='$node'";
		$dresult=mysql_query($dquery);
		$number_downliner=mysql_num_rows($dresult);
		if($number_downliner>0)
		{
			while($drow=mysql_fetch_array($dresult))
			{
				
				find_downliner($drow['u_email']);
				array_push($downliner_arr,$drow['u_email']);
			}
		}
	
	}
return ($downliner_arr);
	
}




function divide_profit($node,$parent_arr,$profit,$quantity)
{
	$oldquery="select * from `sales` where u_email='$node'";
	$oldresult=mysql_query($oldquery);
	$oldrow=mysql_fetch_array($oldresult);
	$oldsales=$oldrow['total_sale'];
	$oldprofit=$oldrow['total_earnings'];
	$newprofit=$oldprofit+$profit;
	$newsales=$oldsales+$quantity;
	echo "<br>"."the new sale is".$newsales." ";
	if($newsales>10)
	{
		echo "cannot update, the packet amount has exceeded the limit of 10";
		return;
	}
	$qquery="update `sales` set total_sale='$newsales', total_earnings=$newprofit where u_email='$node'";
	mysql_query($qquery) or die(mysql_error());
	print_r($parent_arr);
	$no_of_parents=sizeof($parent_arr);
//echo $no_of_parents;
$divisor=0;
$i=0;
while($i<=$no_of_parents)
{
	$divisor+=$i;
	$i++;
}
//echo $divisor;
$share_per_person=array();
$counter=$no_of_parents;
while($counter>0)
{
	array_push($share_per_person,$counter--);
}
print_r($share_per_person);
$counter=$no_of_parents;
$i=0;
while($i<$counter)
{
	$profit_per_parent=($share_per_person[$i]*$profit)/$divisor;
	echo $profit_per_parent."  ".$parent_arr[$i]."<br>";
	$fquery="select * from `sales` where u_email='$parent_arr[$i]'";
	$fresult=mysql_query($fquery);
	$frow=mysql_fetch_array($fresult);
	$old_earning=$frow['total_earnings'];
	$new_earning=($old_earning+(($share_per_person[$i]*$profit)/$divisor));
	echo $new_earning;
	$upquery="update `sales` set total_earnings='$new_earning' where u_email='$parent_arr[$i]'";
	mysql_query($upquery) or die(mysql_error());
	$i++;
}
}



function count_parents($node)
{
	static $level=0;
static $parent=array();
	if($node!="NULL")
	{
		$query="select * from `user` where u_email='$node'";
		$result=mysql_query($query);
		$row=mysql_fetch_assoc($result);
		if($row['u_parent']!="NULL")
		array_push($parent,$row['u_parent']);
		$level++;
		count_parents($row['u_parent']);
	}
	else
	{
		
		
		sizeof($parent);
	}
	return $parent;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Untitled Document</title>
<style>
table.details tr td
{
	width:10%;
	padding:8px;
	font-size:14px;
	color:#369;
}
body
{
	background-color:#F0F0F0;
}
.holder
{
	margin-top:2em;
	background-color:#fff;
	margin-left:1em;
	padding-bottom:2em;
}
.ppic
{
	padding-left:30px;
	padding-top:30px;
}
.details-2
{
	border:2px solid;
}
table.details-2 tr td
{
	border:2px solid;
	width:120px;
	padding:8px;
	font-size:14px;
	color:#369;
}
table.details-3 tr td
{
	
	width:150px;
	padding:8px;
	font-size:14px;
	color:#369;
}
.new
{
	margin-top:300px;
}
</style>
</head>
<body>
<div class="row">

<div class="col-lg-4 holder" style="padding-bottom:20px;">
<img src="images/care.jpg" width="150" height="300" class="img-responsive ppic">
<span style="color:#6cf;">
<h3>
&nbsp;&nbsp;<?php
echo $name;
?>
</h3>
<hr>
</span>
<table class="details">
<tr>
<td>
Email
</td>
<td>
<?php
echo $email;
?>
</td>
</tr>
<tr>
<td>
Contact
</td>
<td>
<?php
echo $mobile;
?>
</td>
</tr>
<tr>
<td>
Address
</td>
<td>
<?php
echo $address;;
?>
</td>
</tr>
<?php
if($user_parent!="NULL")
{
?>
<tr>
<td>
Added By
</td>
<td>

</td>
</tr>
<?php
}
?>
</table>
<br>
<h3>
Transaction Details
</h3>
<hr>
<table class="details">

<?php
$tquery="select * from `sales` where u_email='$email'";
$tresult=mysql_query($tquery);
$trow=mysql_fetch_array($tresult)
?>
<tr>
<td>
Total Packets Sold
</td>
<td>
<?php
echo $trow['total_sale'];
?>
</td>
</tr>
<tr>
<td>
Total Earnings</td>
<td>
<?php
echo $trow['total_earnings'];
?>
</td>
</tr>
</table>
<br>
<h3>Pending Approvals</h3>
<hr>
<table class="details">
<?php
$aquery="select * from `user` where u_parent='$email' AND u_approved=0";
$aresult=mysql_query($aquery) or die(mysql_error());
while($arow=mysql_fetch_array($aresult))
{
?>
<tr>
<td>
<?php echo $arow['u_name']." (".$arow['u_email'].")";
?>
</td>
<td>
<a href="approve.php?id=<?php echo $arow['u_email']; ?>"> approve</a>
</td>
</tr>
<?php
}
?>
</table>
</div>
<div class="col-lg-7 holder">
<span style="float:right; padding-top:1em;">
<a href="logout.php" style="float:right;">Logout(<?php echo $name; ?>)</a>
</span>
<span>
<h3>
Upload Transaction Detail
</h3>

</span>
<hr>
<form method="post">
<table class="details-3">
<tr>
<td>
Packets Sold
</td>
<td>
<input type="number" name="q">
</td>
<td>
<input type="submit" name="submit" value="upload">
</td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
	$parent_count=count_parents($email);
	$packets=$_POST['q'];
	$profit=$packets*120;
	$seller_profit=$profit/2;
	divide_profit($email,$parent_count,$seller_profit,$packets);
}
?>
<br>
<br>
<span class="new">
<h3>
Your upliners
</h3>
</span>
<hr>
<table class="details-2">
<tr>
<td>
Name
</td>
<td>
Email
</td>
<td>
Mobile
</td>
<td>
Address
</td>
</tr>
<?php
$parent_arr=count_parents($email);
$no_of_parents=sizeof($parent_arr);
$i=0;
while($i<$no_of_parents)
{
	$current_parent=$parent_arr[$i];
	$uquery="select * from `user` where u_email='$current_parent'";
	$uresult=mysql_query($uquery) or die(mysql_error());
	while($urow=mysql_fetch_array($uresult))
	{
?>

<tr>
<td>
<?php
echo $urow['u_name'];
?>
</td>
<td>
<?php
echo $urow['u_email'];
?>
</td>
<td>
<?php
echo $urow['u_mobile'];
?>
</td>
<td>
<?php
echo $urow['u_address'];
?>
</td>
</tr>
<?php
	}
	$i++;
}
echo "<h4>"."Total no of upliners are ".$no_of_parents."</h4>";
?>

</table>
<br>
<br>
<span class="new">
<h3>
Your downliners
</h3>
</span>
<hr>
<table class="details-2">
<tr>
<td>
No.
</td>
<td>
Name
</td>
<td>
Email
</td>
<td>
Mobile
</td>
<td>
Address
</td>
</tr>
<?php
$parent_arr=find_downliner($email);
$no_of_parents=sizeof($parent_arr);
$i=0;
while($i<$no_of_parents)
{
	$current_parent=$parent_arr[$i];
	$uquery="select * from `user` where u_email='$current_parent' AND u_approved=1";
	$uresult=mysql_query($uquery) or die(mysql_error());
	while($urow=mysql_fetch_array($uresult))
	{
?>

<tr>
<td>
<?php
$i;
?>
</td>
<td>
<?php
echo $urow['u_name'];
?>
</td>
<td>
<?php
echo $urow['u_email'];
?>
</td>
<td>
<?php
echo $urow['u_mobile'];
?>
</td>
<td>
<?php
echo $urow['u_address'];
?>
</td>
</tr>
<?php
	}
	$i++;
}
echo "<h4>"."Total downliners are ".$no_of_parents."</h4>";
?>

</table>
</div>
<div class="col-lg-1">
</div>
</div>
</body>
</html>
<?php
}
else
{
	header("location:login.php");
}
?>