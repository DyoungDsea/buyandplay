<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
     $cat = clean($_POST['cat']);
     $catf = clean($_POST['catf']);
     $id = clean(date("ihYis"));  

     //insert into dbase
     $q = $conn->query("INSERT INTO `ranking` SET dstar_id='$id', dstar='$cat', dprice='$catf' ");
     if($q){
        $_SESSION['msgs']='Added succesfully';
        header("Location: manage-ranking");

     }else{
        $_SESSION['msg']='Fail! try again later';
        header("Location: manage-ranking");

     }

 }else{
     $_SESSION['msg']='Oops! try again later';
     header("Location: manage-ranking");
 }

endif;