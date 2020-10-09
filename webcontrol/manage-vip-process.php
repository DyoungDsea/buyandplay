<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
     $cat = clean($_POST['cat']); //days
     $catt = clean($_POST['catt']); //days in word
     $catf = clean($_POST['catf']);//price
     $id = clean(date("ihYis")); //date

     //insert into dbase
     $q = $conn->query("INSERT INTO `dvip_categories` SET vip_id='$id', ddays='$cat', dprice='$catf', dmonth='$catt' ");
     if($q){
        $_SESSION['msgs']='Added succesfully';
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