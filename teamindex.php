<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');

if(isset($_GET['Logout']))
{
$_SESSION['Tuserid']= "";
$_SESSION['Tusername']= "";

unset($_SESSION['Tuserid']);
unset($_SESSION['Tusername']);
}
elseif(isset($_SESSION['Tuserid']) and isset($_SESSION['Tusername']))
{
		header("Location:TeamMain.php");
}

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
<body style="background-image: url('Homebg.jpg');background-repeat:no-repeat;background-size:cover;">
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
               <form role="form" action="TeamMain.php" class="form-horizontal templatemo-signin-form" id="form" method="post"  enctype="multipart/form-data" style="background-color: #DFF4FF;padding:20px;border: 2px solid red;
  border-radius: 25px;">

			   <h1>Sign In</h1>
          <p class="margin-bottom-15">Enter Email and Password.</p>
	<div id="show"></div>


				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Email</label>
                    <input type="text" name="Email" class="form-control" id="firstName" Placeholder="Email">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Password</label>
                    <input type="Password" name="Password" class="form-control" id="lastName" Placeholder="Password">        
                  </div>
                </div>
				

 
				
              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" name="signin" class="btn btn-default" id="submit_button">Sign In</button>   
				  <button type="reset" class="btn btn-default">Reset</button>    

                </div>
              </div>
			  

            </form><br><br><br>
    </div>
  </div>
</body>
</html>