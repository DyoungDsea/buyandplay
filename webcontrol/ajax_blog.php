<?php
require 'clean.php';
if(isset($_POST['blogDelete'])):
    $id = clean($_POST['id']);
    $g = $conn->query("Delete from `blog` WHERE id='$id' ");
    unlink($_POST['img']);
endif;