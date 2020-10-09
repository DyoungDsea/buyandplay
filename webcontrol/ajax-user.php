<?php
require 'clean.php';
$trans = date("ymdhis").rand(10000, 99999);
$now = gmdate("Y-m-d H:i:s");
$date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));


$site = $conn->query("SELECT * FROM `dwebsite_main`");
if($site->num_rows>0){
    $rop = $site->fetch_assoc();
    $demail = $rop['demail'];
    $dname = $rop['dname'];
}

if(isset($_POST['Ban'])){
    $id = clean($_POST['id']);
    $conn->query("UPDATE `members_register` SET status='ban' WHERE userid='$id'");
}

if(isset($_POST['unBan'])){
    $id = clean($_POST['id']);
    $conn->query("UPDATE `members_register` SET status='active' WHERE userid='$id'");
}

//request withdrawal
if(isset($_POST['Payment'])){
    $id = clean($_POST['user']);
    $with= clean($_POST['withs']);
    $email = clean($_POST['email']);
    $conn->query("UPDATE `dwithdrawal_history` SET withdrawal_status='Approved' WHERE user_id='$id' AND withdrawal_id='$with'");
    //send sms to user email
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <'.$demail.'>' . "\r\n";
    $subject = 'Withdrawal Request';
    $sms = 'Your request has been approved,'."\r\n".' your money will be deposited to the account details sent to us. '.$dname;;
    
    mail($email, $subject, $sms, $header);
}

if(isset($_POST['PaymentAwait'])){
    $id = clean($_POST['user']);
    $with= clean($_POST['withs']);
    $email = clean($_POST['email']);
    $conn->query("UPDATE `dwithdrawal_history` SET withdrawal_status='paid' WHERE user_id='$id' AND withdrawal_id='$with'");    
    //send sms to user email
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <'.$demail.'>' . "\r\n";
    $subject = 'Withdrawal Request Paid';
    $sms = 'Your withdrawal has been paid. '.$dname;
    
    mail($email, $subject, $sms, $header);
}


if(isset($_POST['noPay'])){
    $id = clean($_POST['user']);
    $with= clean($_POST['withs']);
    $email = clean($_POST['email']);
    $conn->query("UPDATE `dwithdrawal_history` SET withdrawal_status='rejected' WHERE user_id='$id' AND withdrawal_id='$with'");
    //send sms to user email

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <'.$demail.'>' . "\r\n";
    $subject = 'Withdrawal Request Rejected';
    $sms = 'Your request has been rejected, we are sorry for inconveniences '.$dname;
    
    mail($email, $subject, $sms, $header);

    //pay user back his money
    $wh =$conn->query("SELECT amount FROM `dwithdrawal_history` WHERE user_id='$id' AND withdrawal_id='$with' ")->fetch_assoc();
    $sql =$conn->query("SELECT dwallet_balance FROM `members_register` WHERE userid='$id' ")->fetch_assoc();
    $wh = (Float)$wh['amount'];
    $wallet = (Float)$sql['dwallet_balance'];

    $total = $wh + $wallet;
    //update user wallet
    $sql =$conn->query("UPDATE `members_register` SET dwallet_balance='$total' WHERE userid='$id' ");

    // $trans = date("ishYs");
    $text = 'Withdrawal Rejected';
    $conn->query("INSERT INTO `dtransaction_history` SET  userid='$id', dname='$text', transaction_id='$trans', amount='$wh', dcredit='$wh', dwallet_balance='$total', ddate='$date'");
}



//request withdrawal admin
if(isset($_POST['Payments'])){
    $id = clean($_POST['user']);
    $with= clean($_POST['withs']);
    $conn->query("UPDATE `dwithdrawal_history` SET withdrawal_status='paid' WHERE user_id='$id' AND withdrawal_id='$with'");
}


if(isset($_POST['noPays'])){
    $id = clean($_POST['user']);
    $with= clean($_POST['withs']);
    $conn->query("UPDATE `dwithdrawal_history` SET withdrawal_status='cancelled' WHERE user_id='$id' AND withdrawal_id='$with'");
    //pay user back his money
    $wh =$conn->query("SELECT amount FROM `dwithdrawal_history` WHERE user_id='$id' AND withdrawal_id='$with' ")->fetch_assoc();
    $sql =$conn->query("SELECT dwallet FROM `admin_accounts` WHERE userid='$id' ")->fetch_assoc();
    $wh = (Float)$wh['amount'];
    $wallet = (Float)$sql['dwallet'];

    $total = $wh + $wallet;
    //update user wallet
    $sql =$conn->query("UPDATE `admin_accounts` SET dwallet='$total' WHERE userid='$id' ");

}




