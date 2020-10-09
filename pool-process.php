<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("config.php");
require 'clean.php';

$email = clean($_SESSION['email']);

if($_SERVER["REQUEST_METHOD"]=="POST"):
						$bal = clean($_POST['price']);
                        $id = clean($_SESSION['userId']);
                        $name = clean($_POST['name']);
						$dd =  date("ymdhis").rand(10000, 99999);
						$cid = clean($_POST['id']);
						$names = "Tipster Registration($name)";
						
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
								$dz = $conn->query("SELECT dcategory FROM `members_register` WHERE userid='$id' AND dcategory='Tipster'");
								if($dz->num_rows == 0){
									$d = $conn->query("UPDATE `members_register` SET dcategory='Tipster' WHERE userid='$id'");
								}


								$cx = $conn->query("INSERT INTO `dcategory_subscriptions` SET dcategory_id='$dd', userid='$id', dsubscriber_email='$email', dcategory='$name', dgame_cat_id='$cid' ");
								if($cx):
								    
								    //admin credit
									$admin = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='2147483647'");
									if($admin->num_rows>0){
										$fetch=$admin->fetch_assoc();
										$wall = $fetch['dwallet'];
										$new = $wall + (Int)$bal;
										$conn->query("UPDATE `admin_accounts` SET dwallet='$new' WHERE userid='2147483647'");
									}
									
								//insert record into history
								$c = $conn->query("INSERT INTO `dtransaction_history` SET transaction_id='$dd', dname='$names', userid='$id', amount='$bal', ddebit='$bal', dwallet_balance='$amount'  ");
								endif;
								$_SESSION['msgs']= "<p style='font-size:16px; color:white'>Transaction successful</p>";
					
								
								$conn->query("INSERT INTO `dstar_rating` SET dcategory_id='$cid', duser_id = '$id', dtotal= 0 ");
								

								//unset pay reference
								
								//---------------
								header("location: subscription");


							}else{
								$_SESSION['msg']='Wallet balance is too low';
								header("Location:game-categories");
							}
						}
						
					endif;

?> 