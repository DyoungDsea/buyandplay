<?php
require 'clean.php';

$result ='';
$button ='';
if(isset($_POST['Checked'])):
    $id = clean($_POST['id']);
    $amount = clean($_POST['amount']);
    $c = $conn->query("SELECT dwallet FROM `admin_accounts` WHERE userid='$id'");
    if($c->num_rows>0){
        $r = $c->fetch_assoc();
        if($amount > $r['dwallet']){
            $result .= "Sorry! your request is greater than avaliable balance";
            $button .='<button type="submit" disabled name="load"   class="btn btn-primary btn-sm">Proceed</button>';
        }else{
            $button .='<button type="submit" name="load"   class="btn btn-primary btn-sm">Proceed</button>';
        }
    }

endif;


$data = array(
    'result' => $result,
    'button'=> $button,
    
);	

echo json_encode($data);