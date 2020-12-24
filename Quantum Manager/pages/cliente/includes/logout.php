<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: ../../default/index.php");
    exit();