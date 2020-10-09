<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
     $cat = clean($_POST['cat']);
     $catf = clean($_POST['catf']);
     $win = clean($_POST['win']);
     $id = clean(date("ihYis"));

     //insert into dbase
     $q = $conn->query("INSERT INTO `dgame_categories` SET category_id='$id', dcategory='$cat', dfee='$catf'");
     if($q){

        $conn->query("INSERT INTO `dgeneral_booking` SET dcat_id='$id', dcategory='$cat', dgame_won=0, dstar=0, dstatus ='Free' ");
        $conn->query("INSERT INTO `dgeneral_booking` SET dcat_id='$id', dcategory='$cat', dgame_won=0, dstar=3, dstatus ='bronze' ");
        $conn->query("INSERT INTO `dgeneral_booking` SET dcat_id='$id', dcategory='$cat', dgame_won=0, dstar=4, dstatus ='silver' ");
        $conn->query("INSERT INTO `dgeneral_booking` SET dcat_id='$id', dcategory='$cat', dgame_won=0, dstar=5, dstatus ='gold' ");

        $_SESSION['msgs']='Added succesfully';
        header("Location: manage-categories");

     }else{
        $_SESSION['msg']='Fail! try again later';
        header("Location: manage-categories");

     }

 }elseif(isset($_POST['pools'])){
    $cat = clean($_POST['cat']);
    $catf = clean($_POST['catf']);
    $win = clean($_POST['win']);
    $id = clean(date("ihYis"));

    //insert into dbase
    $q = $conn->query("INSERT INTO `dpools` SET dcategory_ids='$id', dpool='$cat', dfee='$catf'");
    if($q){

       $conn->query("INSERT INTO `dpool_general` SET dcat_id='$id', dcategory='$cat', dgame_won=0, dstar=0, dstatus ='Free' ");
       $conn->query("INSERT INTO `dpool_general` SET dcat_id='$id', dcategory='$cat', dgame_won=0, dstar=3, dstatus ='bronze' ");
       $conn->query("INSERT INTO `dpool_general` SET dcat_id='$id', dcategory='$cat', dgame_won=0, dstar=4, dstatus ='silver' ");
       $conn->query("INSERT INTO `dpool_general` SET dcat_id='$id', dcategory='$cat', dgame_won=0, dstar=5, dstatus ='gold' ");

       $_SESSION['msgs']='Added succesfully';
       header("Location: manage-pool-categories");

    }else{
       $_SESSION['msg']='Fail! try again later';
       header("Location: manage-pool-categories");

    }

}else{
     $_SESSION['msg']='Oops! try again later';
     header("Location: index");
 }

endif;