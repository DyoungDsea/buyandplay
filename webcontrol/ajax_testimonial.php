<?php
require 'clean.php';
if(isset($_POST['testDelete'])):
    $id = clean($_POST['id']);
    $g = $conn->query("Delete from `testimonial` WHERE id='$id' ");
    unlink($_POST['img']);
endif;