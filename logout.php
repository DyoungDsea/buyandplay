<?php
require_once("config.php");
session_start();
$userid=$_SESSION['userid'];
// $queryx=$conn->query("update admin_accounts set dstatus='offline' where userid='$userid' ");

header("Location: admin_main");
       
session_destroy();
?>