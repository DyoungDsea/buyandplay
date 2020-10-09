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


mysqli_query($conn, "update table_name set dname='$dname' where id='$id'") or die(mysqli_error($conn));

           
@list(, , $imtype, ) = getimagesize($_FILES['photo']['tmp_name']); 
@list(, , $imtype2, ) = getimagesize($_FILES['photo2']['tmp_name']);            

if ($imtype == 3 or $imtype == 2 or $imtype == 1) {  
@unlink('../images/'.$oldpic1);         
$picid=$transid.'-1.jpg';
$foo = new Upload($_FILES['photo']);            
include("image_maker.php");
mysqli_query($conn, "update table_name set src='$picid' where id='$id'");
}   
       
if ($imtype2 == 3 or $imtype2 == 2 or $imtype2 == 1) {  
@unlink('../images/'.$oldpic2);         
$picid=$transid.'-2.jpg';
$foo = new Upload($_FILES['photo2']);            
include("image_maker.php");
mysqli_query($conn, "update table_name set src2='$picid' where id='$id'");
}    

header("location: home.php");
     
?>