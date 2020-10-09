<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("config.php");
require 'clean.php';

// $email=$_SESSION['email'];


						 //check if payment was successfull
						 $result = array();
						//The parameter after verify/ is the transaction reference to be verified
						$payrefrence = $_SESSION['transId'];
						$url = 'https://api.paystack.co/transaction/verify/'.$payrefrence;
						
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt(
						  $ch, CURLOPT_HTTPHEADER, [
							'Authorization: Bearer sk_live_6d3c12df186f717bf16a2f9df7f463765cf6b163']
						);
						$request = curl_exec($ch);
						curl_close($ch);
						
						if ($request) {
						  $result = json_decode($request, true);						
						}
						$bal = clean($_SESSION['amount']);
                        $id = clean($_SESSION['userId']);
                        $dd = date("ymdhis").rand(10000, 99999);
                        
						if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
                          //Update wallet with the amount user paid
                          //collect the last balance and add to it;
                          $a = $conn->query("SELECT dwallet_balance FROM  `members_register` WHERE userid='$id'");
                          if($a->num_rows>0){
                              $aa = $a->fetch_assoc();
                               $l = $aa['dwallet_balance'];
                               $sum = (Float)$l + (Float)$bal;
							   
							   
							   $promo =$conn->query("SELECT * FROM dpromo")->fetch_assoc();
								$getend = date("Y-m-d", strtotime($promo['end_date']));
								$now = date("Y-m-d");
								if($getend > $now){
									//increase with percentage set
									$percent = ((Float)$promo['dpercentage']/100) * (Float)$bal;
									$final = $percent + $sum;
									$b = $conn->query("UPDATE `members_register` SET dwallet_balance='$final' WHERE userid='$id' ");
									//insert record into history
									$c = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$dd', dname='Recharge wallet with bonus of $percent', userid='$id', amount='$final' ");
								}else{
									$b = $conn->query("UPDATE `members_register` SET dwallet_balance='$sum' WHERE userid='$id' ");
									//insert record into history
									$c = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$dd', dname='Recharge wallet', userid='$id', amount='$bal', dwallet_balance='$final', dcredit='$bal' ");
								}
                          }

                         
						  $_SESSION['msgs']= "<p style='font-size:16px; color:white'>Your payment was successful</p>";
						}
						else{
						  $_SESSION['msg']="Oops! try again";
						}
				
//unset pay reference
unset($_SESSION['transId']);
unset($_SESSION['amount']);
//---------------
header("location: wallet-balance");
?> 