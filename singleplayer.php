<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Dashboard System</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">
</head>
<body style="background-image: url('Homebg2.jpg');background-repeat:no-repeat;background-size:cover;">
  <div id="main-wrapper">
<?php
include("Header.php");
?>

<ul  class="nav nav-pills" Style="text-align:right;">
<li><a href="teamindex.php" style="background-color:powderblue;">Home</a></li>

                <li><a href="Teams.php" style="background-color:powderblue;">Team Registration</a></li>
				<li><a href="singleplayer.php" style="background-color:powderblue;">Single Player Registration</a></li>
                <li><a href="teamindex.php" style="background-color:powderblue;">Sign In</a></li>	
				
 </ul>
 

    <div class="template-page-wrapper" >
<br><br>

<script type="text/javascript" src="js/jquery.min.js"></script>



<div id="flash" class="flash"></div>
<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$("#submit_button").click(function() {
var dataString = $('#form').serialize();
 document.getElementById("show").innerHTML="";
if(dataString=='')
{
alert("Enter some text..");
}
else
{
$.ajax({
type: "POST",
url: "singleplayervalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Teamactionone.php",
data: dataString,
cache: true,
success: function(html){
$("#show").fadeIn(400).html('');
$("#show").append(html);
}  
});

}
else
	{
	alert(html);
	$("#show").append("<font style='color:#FF0000;'>Team Registration Fail:"+html+"</font><br><br><br>");
	}
}
});


}
return false;
});
});
</script>



               <form role="form" action="Student.php" class="form-horizontal templatemo-signin-form" id="form" method="post"  enctype="multipart/form-data" style="background-color: #DFF4FF;padding:20px;border: 2px solid red;
  border-radius: 25px;">

			   <h1>Single Player Registration</h1>
          <p class="margin-bottom-15">Enter Single Player Information.</p>
	<div id="show"></div>
     <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Player Name*</label>
                    <input type="text" name="content1"  class="form-control" id="lastName" Placeholder="Name">           
                  </div>
 
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Email*</label>
                    <input type="text" name="content2" class="form-control" id="firstName" Placeholder="Email">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Mobile NO*</label>
                    <input type="text" name="content3" class="form-control" id="lastName" Placeholder="Mobile No">        
                  </div>
                </div>
				
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Password*</label>
                    <input type="Password" name="content8" class="form-control" id="firstName" Placeholder="Password">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Confirm Password*</label>
                    <input type="Password" name="content9" class="form-control" id="lastName" Placeholder="Confirm Password">        
                  </div>
                </div>
				
			  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                   <label>Tournament* : </label>
                    
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
                </div>   

				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label>Address</label>
                    <Textarea type="text" name="content6" class="form-control" id="Emailaddress" Placeholder="Address"></Textarea>
                  </div>
                </div>   
               
			   <input type="hidden" name="content5"> 
			   <input type="hidden" name="content7"> 
      
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="btn btn-default" id="submit_button">Save</button>   
				  <button type="reset" class="btn btn-default">Reset</button>   
                </div>
              </div>
			  

            </form><br><br><br>
    </div>

  </div>
</body>
</html>
