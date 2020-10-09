<?php
@session_start();
require("config.php");
function clean($value){
    require("config.php");
      $value=trim($value);
      $value=htmlspecialchars($value);
      $value=strip_tags($value);
      $value = $conn->real_escape_string($value);
      return $value;                
  }