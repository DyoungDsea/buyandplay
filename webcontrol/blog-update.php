<?php
    require 'session.php';

    include("../config.php");
include("image_php/class.upload.php");
$transid=date('YmHis');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    date_default_timezone_set("Africa/Lagos");
	// $date2=date("Y-m-d h:i:sa");
    
    // id
    $id = $conn->real_escape_string(test_values($_POST['id']));

      //validate title
      if(empty(test_values($_POST["title"]))){
        $te = "Title is required";
     
      }else{
        $t = $conn->real_escape_string(test_values($_POST["title"]));
      }

      

      //validate content
      if(empty($_POST["description"])){
        $ce = "Content required";
      }else{
        $c = $conn->real_escape_string($_POST['description']);
      }

    //   validate image    
        $imgs = $conn->real_escape_string(test_values($_FILES['img']['name']));
        $oldpic="images/".$_POST['oldpic'].".jpg";

        $sql = $conn->query("UPDATE blog SET title='$t', content='$c' WHERE id='$id' ");
          if($sql){
            $_SESSION['msgs']='Updated succesfully';
             header("Location: manage-blog");
            }
            @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
            if($imtype == 3 or $imtype == 2 or $imtype == 1) { 
           @unlink($oldpic);         
           $picid=$transid.'-1';
           $foo = new Upload($_FILES['img']);            
           include("image_php/image_maker.php");
           $sql=$conn->query("UPDATE blog set img='$picid' where id='$id'");
           if($sql){
            $_SESSION['msgs']='Updated succesfully';
        header("Location: manage-blog");
           }else{
                    $_SESSION['msg']='Fail! try again later';
                     header("Location: manage-categories");
            
                }
           
           }  
        // die();
       
}


function test_values($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>