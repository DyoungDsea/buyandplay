<?php
require 'clean.php';

    $div = '<div class="showResults">';
    $array = array();
    if(isset($_POST["Checked"])){
        $key=$_POST['id'];
    $query=$conn->query("SELECT * FROM `members_register` WHERE username LIKE '%{$key}%'");
    while($row=$query->fetch_assoc())
    {
      $div .= '<div class="inner">'.$row['username'].'</div>';
    }
}else{
    $div .= '<div>No result found</div>';
}
    $div .='</div>';
    echo json_encode($div);
?>