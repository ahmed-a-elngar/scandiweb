<?php

    $main_class = $msg = "";

    if (isset($_SESSION['success'])) {
        $main_class = " alert-success";
        $msg = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    else if (isset($_SESSION['error'])) {
        $main_class = " alert-warning";
        $msg = $_SESSION['error'];
    }
    else{
        $main_class = " hidden";
    }

    echo "<div class='alert text-center my-4 ". $main_class . "' role='alert'> $msg </div>";
