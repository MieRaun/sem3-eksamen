<?php
ob_start();
include "db_con.php";
session_unset();
session_destroy();
header("Location: login.php");
?>