<?php

 session_cache_expire(120);
 ini_set('session.gc_maxlifetime', 7200); 
 @session_start();
 
 include("config.php");
 require 'clean.php';
 
 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = clean($_POST['user']);
    $payrefrence = clean($_POST['id']);
    $price = clean($_POST['price']);
    $url = clean($_POST['url']);
    $modal = clean($_POST['modal']);
    $dname = clean('Tip bought');
    $tansid = date("diYhis");
  //  echo $user.' '.$payrefrence.' '.$price;


  //check user wallet to see if the wallet balance is enough to buy the game
  $s = $conn->query("SELECT dwallet_balance FROM `members_register` WHERE userid='$user' ");
  if($s->num_rows>0){
    //check balance and compare
    $r = $s->fetch_assoc();
    $bal = (Float)$r['dwallet_balance'];
    //game price
    $game_price = (Float)$price;
    if($bal >= $game_price){
      //allow user to buy the game
      //minu the game price from the wallet balance and update wallet balance
      $wallet = $bal - $game_price;
      $update = $conn->query("UPDATE `members_register` SET dwallet_balance='$wallet' WHERE  userid='$user'");
      //insert record to escrow wallet

      //insert record dgame_market where the escrow wallet will be calculate
      $x = $conn->query("INSERT INTO `dgame_market` SET transid='$tansid', user_id='$user', dprice='$price', booking_id='$payrefrence' ");
      if($x){
        $_SESSION['msgs']="<p style='color:white'>Your payment was successful...</p>";
        $x = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$tansid', userid='$user', amount='$price', dname='$dname', ddebit='$price', dwallet_balance='$wallet' ");
        echo "<script>history.back(); </script>";
        $_SESSION['modal']=$modal;
      }else{
        $_SESSION['msg']="<p style='color:white'>Oops! try again later...</p>";
        echo "<script>history.back(); </script>";
      }


      
    }else{
      //don't allow user to buy the game.
      $_SESSION['msg']="<p style='color:white'>Wallet balance is too low!...</p>";
      header("location: all-avaliable-games");
    }

  }else{
    //user account is invalid
      $_SESSION['msg']="<p style='color:white'>Oops! try again later...</p>";
    header("location: all-avaliable-games");
  }

   


 }

 ?> 