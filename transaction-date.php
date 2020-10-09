<?php
require 'clean.php';

if(isset($_POST['date'])){
    $start = clean($_POST['start']);
    $end = clean($_POST['end']);
    header("Location:transaction-history?start=$start&end=$end");
}