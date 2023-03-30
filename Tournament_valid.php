<?php
include('valid.php');

if(isset($_POST['content1']))
{
$mess="";
$content=$_POST['content'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];

$mess.=nullvalid($content,"Enter Tournament Title,");
$mess.=nullvalid($content1,"Select Tournament Date,");
$mess.=nullvalid($content2,"Select Sport,");

if($mess=="")
	{
	echo "Yes";
	}
	else
	{
	echo $mess;
	}

}


if(isset($_POST['ucontent']))
{

$mess="";
$ucontent=$_POST['ucontent'];
$ucontent1=$_POST['ucontent1'];
$ucontent2=$_POST['ucontent2'];
$ucontent3=$_POST['ucontent3'];

$mess.=nullvalid($ucontent1,"Enter Tournament Title,");
$mess.=nullvalid($ucontent2,"Select Tournament Date,");
$mess.=nullvalid($ucontent3,"Select Sport,");

if($mess=="")
	{
		echo "Yes";
	}
	else
	{
		echo $mess;
	}

}

?>