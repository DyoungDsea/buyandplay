<?php

  include 'image_php/class.upload.php';
  // $transid=date('YmHis');
  // validating input
if($_SERVER["REQUEST_METHOD"]=="POST"){

  date_default_timezone_set("Africa/Lagos");
//   $date2=date("Y-m-d h:i:sa");
  $transid=date('YmHis');
    
      //validate title
      if(empty(test_values($_POST["title"]))){
        $te = "Title required";
     
      }else{
        $t = $conn->real_escape_string(test_values($_POST["title"]));
      }

     
      
      //validate content
      if(empty($_POST["description"])){
        $ce = "Content required";
      }else{
        $c = $conn->real_escape_string(test_values($_POST['description']));
      }


      //validate image
      if (empty($_FILES['img'])) {
        $ime = "Image is required";
      }else{
        $imgs = $conn->real_escape_string(test_values($_FILES['img']['name']));
        

        @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid= $transid.'-1';
        $foo = new Upload($_FILES['img']);            
        include("image_php/image_maker.php");
        } 
        }   

       ;
        if(empty($te) && empty($the) && empty($ce) && empty($ime) && empty($fe)){
       
$sql=mysqli_query($conn, "insert into blog set title='$t', content='$c', img='$picid'") or die(mysqli_error($conn));

          if($sql){
            $success='
            Blog Posted successfully';
            $t=$date=$xp=$time=$address=$c=$th=$f="";
          }
        
      }
      
  }

  function test_values($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>