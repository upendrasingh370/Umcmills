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
$approval_email=$_GET['id'];
echo $approval_email;
session_start();
mysql_connect("localhost","root","");
mysql_select_db("umcmills");
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
	if($oldrow[u_parent]=="NULL")
	{
		$oldsales=$oldrow['total_sale'];
	$oldprofit=$oldrow['total_earnings'];
	$newprofit=$oldprofit+120;
	$newsales=$oldsales+$quantity;
		if($newsales>10)
	{
		echo "cannot update, the packet amount has exceeded the limit of 10";
		return;
	}
	$qquery="update `sales` set total_sale='$newsales', total_earnings=$newprofit where u_email='$node'";
	mysql_query($qquery) or die(mysql_error());
	}
	else
	{
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

if(isset($_SESSION['user']))
{
	$user_email=$_SESSION['user'];
	$query1="select * from `user` where u_email='$approval_email'";
	$result1=mysql_query($query1) or die(mysql_error());
	$num=mysql_num_rows($result1);
	if($num>0)
	{
		$row1=mysql_fetch_array($result1);
		if($row1['u_parent']==$user_email)
		{
			$parent_count=count_parents($user_email);
	$profit=120;
	$seller_profit=$profit/2;
	divide_profit($user_email,$parent_count,$seller_profit,1);
			$query2="update `user` set u_approved=1 where u_email='$approval_email'";
			mysql_query($query2) or die(mysql_error());
			header("location:profile2.php");
		}
	}
}
else
{
	header("location:index.php");
}
?>