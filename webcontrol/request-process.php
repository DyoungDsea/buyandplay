<?php

require 'clean.php';
$id = clean($_SESSION['userid']);

if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['load'])):
    $name = clean($_POST['name']);
    $number = clean($_POST['number']);
    $bank = clean($_POST['bank']);
    $amount = clean($_POST['amount']);
    $pass = md5(clean($_POST['pass']));
    $w = date("ymdhis").rand(10000, 99999);
    $now = gmdate("Y-m-d H:i:s");
    $date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));


        $x = $conn->query("SELECT * FROM `admin_accounts` WHERE pword='$pass' AND userid='$id' ");
        if($x->num_rows>0){
        //update pword
        $u = $conn->query("INSERT INTO `dwithdrawal_history` SET withdrawal_id='$w', account_name='$name', account_number='$number', bank_name='$bank', amount='$amount', user_id='$id',ddate='$date' ");
        if($u){
            //minus amount from user account and update current balance
            $xx = $x->fetch_assoc();
            $balance = (Float)$xx['dwallet'] - (Float)$amount;
            //update account
            $q = $conn->query("UPDATE `admin_accounts` SET dwallet='$balance' WHERE pword='$pass' AND userid='$id' ");
            $_SESSION['msgs']= "<p style='font-size:16px; color:white'>Request confirmed</p>";
            header("Location: index");
        }else{
            $_SESSION['msg']= "<p style='font-size:16px; color:white'>Fail! try again later</p>";
            header("Location: index");
        }

        }else{
            $_SESSION['msg'] = '<p style="color:white">Oops! try again later</p>';
            header("Location: index");
        }
    
    

endif;
endif;