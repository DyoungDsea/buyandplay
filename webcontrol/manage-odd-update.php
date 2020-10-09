<?php

require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['ten'])){
    $catf = clean($_POST['catf']);
    $id = clean($_POST['hid']);

    //insert into dbase
    $q = $conn->query("UPDATE `dgeneral_booking` SET dgame_won='$catf' WHERE id='$id' ");
    if($q){
       $_SESSION['msgs']='Updated succesfully';
       echo "<script>history.back(); </script>";

    }else{
       $_SESSION['msg']='Fail! try again later';
       echo "<script>history.back(); </script>";

    }

}elseif(isset($_POST['nap'])){
   $catf = clean($_POST['catf']);
   $id = clean($_POST['hid']);

   //insert into dbase
   $q = $conn->query("UPDATE `dpool_general` SET dgame_won='$catf' WHERE id='$id' ");
   if($q){
      $_SESSION['msgs']='Updated succesfully';
       echo "<script>history.back(); </script>";

   }else{
      $_SESSION['msg']='Fail! try again later';
       echo "<script>history.back(); </script>";

   }

}elseif(isset($_POST['tip'])){
   $add = clean($_POST['cat']);
   $catf = clean($_POST['catf']);
   $id = clean($_POST['hid']);

   //insert into dbase
   $q = $conn->query("UPDATE `dpercentage` SET dadmin='$add', dusers='$catf' WHERE id='$id' ");
   if($q){
      $_SESSION['msgs']='Updated succesfully';
      header("Location: manage-per-won");

   }else{
      $_SESSION['msg']='Fail! try again later';
      header("Location: manage-per-won");

   }

}elseif(isset($_POST['lost'])){
   $add = clean($_POST['cat']);
   $catf = clean($_POST['catf']);
   $id = clean($_POST['hid']);

   //insert into dbase
   $q = $conn->query("UPDATE `dpercentage_return` SET dadmin='$add', dusers='$catf' WHERE id='$id' ");
   if($q){
      $_SESSION['msgs']='Updated succesfully';
      header("Location: manage-per-lost");

   }else{
      $_SESSION['msg']='Fail! try again later';
      header("Location: manage-per-lost");

   }

}elseif(isset($_POST['setnew'])){
   $add = clean($_POST['cat']);
   $catf = clean($_POST['catf']);
   $id = date("ihds");

   //insert into dbase
   $q = $conn->query("INSERT INTO `dweb_name` SET dwebsite='$add', name='$catf', dweb_id='$id' ");
   if($q){
      $_SESSION['msgs']='Created succesfully';
      header("Location: set-website");

   }else{
      $_SESSION['msg']='Fail! try again later';
      header("Location: set-website");

   }

}elseif(isset($_POST['webup'])){
   $add = clean($_POST['cat']);
   $catf = clean($_POST['catf']);
   $id = clean($_POST['hid']);

   //insert into dbase
   $q = $conn->query("UPDATE `dweb_name` SET dwebsite='$add', name='$catf' WHERE id='$id' ");
   if($q){
      $_SESSION['msgs']='Updated succesfully';
      header("Location: set-website");

   }else{
      $_SESSION['msg']='Fail! try again later';
      header("Location: set-website");

   }

}elseif(isset($_POST['webupmain'])){
   $add = clean($_POST['cat']);
   $catf = clean($_POST['catf']);
   $catft = clean($_POST['catft']);
   $catftt = clean($_POST['catftt']);
   $id = clean($_POST['hid']);

   //insert into dbase
   $q = $conn->query("UPDATE `dwebsite_main` SET dname='$add', demail='$catf', dphone='$catft', daddress='$catftt' WHERE id='$id' ");
   if($q){
      $_SESSION['msgs']='Updated succesfully';
      header("Location: set-main-website");

   }else{
      $_SESSION['msg']='Fail! try again later';
      header("Location: set-main-website");

   }

}elseif(isset($_POST['promo'])){
   $add = clean($_POST['cat']);
   $catf = clean($_POST['catf']);
   $catt = clean($_POST['catt']);
   $text = clean($_POST['text']);
   $id = clean($_POST['hid']);

   //insert into dbase
   $q = $conn->query("UPDATE `dpromo` SET dpercentage='$add', dtext='$text', start_date='$catf', end_date='$catt' WHERE id='$id' ");
   if($q){
      $_SESSION['msgs']='Updated succesfully';
      header("Location: set-promo");

   }else{
      $_SESSION['msg']='Fail! try again later';
      header("Location: set-promo");

   }

}


endif;