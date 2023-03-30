<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');
?>
<link rel="stylesheet" href="./humanity/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="./jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="./jquery.ui.core.min.js"></script>
<script type="text/javascript" src="./jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="./jquery.ui.datepicker.min.js"></script>

<div id="flash" class="flash"></div>
<?php
function scheduler($teams){
    if (count($teams)%2 != 0){
        array_push($teams,"0");
    }
    //echo count($teams)/2;
	$away = array_splice($teams,(count($teams)/2));
    $home = $teams;
    for ($i=0; $i < count($home)+count($away)-1; $i++){
        for ($j=0; $j<count($home); $j++){
            $round[$i][$j]["Home"]=$home[$j];
            $round[$i][$j]["Away"]=$away[$j];
        }
        if(count($home)+count($away)-1 > 2){
            array_unshift($away,array_shift(array_splice($home,1,1)));
            array_push($home,array_pop($away));
        }
    }
    return $round;
}
?>

<?php
//$members = array("1","2","3","4","5","6","7","8","9","10");

$members[0]="0";
$i=0;
$searchid="";
if(isset($_POST['sertex']))
{
$searchid=$_POST['sertex'];
$Timetex=$_POST['Timetex'];
$AllTimeslot[0]="";
$j=$Timetex;
$jj=0;
while($j<=20)
{
$AllTimeslot[$jj]=$j.':00';
$j++;
$jj++;	
}
$maxround=0;
$select_table1 ="Select max(ROUND) as maxround from tournamentteam where TSID='$searchid'";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
$maxround=$row1['maxround'];
}
//echo $maxround;

if($maxround>=1)
{
$select_table1 ="Select * from tournamentteam where TSID='$searchid' and ROUND='$maxround' and TTWID<>0";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
$members[$i]=$row1['TTWID'];
$i=$i+1;
}	
}
else{
$select_table1 ="Select * from teams where Tournament='$searchid' order by sid";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
$members[$i]=$row1['sid'];
$i=$i+1;	
}
}

if(count($members)>=2)
{
$jj=0;
//print_r($members);
//$members = array("1","2","3","4","5","6","7","8","9","10");
$schedule = scheduler($members);
foreach($schedule AS $round => $games){
    //echo "Round: ".($round+1)."<BR>";
    foreach($games AS $play){
        //echo $play["Home"]." - ".$play["Away"]."<BR>";
		$TSID=$searchid;
		$TTID=$play["Home"];
		$TTVID=$play["Away"];
		$Timeslot=$AllTimeslot[$jj];
		$ROUND=$maxround+1;
		$TTWID=0;
		
		mysql_query("insert into tournamentteam(TSID,TTID,TTVID,Timeslot,ROUND,TTWID) values ('$TSID','$TTID','$TTVID','$Timeslot','$ROUND','$TTWID')");
		$jj++;
    }
	break;
    echo "<BR>";
}

}
else
{	
	if($maxround>=1)
	{
	echo "All Round Ended So Check Winners.";
	}
	else{
	echo "Teams Not Registerd Maximum 2 Teams Required.";
	}
}

}
else{
echo "Select One Tournament.";
}

?>



<div class="table-responsive">
<h4 class="margin-bottom-15">Tournament Slot Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Team 1 </b></td>
<td><b>Team 2 </b></td>
<td><b>Time</b></td>
<td><b>Round</b></td>
<td><b>Winner</b></td>
</tr></thead>
<tbody>
<?PHP
$select_table = "select * from tournamentteam where TSID=".$searchid." order by ROUND desc";
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['TTID']; ?></TD>
<TD><?php echo $row['TTVID']; ?></TD>
<TD><?php echo $row['Timeslot']; ?></TD>
<TD><?php echo $row['ROUND']; ?></TD>
<TD><?php echo $row['TTWID']; ?></TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              		
</div>
