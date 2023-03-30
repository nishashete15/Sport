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

<script type="text/javascript">
$(function() {
$(".Edit").click(function() {
var element = $(this);
var tsid = element.attr("alt");
var trid = element.attr("id");
var tid = $("#sertex").val();
var info = 'tsid=' + tsid+'&trid='+ trid+'&sertex='+tid;
//alert(info);
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "TournamentScoreaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});

return false;
});
});
</script>

<?php
if(isset($_POST['tsid']) and isset($_POST['trid']))
{
$tsid=$_POST['tsid'];
$trid=$_POST['trid'];

mysql_query("update tournamentteam set TTWID='$trid' where TTR=$tsid");
mysql_query("update teams set Score=Score+1 where sid=$trid");

}
?>

<div id="flash" class="flash"></div>
<?php
$searchid="";
if(isset($_POST['sertex']))
{
$searchid=$_POST['sertex'];
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
<TD><center><?php echo $row['TTID']; ?></center></TD>
<TD><center><?php echo $row['TTVID']; ?></center></TD>
<TD><?php echo $row['Timeslot']; ?></TD>
<TD><?php echo $row['ROUND']; ?></TD>
<TD><?php 
if($row['TTWID']>=1)
{ 
echo $row['TTWID']; 
}
else
{ 
echo "Decision Pending"; 
}
?>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              		
</div>
