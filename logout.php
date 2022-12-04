<?php
include("config.php");
unset($user_id);
unset($admin_id);
session_destroy();
header('location:login.php');
?>