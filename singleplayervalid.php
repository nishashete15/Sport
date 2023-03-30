<?php
include('valid.php');


if(isset($_POST['content1']))
{

$mess="";
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);
$content4=mysql_real_escape_string($_POST['content4']);
$content5=mysql_real_escape_string($_POST['content5']);
$content6=mysql_real_escape_string($_POST['content6']);
$content7=mysql_real_escape_string($_POST['content7']);

$content8=mysql_real_escape_string($_POST['content8']);
$content9=mysql_real_escape_string($_POST['content9']);

$mess.=Namespacevalid($content1,"Enter Captain Name(First Last)",3);
$mess.=phonevalid($content3,"Enter Valid Mob. No,",10);
$mess.=EmailValid($content2,"Enter Valid Email,");

$mess.=nullvalid($content4,"Select Tournament,");
$mess.=EqualValid($content8,$content9,"Both Password Not Match,");

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
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);
$ucontent5=mysql_real_escape_string($_POST['ucontent5']);
$ucontent6=mysql_real_escape_string($_POST['ucontent6']);
$ucontent7=mysql_real_escape_string($_POST['ucontent7']);


$mess.=Namespacevalid($ucontent1,"Enter Captain Name(First Last)",3);
$mess.=phonevalid($ucontent3,"Enter Valid Mob. No,",10);
$mess.=EmailValid($ucontent2,"Enter Valid Email,");
$mess.=nullvalid($ucontent6,"Enter Address,");
$mess.=nullvalid($ucontent5,"Enter Team name,");
$mess.=nullvalid($ucontent4,"Select Tournament,");
$mess.=nullvalid($ucontent7,"Enter Team members,");
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