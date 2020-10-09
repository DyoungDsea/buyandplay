<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("config.php");
require 'clean.php';

$email = clean($_SESSION['email']);

if($_SERVER["REQUEST_METHOD"]=="POST"):
						$bal = clean($_POST['price']);//price
                        $id = clean($_SESSION['userId']);//userid
                        $name = clean($_POST['name']);//days
						$dd = date("ishYi");
                        $cid = clean($_POST['id']);
                        
                        $days = strtotime($name.' days');
                        $starting_date = date("Y-m-d h:i:s");
                        $closing_date = date("Y-m-d h:i:s", $days);
                        
						//check user wallet if wallet balance is == to or greater than before payment
						$play = $conn->query("SELECT dwallet_balance FROM `members_register` WHERE userid='$id'");
						if($play->num_rows>0){
							$pr = $play->fetch_assoc();
							//compare wallet balance with vip payment
							if($pr['dwallet_balance'] >= $bal){

								//deducte the amount from from wallet balance and update wallet balance
								$amount = (Float)($pr['dwallet_balance']) - (Float)$bal;
								$ud = $conn->query("UPDATE `members_register` SET dwallet_balance='$amount' WHERE userid='$id'");
								
							//update user to tipster if payment is success
							//check if user is a tipster already
							$dz = $conn->query("SELECT dvip FROM `members_register` WHERE userid='$id' AND dvip='inactive'");
							if($dz->num_rows == 0){
								$d = $conn->query("UPDATE `members_register` SET dvip='active' WHERE userid='$id'");
							}

                            $dzz = $conn->query("SELECT * FROM  `dvip_account` WHERE duser_id='$id' AND dstatus='active' ");
                            if($dzz->num_rows == 0){
                                //user account is not exist create account
                                //calculate the closing date with the number of days

                                $cx = $conn->query("INSERT INTO `dvip_account` SET dvip_id='$dd', duser_id='$id', dduration='$name', dprice='$bal', dstarting_date='$starting_date', dclosing_date='$closing_date' ");
                                if($cx):
                                    $text = "VIP for ".$name." days";
                               //insert record into history
                               $c = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$dd', dname='$text', userid='$id', amount='$bal', ddebit='$bal', dwallet_balance='$amount' ");
								endif;
								
								$_SESSION['msgs']= "<p style='font-size:16px; color:white'>Transaction successful</p>";
      
                            }else{
                                //account exist update user with user sub price

                                $ds = $dzz->fetch_assoc();
                                $duration = clean($ds['dduration']);
                                $date2 =  clean($ds['dclosing_date']);//increase the closing date
                                
                               	$final_duration = (Float)$duration + (Float)$name;

                                $l = strtotime("+$name days", strtotime($date2));
                                $close = date("Y-m-d h:i:s", $l);
                                //update user account
								$dzz = $conn->query("UPDATE `dvip_account` SET dduration='$final_duration', dprice='$bal', dclosing_date='$close' WHERE duser_id='$id' AND dstatus='active' ");
								
								$_SESSION['msgs']= "<p style='font-size:16px; color:white'>Transaction successful</p>";
									
								}


						  //unset pay reference
						unset($_SESSION['name']);
						unset($_SESSION['id']);
						unset($_SESSION['fee']);
						//---------------
						header("location: vip-subscription");
						}
						else{
							$_SESSION['msg']='Wallet balance is too low';
							header("location: vip-subscription");
						}
					}
				endif;
				

?> 