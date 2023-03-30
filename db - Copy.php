<?php
date_default_timezone_set("Asia/Kolkata");
error_reporting(0);

$link=mysql_connect("localhost","root") or die("Could not connect".mysql_error());
mysql_select_db("sports")or die("Could not connect: ". mysql_error());
$Rdateus=date('Y-m-d h:i:s');

?>