//Fun wallet
if(isset($_POST['PaymentFund'])){
    $id = clean($_POST['user']);
    $amount = clean($_POST['amount']);
    $with= clean($_POST['withs']);
    $email = clean($_POST['email']);
    $conn->query("UPDATE `funding_request` SET dstatus='paid' WHERE userid='$id' AND req_id='$with'");
    //send sms to user email
    $subject = 'Funding Request';
    $sms = 'Your request of '.$amount.' has been approved, your wallet balance have been updated successfully. Buy and Bet';
    mail($email,$subject, $sms);

    $wh =$conn->query("SELECT damount FROM `funding_request` WHERE userid='$id' AND req_id='$with' ")->fetch_assoc();
    $sql =$conn->query("SELECT dwallet_balance FROM `members_register` WHERE userid='$id' ")->fetch_assoc();
    $wh = (Float)$wh['damount'];
    $wallet = (Float)$sql['dwallet_balance'];

    $total = $wh + $wallet;
    $promo =$conn->query("SELECT * FROM dpromo")->fetch_assoc();
    $getend = date("Y-m-d", strtotime($promo['end_date']));
    $now = date("Y-m-d");
    if($getend > $now){
        //increase with percentage set
        $percent = ((Float)$promo['dpercentage']/100) * (Float)$wh;
        $final = $percent + $total;
        $sql =$conn->query("UPDATE `members_register` SET dwallet_balance='$final' WHERE userid='$id' ");
        $c = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$dd', dname='Recharge wallet with bonus of $percent', userid='$id', amount='$wh', dcredit='$wh', dwallet_balance='$final', ddate='$date' ");
    }else{
        $sql =$conn->query("UPDATE `members_register` SET dwallet_balance='$total' WHERE userid='$id' ");
        $c = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$dd', dname='Recharge wallet', userid='$id', amount='$wh', dcredit='$wh', dwallet_balance='$total', ddate='$date' ");
    }
    //update user wallet
   
}



if(isset($_POST['noPayFund'])){
    $id = clean($_POST['user']);
    $amount = clean($_POST['amount']);
    $with= clean($_POST['withs']);
    $email = clean($_POST['email']);
    $conn->query("UPDATE `funding_request` SET dstatus='cancelled' WHERE userid='$id' AND req_id='$with'");
    //send sms to user email
    $subject = 'Funding Request';

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <'.$demail.'>' . "\r\n";
    $subject = 'Funding Request';
    $sms = 'Your request of '.$amount.' has been cancelled, we are sorry for the inconveniences '.$dname;
    
    mail($email, $subject, $sms, $header);
    mail($email,$subject, $sms);
    

}



//inbox
if(isset($_POST['Trash'])){
    $id = clean($_POST['id']);
    $conn->query("UPDATE `dmessaging` SET dstatus='delete' WHERE transid='$id'");
}

//staff
if(isset($_POST['BanStaff'])){
    $id = clean($_POST['id']);
    $conn->query("UPDATE `admin_accounts` SET dstatus='ban' WHERE userid='$id'");
}

if(isset($_POST['unBanStaff'])){
    $id = clean($_POST['id']);
    $conn->query("UPDATE `admin_accounts` SET dstatus='active' WHERE userid='$id'");
}


if(isset($_POST['Contact'])){
    $id = clean($_POST['id']);
    $conn->query("UPDATE `dcontact` SET dstatus='read' WHERE id='$id'");
}

if(isset($_POST['ContactD'])){
    $id = clean($_POST['id']);
    $conn->query("DELETE FROM `dcontact` WHERE id='$id'");
}

if(isset($_POST['newsl'])){
    $id = clean($_POST['id']);
    $conn->query("UPDATE `dnewletter` SET dstatus='read' WHERE id='$id'");
}

if(isset($_POST['newsD'])){
    $id = clean($_POST['id']);
    $conn->query("DELETE FROM `dnewletter` WHERE id='$id'");
}

if(isset($_POST['web'])){
    $id = clean($_POST['id']);
    $conn->query("DELETE FROM `dweb_name` WHERE id='$id'");
}


if(isset($_POST['Not'])){
    $order = $conn->real_escape_string($_POST['id']);
    $text = $conn->real_escape_string($_POST['text']);
    $up = $conn->query("UPDATE `notification` SET dstatus='$text' WHERE notid='$order' ");

}