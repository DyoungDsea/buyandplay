<?php

function sea(){
  $number = "";
  for($i=0; $i<5; $i++){
    $min=($i==0)?1:0;
    $number .= mt_rand($min,9);
  }
  return $number;
  }
$code = sea();


function transaction(){
  $number = "";
  for($i=0; $i<15; $i++){
    $min=($i==0)?1:0;
    $number .= mt_rand($min,9);
  }
  return $number;
  }

function formatNaira($data){
  $data = "&#8358;".number_format($data);
  return $data;
}





?>