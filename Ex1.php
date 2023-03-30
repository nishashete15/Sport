<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
//error_reporting (E_STRICT);

//https://app.plan2play.com/tournaments/roundRobin.php


function scheduler($teams){
    if (count($teams)%2 != 0){
        array_push($teams,"bye");
    }
    echo count($teams)/2;
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


$members = array("name1","name2","name3","name4","name5"); 
$schedule = scheduler($members);


foreach($schedule AS $round => $games){
    echo "Round: ".($round+1)."<BR>";
    foreach($games AS $play){
        echo $play["Home"]." - ".$play["Away"]."<BR>";
    }
    echo "<BR>";
}


/*
$members = array("name1","name2","name3","name4"); 
$tournament[0]="";
$tournamentj[0]="";
$i=0;
$j=0;
$k=0;
foreach($members as $val)
{
	foreach($members as $val1)
	{
		if($val!=$val1)
		{
			$tournament[$i]=$val."-".$val1;
			$i=$i+1;
		}
	}	
}

foreach($tournament as $val)
{
echo $val;
echo "<BR>";
}

foreach($members as $val1)
{
	$j=0;
	foreach($tournament as $val)
	{
		$j=$j+1;
		$substring_index = stripos($val, $val1."-");
		echo $val.'->'.$val1."-";
		echo $substring_index;
		echo "<BR>";
		if($substring_index !== false) 
		{
		$tournamentj[$k]=$val;
		$k=$k+1;
		array_splice($array, $j, 1);
		echo "Yes<BR>";
		break;
		}
	}
}	

foreach($tournamentj as $val)
{
echo $val;
echo "<BR>";
}
*/
?>