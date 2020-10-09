<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
     $cat = clean($_POST['cat']); //days
     $catt = clean($_POST['catt']); //days
     $catf = clean($_POST['catf']);//price
     $id = clean($_POST['hid']); //vip id

     //insert into dbase
     $q = $conn->query("UPDATE `dvip_categories` SET  ddays='$cat', dprice='$catf', dmonth='$catt' WHERE vip_id='$id' ");
     if($q){
        $_SESSION['msgs']='Updated succesfully';
        header("Location: manage-vip-sub");

     }else{
        $_SESSION['msg']='Fail! try again later';
        header("Location: manage-vip-sub");

     }

 }else{
     $_SESSION['msg']='Oops! try again later';
     header("Location: manage-vip-sub");
 }

endif;