<?php
    $website = $conn->query("SELECT * FROM `dwebsite_main`");
    if($website->num_rows>0){
        $websites = $website->fetch_assoc();
        $dweb_name = $websites['dname'];
        $dweb_address =  $websites['daddress'];
        $dweb_email =  $websites['demail'];
        $dweb_phone =  $websites['dphone'];
    }