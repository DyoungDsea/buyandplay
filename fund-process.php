<?php
require 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['loadx'])):


        $name = clean($_POST['name']);
        $amount = clean($_POST['amount']);
        echo $date = date("Y-m-d", strtotime(clean($_POST['date'])));
        $ref = clean($_POST['ref']);
        $userid = clean($_SESSION['userId']);
        $req_id = date("hisYsh");
        // die();

        $go = $conn->query("INSERT INTO funding_request SET req_id='$req_id', userid = '$userid', name='$name', damount='$amount', ddate='$date', refference_no='$ref' ");
        if($go){
            $_SESSION['msgs'] = "Request received";
            header("Location: funding-request");
        }else{
            $_SESSION['msgs'] = "Oops! try again later";
            header("Location: funding-request");
        }



    endif;
}