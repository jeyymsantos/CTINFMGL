<?php
    $x = $_POST['head_loc'];
    if($x == "FB"){
        header("Location:https://www.facebook.com");
    } elseif ($x == "G") {
        header("Location:https://www.google.com");
    } elseif ($x == "IG") {
        header("Location:https://www.instagram.com");
    } elseif ($x == "LP") {
        header("Location:localpage.html");
    }
    exit;