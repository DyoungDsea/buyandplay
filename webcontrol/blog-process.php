<?php
error_reporting(0);
require 'clean.php';

include("image_php/class.upload.php");

$transid=date('YmHis');
// $transid = date("ymdhis").rand(10000, 99999);
$now = gmdate("Y-m-d H:i:s");
$date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));


//validate title
if(isset($_POST['post'])):
    $t = clean($_POST["title"]);
    $cex = $conn->real_escape_string($_POST['description']);

 //validate image
 if (empty($_FILES['img'])) {
    $ime = "Image is required";
  }else{
    $imgs = clean($_FILES['img']['name']);
    @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
    if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
    $picid=$transid.'-1';
    $foo = new Upload($_FILES['img']);            
    include("image_php/image_maker.php");
    } 

  }

  $sql=$conn->query("INSERT INTO blog SET title='$t', content='$cex', img='$picid', time_created='$date'");
  if($sql){
      $_SESSION['msgs']='Blog Posted successfully';
      header("Location:manage-blog");
  }else{
      $_SESSION['msg']='Oops! Try again later';
      header("Location:manage-blog");
  }

endif;

