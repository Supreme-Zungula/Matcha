<?php
session_start();
include "../config/login_class.php";


$set_time = new login_set_timestamp($dsn, $user, $password, $_SESSION["logged_in_user"]);
    