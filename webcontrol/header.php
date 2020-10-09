<?php
@session_start();
require_once("../config.php");
require_once("function.php");
// require_once("../last_seen.php");

// $_GET['page']=(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
?>
<aside class="sidebar way" >
        	<div class="sidebar-in">
                <!-- Sidebar Header Start -->
                <header>
                    <!-- Logo Start -->
                    <div class="logo" style="margin-top:-15px; margin-left:-20px">
                        <a href="index">
                            <img style="max-width:200px" src="../assets/images/buybets.png" alt="Buy and Bet">
                            </a>
                    </div>
                    <!-- Logo End -->
                    <!-- Toggle Button Start -->
                    <a href="#" class="togglemenu">&nbsp;</a>
                    <!-- Toggle Button End -->
                    <div class="clearfix"></div>
                </header>
                <!-- Sidebar Header End -->
                <!-- Sidebar Navigation Start -->
                <nav class="navigation" >
                    <?php 

                    $post = clean($_SESSION['userid']);
                    $lop = $conn ->query("SELECT * FROM `admin_accounts` WHERE userid='$post'");
                    if($lop->num_rows>0){
                        $rop = $lop->fetch_assoc();
                        //check if is admin or staff
                        if($rop['dposition']=="administrator"){
                            require 'admin.php';
                        }else{
                            require 'staff.php';
                        }
                    }
                    
                     ?>
                    <div class="clearfix"></div>
                </nav>
                <!-- Sidebar Navigation End -->
                <!-- Shadow Start -->
                <span class="shadows"></span>
                <!-- Shadow End -->
            </div>
        </aside>
        <!-- Sidebar End -->
        <!-- Right Section Start -->
        <div class="right-sec">
            <!-- Right Section Header Start -->
            <header>
                <!-- User Section Start -->
                <div class="user hided">
                    <!-- <figure>  </figure> -->
                    <!-- <div class="welcome">
                        <p>Welcome</p>
                        <h5><a href="#">Admin Account</a></h5>
                    </div> -->
                </div>
              <div class="di"></div>
                <nav class="topnav hided" >
                    <ul id="nav1">
                        <li class="tasks">
                                <a href="../index" target="_blank"><i class="glyphicon glyphicon-check"></i>Visit Website</a>                           
                        </li>
                        
                        <li class="settings">
                        	<a href="#"><i class="glyphicon glyphicon-wrench"></i>Settings</a>
                            <div class="popdown popdown-right settings">
                            	<nav>
                                	<a href="change"><i class="glyphicon glyphicon-user"></i>Change Password</a>
                                    
                                </nav>
                            </div>
                        </li>
                        <li><a href="logout" data-toggle="modal" data-target="#logout"><i class="glyphicon glyphicon-log-out"></i>Log out</a></li>
                    </ul>
                </nav>
            <!-- </header> -->


                