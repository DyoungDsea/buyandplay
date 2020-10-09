<?php
session_start();
require_once("config.php");
if(isset($_POST['log'])){
	$query=$conn->prepare("SELECT * FROM admin_accounts WHERE demail=? AND pword=? AND dstatus=?");
 	$query->bind_param('sss',$demail,$pword,$dstatus);
	$demail=$_POST['email'];
	$dstatus = 'active';
	$pword=md5($_POST['password']);
	$query->execute();
	$query->bind_result($id,$dname,$userid,$demail,$pword,$dposition,$dwallet,$dprivileges,$dstatus,$lastlogin);
	$query->store_result();
	if($query->fetch()){
	$_SESSION['detail']=$demail;
	$_SESSION['userid']=$userid;
	$_SESSION['admin']=true;
    // $queryx=$conn->query("update admin_accounts set dstatus='online' where userid=$userid");
    // echo $queryx;
    // die();
	header("Location: webcontrol/index");

    }
	else{
		$_SESSION['msg']="!Incorrect Login details.";
		  header("Location: admin_main");
	}
}else{
	header("Location: index");
}
 ?>