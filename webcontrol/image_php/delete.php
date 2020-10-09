<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();
//---------------
include("conn.php");


$account=$_SESSION["account"];

include("class.upload.php");

$transid=date('YmHis');
$id=$conn->real_escape_string(htmlentities($_POST["id"],ENT_QUOTES));
$dname=$conn->real_escape_string(htmlentities($_POST["dname"],ENT_QUOTES));
$oldpic1=$conn->real_escape_string(htmlentities($_POST["oldpic1"],ENT_QUOTES));
$oldpic2=$conn->real_escape_string(htmlentities($_POST["oldpic2"],ENT_QUOTES));


mysqli_query($conn, "delete from table_name where id='$id'") or die(mysqli_error($conn));
           
@unlink('../images/'.$oldpic1);         
@unlink('../images/'.$oldpic2);         
    

header("location: home.php");
     
?>