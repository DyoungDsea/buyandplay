<?php

require 'clean.php';
$id = clean($_SESSION['userId']);

if($_SERVER["REQUEST_METHOD"]=="POST"):
if(isset($_POST['load'])):
    $name = clean($_POST['name']);
    $number = clean($_POST['number']);
    $bank = clean($_POST['bank']);
    $amount = clean($_POST['amount']);
    $pass = md5(clean($_POST['pass']));
    $w =  date("ymdhis").rand(10000, 99999);


        $x = $conn->query("SELECT * FROM `members_register` WHERE pword='$pass' AND userid='$id' ");
        if($x->num_rows>0){
        //update pword
        $u = $conn->query("INSERT INTO `dwithdrawal_history` SET withdrawal_id='$w', account_name='$name', account_number='$number', bank_name='$bank', amount='$amount', user_id='$id' ");
        if($u){
            //minus amount from user account and update current balance
            $xx = $x->fetch_assoc();
            $balance = (Float)$xx['dwallet_balance'] - (Float)$amount;
            //update account
            $q = $conn->query("UPDATE `members_register` SET dwallet_balance='$balance' WHERE pword='$pass' AND userid='$id' ");
            
            //insert record into history
            $text = 'Withdrawal';
            $c = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$w', dname='$text', userid='$id', amount='$amount', ddebit='$amount', dwallet_balance='$balance' ");

            $_SESSION['msgs']= "<p style='font-size:16px; color:white'>Request confirmed</p>";
            header("Location: withdrawal-funds");
        }else{
            $_SESSION['msg']= "<p style='font-size:16px; color:white'>Fail! try again later</p>";
            header("Location: withdrawal-funds");
        }

        }else{
            $_SESSION['msg'] = '<p style="color:white">Oops! try again later</p>';
            header("Location: withdrawal-funds");
        }
    
    

endif;
endif;