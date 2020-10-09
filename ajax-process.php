<?php

require 'clean.php';

$user = clean($_SESSION['userId']);
if(isset($_POST['smsRemove'])):
    $id = clean($_POST['id']);
    $c = $conn->query("DELETE FROM `dmessaging` WHERE transid='$id'");
endif;


if(isset($_POST['sentSms'])):
    $id = clean($_POST['id']);
    $c = $conn->query("DELETE FROM `dmessage_sent` WHERE transid='$id'");
endif;

if(isset($_POST['canRequest'])):
    $id = clean($_POST['id']);
    $amount = clean($_POST['amount']);
    $c = $conn->query("UPDATE `dwithdrawal_history` SET withdrawal_status='cancelled' WHERE withdrawal_id='$id'");
    //update user wallet by userid
    $wallet = $conn->query("SELECT * FROM `members_register` WHERE userid='$user'")->fetch_assoc();
    $walletb = (Float)$wallet['dwallet_balance'];
    $total = (Float)$amount + $walletb;
    //update user wallet
    $conn->query("UPDATE `members_register` SET dwallet_balance='$total' WHERE userid='$user'");

endif;