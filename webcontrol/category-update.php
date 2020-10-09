<?php

 require 'clean.php';

 if($_SERVER["REQUEST_METHOD"]=="POST"):
 if(isset($_POST['log'])){
     $cat = clean($_POST['cat']);
     $catf = clean($_POST['catf']);
     $id = clean($_POST['hid']);
    //  $win = clean($_POST['win']);

     //insert into dbase
     $q = $conn->query("UPDATE `dgame_categories` SET  dcategory='$cat', dfee='$catf' WHERE category_id='$id' ");
     if($q){         
        $conn->query("UPDATE `dcategory_subscriptions` SET dcategory='$cat' WHERE dgame_cat_id='$id' ");
        $conn->query("UPDATE `dgeneral_booking` SET dcategory='$cat' WHERE dcat_id='$id' ");
        $_SESSION['msgs']='Updated succesfully';
        header("Location: manage-categories");

     }else{
        $_SESSION['msg']='Fail! try again later';
        header("Location: manage-categories");

     }

 }elseif(isset($_POST['pool'])){
    $cat = clean($_POST['cat']);
    $catf = clean($_POST['catf']);
    $id = clean($_POST['hid']);
   //  $win = clean($_POST['win']);

    //insert into dbase
    $q = $conn->query("UPDATE `dpools` SET  dpool='$cat', dfee='$catf' WHERE dcategory_ids='$id' ");
    if($q){         
       $conn->query("UPDATE `dcategory_subscriptions` SET dcategory='$cat' WHERE dgame_cat_id='$id' ");
       $conn->query("UPDATE `dpool_general` SET dcategory='$cat' WHERE dcat_id='$id' ");
       $_SESSION['msgs']='Updated succesfully';
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