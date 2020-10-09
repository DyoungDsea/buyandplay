<?php
@session_start();
require("../config.php");
require 'all-tips-past.php';
require 'all-pool-past.php';

function clean($value){
    require("../config.php");
      $value=trim($value);
      $value=htmlspecialchars($value);
      $value=strip_tags($value);
      $value = $conn->real_escape_string($value);
      return $value;                
  }

  $idc = clean($_SESSION['userid']);