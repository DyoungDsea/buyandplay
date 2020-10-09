<?php
require 'clean.php';

$admin_id = clean( $_SESSION['userid']);
$transid = date("ymdhis").rand(10000, 99999);
$now = gmdate("Y-m-d H:i:s");
$date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

//admin
$poo = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$admin_id'");
$po = $poo->fetch_assoc();
$admin_wallet = (Float)$po['dwallet'];




if(isset($_POST['catDelete'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dgame_categories` SET dstatus='inactive' WHERE category_id='$id' ");
    $g = $conn->query("DELETE FROM `dgeneral_booking` WHERE dcat_id='$id' ");

endif;

if(isset($_POST['catDeletep'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dpools` SET dstatus='inactive' WHERE dcategory_ids='$id' ");
    $g = $conn->query("DELETE FROM `dpool_general` WHERE dcat_id='$id' ");

endif;


if(isset($_POST['ApproveTipster'])):
    $id = clean($_POST['id']);
    $user = clean($_POST['user']);
    $cat = clean($_POST['cart_id']);
    $g = $conn->query("UPDATE `dcategory_subscriptions` SET status='active' WHERE dcategory_id='$id' ");
    //create
    $star = $conn->query("SELECT * FROM `dstar_rating` WHERE dcategory_id='$cat' AND duser_id='$user' ");
    if($star->num_rows==0){
        //insert new record
        $num = 0;
        $v = $conn->query("INSERT INTO `dstar_rating` SET dcategory_id='$cat', duser_id = '$user', dtotal='$num' ");
    }

endif;

if(isset($_POST['Suspend'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dcategory_subscriptions` SET status='suspended' WHERE dcategory_id='$id' ");

endif;

if(isset($_POST['Done'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dbooking_code` SET bstatus='Approved' WHERE booking_id='$id' ");

endif;

//pool
if(isset($_POST['DoneP'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dpool_code` SET pstatus='Approved' WHERE pool_id='$id' ");

endif;

if(isset($_POST['rejectP'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dpool_code` SET pstatus='rejected', dresult='rejected' WHERE pool_id='$id' ");

endif;



//game won !pool


if(isset($_POST['Won'])):
    $id = clean($_POST['id']);
    $cat = clean($_POST['cat']);
    $user = clean($_POST['user']);
    //update dbooking_code to won
    $g = $conn->query("UPDATE `dbooking_code` SET dresult='won' WHERE booking_id='$id' ");

    //check those that buy the game and credit there account for game won.
    $gx = $conn->query(" SELECT SUM(dprice) AS dtotal FROM `dgame_market` WHERE booking_id='$id' AND dresult='pending' ");
     $row = $gx->fetch_assoc();
     $total = clean($row['dtotal']);
     //use the booking_id to know the user and credit his/her account and admin account with set percentage
     $do = $conn->query("SELECT * FROM `members_register` INNER JOIN `dbooking_code` ON members_register.userid = dbooking_code.userid WHERE dbooking_code.booking_id ='$id' ");
     $tip = $do->fetch_assoc();
     $tip_userid = $tip['userid'];
     $wall = (Float)$tip['dwallet_balance'];

     $per = $conn->query("SELECT * FROM `dpercentage`");
     $cent = $per->fetch_assoc();
     if($cent['dadmin'] !=0 AND $cent['dusers'] != 0){
        $admin = (Float)$cent['dadmin'] / 100;
        $users = (Float)$cent['dusers'] / 100;
        //calculate user and admin wallet
        $admin_balance = ((Float)$total * $admin) + $admin_wallet;
        $user_balance = ((Float)$total * $users) + $wall;
        $user_balanceh = ((Float)$total * $users);
        }else{
             //calculate user and admin wallet
               $admin_balance = (Float)$total + $admin_wallet;
               $user_balance = (Float)$total + $wall;
               $user_balanceh = (Float)$total;
        }

    //update user and admin wallet
    $conn->query("UPDATE `admin_accounts` SET dwallet='$admin_balance' WHERE userid='$admin_id' ");
    $conn->query("UPDATE `members_register` SET dwallet_balance='$user_balance' WHERE userid='$tip_userid' ");

    $trans = date("ishYs");
    $text = 'Tip won';
    $conn->query("INSERT INTO `dtransaction_history` SET  userid='$tip_userid', dname='$text', transaction_id='$transid', amount='$user_balanceh', dcredit='$user_balanceh', dwallet_balance='$user_balance', ddate='$date'");


    //update dgame_market to won
    $g = $conn->query("UPDATE `dgame_market` SET dresult='won' WHERE booking_id='$id' ");
    //Check if user have star if yes increase by 1 
    $star = $conn->query("SELECT * FROM `dstar_rating` WHERE dcategory_id='$cat' AND duser_id='$user' ");
    if($star->num_rows>0){
        $x = $conn->query("SELECT * FROM dbooking_code WHERE dodd='$cat' AND userid='$user' ORDER BY id DESC LIMIT 10");
        if($x->num_rows > 0){
            //how many is won
            $won = 0;
            while($r=$x->fetch_assoc()){
                if($r['dresult']=='won'){
                    $won += 1;
                }
            }
        }

        //star rating update
        $l = $conn->query("UPDATE `dstar_rating` SET dtotal='$won' WHERE dcategory_id='$cat' AND duser_id = '$user' ");
    }
    //select start and update
     

endif;

if(isset($_POST['Lost'])):
    $id = clean($_POST['id']);
    $cat = clean($_POST['cat']);
    $user = clean($_POST['user']);
    //Check if user have star if yes -1 
    $star = $conn->query("SELECT * FROM `dstar_rating` WHERE dcategory_id='$cat' AND duser_id='$user' ");
    if($star->num_rows==0){
        //insert new record
        $num = 0;
        $v = $conn->query("INSERT INTO `dstar_rating` SET dcategory_id='$cat', duser_id = '$user', dtotal='$num' ");
    }
    //update booking_code for lost game
    $g = $conn->query("UPDATE `dbooking_code` SET dresult='lost' WHERE booking_id='$id' ");


     //check those that buy the game and credit there account for game won.
     $gx = $conn->query(" SELECT * FROM `dgame_market` WHERE booking_id='$id' ");
     while($row = $gx->fetch_assoc()){
     $total = clean($row['dprice']);
     $market_user = clean($row['user_id']);
     //use the booking_id to know the user and credit his/her account and admin account with set percentage
     $do = $conn->query("SELECT * FROM `members_register` WHERE userid='$market_user' ");
     $tip = $do->fetch_assoc();
     $tip_userid = $tip['userid'];
     $wall = (Float)$tip['dwallet_balance'];

     $per = $conn->query("SELECT * FROM `dpercentage_return`");
     $cent = $per->fetch_assoc();
     if($cent['dadmin'] !=0 AND $cent['dusers'] != 0){
        $admin = (Float)$cent['dadmin'] / 100;
        $users = (Float)$cent['dusers'] / 100;
        //calculate user and admin wallet
        $admin_balance = ((Float)$total * $admin) + $admin_wallet;
        $user_balance = ((Float)$total * $users) + $wall;
        $user_balanceh = ((Float)$total * $users);
        }else{
             //calculate user and admin wallet
               $admin_balance = (Float)$total + $admin_wallet;
               $user_balance = (Float)$total + $wall;
               $user_balanceh = (Float)$total;
        }
    //update user and admin wallet
    $conn->query("UPDATE `admin_accounts` SET dwallet='$admin_balance' WHERE userid='$admin_id' ");
    $conn->query("UPDATE `members_register` SET dwallet_balance='$user_balance' WHERE userid='$tip_userid' ");

    
    $trans = date("ishYs");
    $text = 'Refund of Tip lost';
    $conn->query("INSERT INTO `dtransaction_history` SET  userid='$tip_userid', dname='$text', transaction_id='$transid', amount='$user_balanceh', dcredit='$user_balanceh', dwallet_balance='$user_balance', ddate='$date'");

}



    //update dgame_market to lost
    $g = $conn->query("UPDATE `dgame_market` SET dresult='lost' WHERE booking_id='$id' ");
endif;



if(isset($_POST['LostC'])):
    $id = clean($_POST['id']);
    $cat = clean($_POST['cat']);
    $user = clean($_POST['user']);
    //Check if user have star if yes -1 
    $star = $conn->query("SELECT * FROM `dstar_rating` WHERE dcategory_id='$cat' AND duser_id='$user' ");
    if($star->num_rows==0){
        //insert new record
        $num = 0;
        $v = $conn->query("INSERT INTO `dstar_rating` SET dcategory_id='$cat', duser_id = '$user', dtotal='$num' ");
    }
    //update booking_code for lost game
    $g = $conn->query("UPDATE `dbooking_code` SET dresult='cancelled' WHERE booking_id='$id' ");


     //check those that buy the game and credit there account for game cancelled.
     $gx = $conn->query(" SELECT * FROM `dgame_market` WHERE booking_id='$id' ");
     while($row = $gx->fetch_assoc()){
     $total = clean($row['dprice']);
     $market_user = clean($row['user_id']);
     //use the booking_id to know the user and credit his/her account and admin account with set percentage
     $do = $conn->query("SELECT * FROM `members_register` WHERE userid='$market_user' ");
     $tip = $do->fetch_assoc();
     $tip_userid = $tip['userid'];
     $wall = (Float)$tip['dwallet_balance'];

        $user_balance = (Float)$total + $wall;
        $user_balanceh = (Float)$total;
        
    //update user and member wallet
    $conn->query("UPDATE `members_register` SET dwallet_balance='$user_balance' WHERE userid='$tip_userid' ");

    
    $trans = date("ishYs");
    $text = 'Refund of cancelled Tip';
    $conn->query("INSERT INTO `dtransaction_history` SET  userid='$tip_userid', dname='$text', transaction_id='$transid', amount='$user_balanceh', dcredit='$user_balanceh', dwallet_balance='$user_balance', ddate='$date' ");

}


    //update dgame_market to lost
    $g = $conn->query("UPDATE `dgame_market` SET dresult='cancelled' WHERE booking_id='$id' ");
endif;




//game won pool

if(isset($_POST['WonP'])):
    $id = clean($_POST['id']);
    $cat = clean($_POST['cat']);
    $user = clean($_POST['user']);
    //update dbooking_code to won
    $g = $conn->query("UPDATE `dpool_code` SET dresult='won' WHERE pool_id='$id' ");

    //check those that buy the game and credit there account for game won.
    $gx = $conn->query(" SELECT SUM(dprice) AS dtotal FROM `dgame_market` WHERE booking_id='$id' AND dresult='pending' ");
     $row = $gx->fetch_assoc();
     $total = clean($row['dtotal']);
     //use the booking_id to know the user and credit his/her account and admin account with set percentage
     $do = $conn->query("SELECT * FROM `members_register` INNER JOIN `dpool_code` ON members_register.userid = dpool_code.duserid WHERE dpool_code.pool_id ='$id' ");
     $tip = $do->fetch_assoc();
     $tip_userid = $tip['userid'];
     $wall = (Float)$tip['dwallet_balance'];

     $per = $conn->query("SELECT * FROM `dpercentage`");
     $cent = $per->fetch_assoc();
     if($cent['dadmin'] !=0 AND $cent['dusers'] != 0){
     $admin = (Float)$cent['dadmin'] / 100;
     $users = (Float)$cent['dusers'] / 100;
     //calculate user and admin wallet
     $admin_balance = ((Float)$total * $admin) + $admin_wallet;
     $user_balance = ((Float)$total * $users) + $wall;
     $user_balanceh = ((Float)$total * $users);
     }else{
          //calculate user and admin wallet
            $admin_balance = (Float)$total + $admin_wallet;
            $user_balance = (Float)$total + $wall;
            $user_balanceh = (Float)$total;
     }
     
     

    //update user and admin wallet
    $conn->query("UPDATE `admin_accounts` SET dwallet='$admin_balance' WHERE userid='$admin_id' ");
    $conn->query("UPDATE `members_register` SET dwallet_balance='$user_balance' WHERE userid='$tip_userid' ");

    $trans = date("ishYs");
    $text = 'Tip won';
    $conn->query("INSERT INTO `dtransaction_history` SET  userid='$tip_userid', dname='$text', transaction_id='$transid', amount='$user_balanceh', dwallet_balance='$user_balance', dcredit='$user_balanceh', ddate='$date'");


    //update dgame_market to won
    $g = $conn->query("UPDATE `dgame_market` SET dresult='won' WHERE booking_id='$id' ");
    //Check if user have star if yes increase by 1 
    $star = $conn->query("SELECT * FROM `dstar_rating` WHERE dcategory_id='$cat' AND duser_id='$user' ");
    if($star->num_rows>0){
        $x = $conn->query("SELECT * FROM dpool_code WHERE dodd='$cat' AND duserid='$user' ORDER BY id DESC LIMIT 10");
        if($x->num_rows > 0){
            //how many is won
            $won = 0;
            while($r=$x->fetch_assoc()){
                if($r['dresult']=='won'){
                    $won += 1;
                }
            }
        }

        //star rating update
        $l = $conn->query("UPDATE `dstar_rating` SET dtotal='$won' WHERE dcategory_id='$cat' AND duser_id = '$tip_userid' ");
    }
    //select start and update
     

endif;

if(isset($_POST['LostP'])):
    $id = clean($_POST['id']);
    $cat = clean($_POST['cat']);
    $user = clean($_POST['user']);
    //Check if user have star if yes -1 
    $star = $conn->query("SELECT * FROM `dstar_rating` WHERE dcategory_id='$cat' AND duser_id='$user' ");
    if($star->num_rows==0){
        //insert new record
        $num = 0;
        $v = $conn->query("INSERT INTO `dstar_rating` SET dcategory_id='$cat', duser_id = '$user', dtotal='$num' ");
    }
    //update booking_code for lost game
    $g = $conn->query("UPDATE `dpool_code` SET dresult='lost' WHERE pool_id='$id' ");


     //check those that buy the game and credit there account for game won.
     $gx = $conn->query(" SELECT * FROM `dgame_market` WHERE booking_id='$id' ");
     while($row = $gx->fetch_assoc()){
     $total = clean($row['dprice']);
     $market_user = clean($row['user_id']);
     //use the booking_id to know the user and credit his/her account and admin account with set percentage
     $do = $conn->query("SELECT * FROM `members_register` WHERE userid='$market_user' ");
     $tip = $do->fetch_assoc();
     $tip_userid = $tip['userid'];
     $wall = (Float)$tip['dwallet_balance'];

     $per = $conn->query("SELECT * FROM `dpercentage_return`");
     $cent = $per->fetch_assoc();
     if($cent['dadmin'] !=0 AND $cent['dusers'] != 0){
        $admin = (Float)$cent['dadmin'] / 100;
        $users = (Float)$cent['dusers'] / 100;
        //calculate user and admin wallet
        $admin_balance = ((Float)$total * $admin) + $admin_wallet;
        $user_balance = ((Float)$total * $users) + $wall;
        $user_balanceh = ((Float)$total * $users);
        }else{
             //calculate user and admin wallet
               $admin_balance = (Float)$total + $admin_wallet;
               $user_balance = (Float)$total + $wall;
               $user_balanceh = (Float)$total;
        }
    //update user and admin wallet
    $conn->query("UPDATE `admin_accounts` SET dwallet='$admin_balance' WHERE userid='$admin_id' ");
    $conn->query("UPDATE `members_register` SET dwallet_balance='$user_balance' WHERE userid='$tip_userid' ");

    
    $trans = date("ishYs");
    $text = 'Refund for lost Tip';
    $conn->query("INSERT INTO `dtransaction_history` SET  userid='$tip_userid', dname='$text', transaction_id='$transid', amount='$user_balanceh', dwallet_balance='$user_balance', dcredit='$user_balanceh', ddate='$date'");

}



    //update dgame_market to lost
    $g = $conn->query("UPDATE `dgame_market` SET dresult='lost' WHERE booking_id='$id' ");
endif;





//end of pool

if(isset($_POST['reject'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dbooking_code` SET bstatus='rejected', dresult='rejected' WHERE booking_id='$id' ");

endif;

if(isset($_POST['restore'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dbooking_code` SET bstatus='pending', dresult='pending' WHERE booking_id='$id' ");

endif;

if(isset($_POST['restorep'])):
    $id = clean($_POST['id']);
    $g = $conn->query("UPDATE `dpool_code` SET pstatus='pending', dresult='pending' WHERE pool_id='$id' ");

endif;

if(isset($_POST['Dele'])):
    $id = clean($_POST['id']);
    $g = $conn->query("DELETE FROM  `dbooking_code` WHERE booking_id='$id' ");

endif;

if(isset($_POST['Delep'])):
    $id = clean($_POST['id']);
    $g = $conn->query("DELETE FROM  `dpool_code` WHERE pool_id='$id' ");

endif;


// if(isset($_POST['cancelP'])):
//     $id = clean($_POST['id']);
//     $g = $conn->query("UPDATE `dpool_code` SET pstatus='rejected' WHERE pool_id='$id' ");

// endif;

//cancel Pool
if(isset($_POST['cancalP'])):
    $id = clean($_POST['id']);
    $cat = clean($_POST['cat']);
    $user = clean($_POST['user']);
    //Check if user have star if yes -1 
    $star = $conn->query("SELECT * FROM `dstar_rating` WHERE dcategory_id='$cat' AND duser_id='$user' ");
    if($star->num_rows==0){
        //insert new record
        $num = 0;
        $v = $conn->query("INSERT INTO `dstar_rating` SET dcategory_id='$cat', duser_id = '$user', dtotal='$num' ");
    }
    //update booking_code for lost game
    $g = $conn->query("UPDATE `dpool_code` SET pstatus='cancelled' WHERE pool_id='$id' ");


     //check those that buy the game and credit there account for game cancelled.
     $gx = $conn->query(" SELECT * FROM `dgame_market` WHERE booking_id='$id' ");
     while($row = $gx->fetch_assoc()){
     $total = clean($row['dprice']);
     $market_user = clean($row['user_id']);
     //use the booking_id to know the user and credit his/her account and admin account with set percentage
     $do = $conn->query("SELECT * FROM `members_register` WHERE userid='$market_user' ");
     $tip = $do->fetch_assoc();
     $tip_userid = $tip['userid'];
     $wall = (Float)$tip['dwallet_balance'];
        //calculate user 
        $user_balance = (Float)$total + $wall;
        $user_balanceh = (Float)$total;
        
    $conn->query("UPDATE `members_register` SET dwallet_balance='$user_balance' WHERE userid='$tip_userid' ");

    
    $trans = date("ishYs");
    $text = 'Refund of cancelled Tip ';
    $conn->query("INSERT INTO `dtransaction_history` SET  userid='$tip_userid', dname='$text', transaction_id='$transid', amount='$user_balanceh', dwallet_balance='$user_balance', dcredit='$user_balanceh', ddate='$date' ");

}



    //update dgame_market to lost
    $g = $conn->query("UPDATE `dgame_market` SET dresult='cancelled' WHERE booking_id='$id' ");
endif;
