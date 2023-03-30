<?php
date_default_timezone_set("Asia/Kolkata");
error_reporting(0);

#$link=mysql_connect("localhost","root") or die("Could not connect".mysql_error());
#mysql_select_db("sports")or die("Could not connect: ". mysql_error());
$Rdateus=date('Y-m-d h:i:s');

//local
$sql_host =     "localhost";      
$sql_username = "root";    
$sql_password = "";       
$sql_database = "sports"; 
$mysqli = new mysqli($sql_host , $sql_username , $sql_password , $sql_database );



/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// /* change character set to utf8 */
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
} else {
    // printf("Current character set: %s\n", $mysqli->character_set_name());
}
if (!function_exists('mysql_real_escape_string')) {
    function mysql_real_escape_string($string){
        global $mysqli;
        if($string){
            // $mysqli = new mysqli($sql_host , $sql_username , $sql_password , $sql_database );            
            $newString =  $mysqli->real_escape_string($string);
            return $newString;
        }
    }
}
// $mysqli->close();
$conn = null;
if (!function_exists('mysql_query')) {
    function mysql_query($query) {
        global $mysqli;
        // echo "DAAAAA";
        if($query) {
            $result = $mysqli->query($query);
            return $result;
        }
    }
}
else {
    $conn=mysql_connect($sql_host,$sql_username, $sql_password);
    mysql_set_charset("utf8", $conn);
    mysql_select_db($sql_database);
}

if (!function_exists('mysql_fetch_array')) {
    function mysql_fetch_array($result){
        if($result){
            $row =  $result->fetch_assoc();
            return $row;
        }
    }
}

if (!function_exists('mysql_num_rows')) {
    function mysql_num_rows($result){
        if($result){
            $row_cnt = $result->num_rows;;
            return $row_cnt;
        }
    }
}

if (!function_exists('mysql_free_result')) {
    function mysql_free_result($result){
        if($result){
            global $mysqli;
            $result->free();

        }
    }
}

if (!function_exists('mysql_data_seek')) {
    function mysql_data_seek($result, $offset){
        if($result){
            global $mysqli;
            return $result->data_seek($offset);

        }
    }
}

if (!function_exists('mysql_close')) {
    function mysql_close(){
        global $mysqli;
        return $mysqli->close();
    }
}

if (!function_exists('mysql_insert_id')) {
    function mysql_insert_id(){
            global $mysqli;
            $lastInsertId = $mysqli->insert_id;
            return $lastInsertId;
    }
}

if (!function_exists('mysql_error')) {
    function mysql_error(){
        global $mysqli;
        $error = $mysqli->error;
        return $error;
    }
}

?>
