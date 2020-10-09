<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
    //  $cat = clean($_POST['cat']);
     $catf = clean($_POST['catf']);
     $id = clean($_POST['hid']);

     //insert into dbase
     $q = $conn->query("UPDATE `ranking` SET  dprice='$catf' WHERE dstar_id='$id' ");
     if($q){
        $_SESSION['msgs']='Updated succesfully';
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