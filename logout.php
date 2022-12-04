<?php
include("config.php");
session_start();
unset($user_id);
session_destroy();

header('location:login.php');

?>