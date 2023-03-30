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
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var eid = element.attr("id");
var tid = $("#sertex").val();
var info = 'ide='+eid+'&sertex='+tid;
if(info=='')
{
alert("Select For Edit..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');

$.ajax({
type: "POST",
url: "TournamentWinneraction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
}
return false;
});
});
</script>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from teams where sid=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div id="cp_contact_form">
<table class="table table-striped table-hover table-bordered">
<thead>
<tr><td><b>Team ID</b></td><td><?php echo $row['sid']; ?></td></tr>
<tr><td><b>Captain Name</b></td><td><?php echo $row['Cname']; ?></td></tr>
<tr><td><b>Team Name</b></td><td><?php echo $row['Teamname']; ?></td></tr>
<tr><td><b>Mobile</b></td><td><?php echo $row['mobno']; ?></td></tr>
<tr><td><b>Email</b></td><td><?php echo $row['email']; ?></td></tr>
<tr><td><b>Address</b></td><td><?php echo $row['Address']; ?></td></tr>
<tr><td><b>Team Members</b></td><td><?php echo $row['Teammembers']; ?></td></tr>
<tr><td><b>Tournament ID</b></td><td><?php echo $row['Tournament']; ?></td></tr>
<tr><td><b>Score</b></td><td><?php echo $row['Score']; ?></td></tr>
</thead>
</table>
</div>
<?php
}
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
<h4 class="margin-bottom-15">Tournament Winner and Ranks
</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Captain Name</b></td>
<td><b>Team Name </b></td>
<td><b>Mobile</b></td>
<td><b>Email</b></td>
<td><b>Score</b></td>
</tr></thead>
<tbody>
<?PHP
$select_table = "select * from teams where Tournament=".$searchid." order by Score desc";
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['Cname']; ?></TD>
<TD><?php echo $row['Teamname']; ?></TD>
<TD><?php echo $row['mobno']; ?></TD>
<TD><?php echo $row['email']; ?></TD>
<TD><?php echo $row['Score']; ?></TD>
<TD>
<a href="#" class="Edit" id="<?php echo $row["sid"]; ?>"><button class="btn btn-sm btn-primary"> View </button></a></TD> 
</TR>
<?php
}
?>
</tbody></TABLE> 
              		
</div>
