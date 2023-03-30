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
<style type="text/css">
.ui-datepicker
{
   font-family: Arial;
   font-size: 13px;
   z-index: 1003 !important;
   display: none;
}
</style>
<script type="text/javascript">
$(document).ready(function()
{
   var jQueryDatePicker1Opts =
   {
      dateFormat: 'yy-mm-dd',
      changeMonth: false,
      changeYear: false,
      showButtonPanel: false,
      showAnim: 'show'
   };
   $("#jQueryDatePicker1").datepicker(jQueryDatePicker1Opts);


});
</script>


<div id="flash" class="flash"></div>
<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

if(dataString=='')
{
alert("Enter some text..");
}
else
{

$.ajax({
type: "POST",
url: "Teamvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Teamaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});

}
else
	{
	alert(html);
	}
}
});


}
return false;
});
});
</script>

<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();;
if(dataString=='')
{
alert("Enter some text..");
}
else
{
	$.ajax({
type: "POST",
url: "Studentvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Teamaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});

}
else
	{
	alert(html);
	}
}
});


}
return false;
});
});
</script>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Teamaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;

if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Teamaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
if(confirm("Are you sure you want to Delete?")){

var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Teamaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}

  }
return false;
});
});
</script>


<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM teams WHERE sid='$id'";
mysql_query( $delete);
}
?>

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
<form  method="post" name="form" id="form" action="">

<input type="hidden" name="ucontent" value="<?php echo $row['sid']; ?>" >
					
				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Team Captain Name</label>
                    <input type="text" name="ucontent1"  value="<?php echo $row['Cname']; ?>" class="form-control" id="lastName" Placeholder="Name">           
                  </div>
 
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Email</label>
                    <input type="text" name="ucontent2" value="<?php echo $row['email']; ?>" class="form-control" id="firstName" Placeholder="Email">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Mobile NO</label>
                    <input type="text" name="ucontent3"  value="<?php echo $row['mobno']; ?>" class="form-control" id="lastName" Placeholder="Mobile No">        
                  </div>
                </div>
				


			  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                   <label>Tournament : </label>
                    
					<select type="text" name="content4" class="form-control" id="Routechange" >
 
					
<?php
$select_table1 ="Select * from tournament order by Name";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
if($row1['TID']==$row['Tournament'])
{
echo '<option value="'.$row1['TID'].'" Selected>'.$row1['Name'].'</option>';
}
else
{
echo '<option value="'.$row1['TID'].'">'.$row1['Name'].'</option>';	
}

}
?>  
					</select>
					 
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label>Team name</label>
                    <input type="text" name="ucontent5" class="form-control" id="Emailaddress" Placeholder="Team name" value="<?php echo $row['Teamname']; ?>"> 
                  </div>
                </div>   

				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label>Address</label>
                    <Textarea type="text" name="ucontent6" class="form-control" id="Emailaddress" Placeholder="Address"><?php echo $row['Address']; ?></Textarea>
                  </div>
                </div>   
  
				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label>Team members</label>
                    <Textarea type="text" name="ucontent7" class="form-control" id="Emailaddress" Placeholder="Team members"><?php echo $row['Teammembers']; ?></Textarea>
                  </div>
                </div> 
				
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="Updatesubmit_button">Update</button>   
                </div>
              </div>
</form>
</div>
<?php
}
}
else
{
?>
<div id="cp_contact_form">
<form name="form" id="form">

				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Team Captain Name</label>
                    <input type="text" name="content1"  class="form-control" id="lastName" Placeholder="Name">           
                  </div>
 
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Email</label>
                    <input type="text" name="content2" class="form-control" id="firstName" Placeholder="Email">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Mobile NO</label>
                    <input type="text" name="content3" class="form-control" id="lastName" Placeholder="Mobile No">        
                  </div>
                </div>
				


			  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                   <label>Tournament : </label>
                    
					<select type="text" name="content4" class="form-control" id="Routechange" >
 
<?php
$select_table1 ="Select * from tournament order by Name";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
echo '<option value="'.$row1['TID'].'">'.$row1['Name'].'</option>';	
}
?>  
					</select>
					 
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label>Team name</label>
                    <input type="text" name="content5" class="form-control" id="Emailaddress" Placeholder="Team name"> 
                  </div>
                </div>   

				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label>Address</label>
                    <Textarea type="text" name="content6" class="form-control" id="Emailaddress" Placeholder="Address"></Textarea>
                  </div>
                </div>   
  
				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label>Team members</label>
                    <Textarea type="text" name="content7" class="form-control" id="Emailaddress" Placeholder="Team members"></Textarea>  
                  </div>
                </div>
				
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="submit_button">Save</button>   
                </div>
              </div>
</form>
</div>
<?php
}
?>


<?php
if(isset($_POST['content1']))
{

$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);
$content4=mysql_real_escape_string($_POST['content4']);
$content5=mysql_real_escape_string($_POST['content5']);
$content6=mysql_real_escape_string($_POST['content6']);
$content7=mysql_real_escape_string($_POST['content7']);


mysql_query("insert into teams(Cname,mobno,email,Address,Teamname,Tournament,Teammembers) values ('$content1','$content3','$content2','$content6','$content5','$content4','$content7')");
echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";

}
if(isset($_POST['ucontent']))
{
$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);
$ucontent5=mysql_real_escape_string($_POST['ucontent5']);
$ucontent6=mysql_real_escape_string($_POST['ucontent6']);
$ucontent7=mysql_real_escape_string($_POST['ucontent7']);

mysql_query("update teams set Cname='$ucontent1',mobno='$ucontent3',email='$ucontent2',Address='$ucontent6',Teamname='$ucontent5',Tournament='$ucontent4',Teammembers='$ucontent7' where sid=$ucontent");

echo "<font style='color:#0000FF;'>Record Updated</font><br><br><br>";

}
?>


<div class="table-responsive">
<h4 class="margin-bottom-15">All Teams Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>ID</b></td>
<td><b>Captain Name</b></td>
<td><b>Email</b></td>
<td><b>Mobile No</b></td>
<td><b>Address</b></td>
</tr></thead>
<tbody>
<?PHP

$searchid="";
if(isset($_POST['sid']))
{
	$searchid=$_POST['sid'];
}
$per_page = 10; 
$select_table = "select * from teams where concat(Cname,' ',Address,' ',Teamname,' ',mobno,' ',email) like '%".$searchid."%'";

$fetch= mysql_query($select_table);
$count = mysql_num_rows($fetch);
$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by sid limit $start,$per_page";
$fetch= mysql_query($select_table);
}

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['sid']; ?></TD>
<TD><?php echo $row['Cname']; ?></TD>
<TD><?php echo $row['email']; ?></TD>
<TD><?php echo $row['mobno']; ?></TD>
<TD><?php echo $row['Address']; ?></TD>

<TD>
<a href="#" class="ABCD" id="<?php echo $row['sid']; ?>"><button class="btn btn-sm btn-danger"> X </button></a>
<a href="#" class="Edit" id="<?php echo $row['sid']; ?>"><button class="btn btn-sm btn-primary"> Edit </button></a>
</TD>

</TR>
<?php
}
?>
</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 				
</div>
