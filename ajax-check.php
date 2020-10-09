<?php
require 'clean.php';

$result ='';
$button ='';
if(isset($_POST['Checked'])):
    $id = clean($_POST['id']);
    $amount = clean($_POST['amount']);
    $c = $conn->query("SELECT dwallet_balance FROM `members_register` WHERE userid='$id'");
    if($c->num_rows>0){
        $r = $c->fetch_assoc();
        if($amount > $r['dwallet_balance']){
            $result .= "Sorry! your request is greater than avaliable balance";
            $button .='<button type="submit" disabled name="load"  class="submit-btn">Proceed</button>';
        }else{
            $button .='<button type="submit" name="load"  class="submit-btn">Proceed</button>';
        }
    }

endif;


$data = array(
    'result' => $result,
    'button'=> $button,
    
);	

echo json_encode($data);