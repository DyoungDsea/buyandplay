<?php
// if ($_SERVER["REQUEST_METHOD"] =="POST") {
//     if(isset($_POST['test']) && !empty ( $_POST['test'])){
//      $passw =md5(test_values($_POST["test"])); 
//      echo $passw;
//     }
// }
//     function test_values($data){
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         // $data = empty($data);
//         return $data;
//     }
//     $passw='';


require 'clean.php';

// $now = strtotime(date("Y:m:d","+ 5hours"));
// $add = strtotime(date("Y:m:d"), $now);
// echo $now.' '.$add;


// $('#myModal').modal('show')

// $now = date("Y-m-d H:i:s");
// $new_time = date("Y-m-d H:i:s", strtotime('+5 hours', strtotime($now)));

// echo $now.'<br>  '.$new_time;
// $Date1 = strtotime(date('Y-m-d h:i:sa', strtotime('2020-04-15 15:00:00')));

// $Date2 = strtotime(date('Y-m-d h:i:sa'));
// echo $Date1 . ' '.$Date2.'<br>';
//   if($Date1 < $Date2) {
//         echo 'date is in the past';
//     }else{
//         echo 'date is not past';
//     }


//     $date_before = "2020-05-06 01:08:14"; //add to this date
//   $l = strtotime("+30 day", strtotime($date_before));
//  date("Y-m-d h:i:s", $l);

//     $days = strtotime('90 days');
//     $date = date("Y-m-d h:i:s", $days);


//     // echo $date;

//     $date1 = '04/05/2020';
//     $date2 = '04/06/2020';
//     $days = (strtotime($date2) - strtotime($date1)) / (60 * 60 * 24);
//     // print $days;



$trans = date("ymdhis").rand(10000, 99999);
$now = gmdate("Y-m-d H:i:s");
$date = date('Y-m-d H:i:s',strtotime("+1 hour",strtotime($now)));

$sql = $conn->query("SELECT id, userid FROM members_register WHERE dwallet_balance='500'");
    if($sql->num_rows>0){
        while($row=$sql->fetch_assoc()){
            $id = $row['id'];
            $userid = $row['userid'];
    
           $up = $conn->query("UPDATE members_register SET dwallet_balance='1000'WHERE userid='$userid' AND  id='$id'");
           if($up){
            $text = 'Refund for fail tipster registration';
            $texts = 'Refund for fail tipster registration. Please kindly register again, we sorry for the inconveniences';
            $amount = 500;
            $final= 1000;
            $conn->query("INSERT INTO `dtransaction_history` SET  userid='$userid', dname='$text', transaction_id='$trans', amount='$amount', dcredit='$amount', dwallet_balance='$final', ddate='$date' ");

            $conn->query("INSERT INTO `dmessaging` SET dsender='2147483647', dreceiver='$userid', dmessage='$texts', dtime='$date', transid='$trans'");
           }else{
               echo "No";
           }
        }
    }


            