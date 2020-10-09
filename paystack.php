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
   echo $user.' '.$payrefrence.' '.$price;
 }

//  $dname = 'Booking code bought';
//                           //check if payment was successfull
//                           $result = array();
//                          //The parameter after verify/ is the transaction reference to be verified
//                          $url = 'https://api.paystack.co/transaction/verify/'.$payrefrence;
                         
//                          $ch = curl_init();
//                          curl_setopt($ch, CURLOPT_URL, $url);
//                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                          curl_setopt(
//                            $ch, CURLOPT_HTTPHEADER, [
//                              'Authorization: Bearer sk_test_f2dcefd5078151f45f2c139507f5d24963edc622']
//                          );
//                          $request = curl_exec($ch);
//                          curl_close($ch);
                         
//                          if ($request) {
//                            $result = json_decode($request, true);
//                          }
//                          $tansid = date("aiYhis");
                         
//                          if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
//                            //top up credit
//                           $x = $conn->query("INSERT INTO `dgame_market` SET transid='$tansid', user_id='$user', dprice='$price', booking_id='$payrefrence' ");
//                           if($x){
//                             $_SESSION['msgs']="<p style='color:white'>Your payment was successful...</p>";
//                             $x = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$tansid', userid='$user', amount='$price', dname='$dname'  ");
//                           }else{
//                             $_SESSION['msg']="<p style='color:white'>Oops!...</p>";
//                           }
//                          }
//                          else{
 
//                              $_SESSION['msg']="<font color=red><br><b>Your payment was not successful... contact support to pay for you or try again later!</b><br></font>";
//                          }

//  //---------------
//  header("location: game_history");
 ?> 