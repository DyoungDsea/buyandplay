<?php

require 'clean.php';



if(isset($_POST['test'])):
  $t = clean($_POST["title"]);
  $c = clean($_POST['description']);

$sql=$conn->query("INSERT INTO testimonial SET name='$t', content='$c'") or die(mysqli_error($conn));
if($sql){
  $_SESSION['msgs']='Posted successfully';
  header("Location:manage-testimonial");
}else{
  $_SESSION['msg']='Oops! Try again later';
  header("Location:manage-testimonial");
}

endif;