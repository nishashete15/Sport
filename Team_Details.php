 
        <div class="templatemo-content">

          <h1>All Teams and Single Player</h1>
		<hr>

<script type="text/javascript" src="js/jquery.min.js"></script>

<div>

Search Teams/Single Player: <br>
 <input type="text" id="sertex" class="form-control"  name="sertex"  onkeyup="autosearch(1);" placeholder="Search Key(Name,Address,Team name,Mobile,Email)"><br>
<div>
<script type="text/javascript">
function autosearch(str)
{
var textcontent2 = '1';
var textcontent1 = $("#sertex").val();
var info = 'sid=' + textcontent1+'&page='+ textcontent2;
if(info=='')
{
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
}  
});
}
}
</script>
<hr>

<script type="text/javascript">
	$(document).ready(function(){


var dataString = 'page=1';
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
return false;
});

</script>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
</div>
