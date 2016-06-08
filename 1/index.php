<?php
session_start();
include_once "config/db.php";

if ($_SESSION['username'] != "") echo $_SESSION['username']." login";


echo '<strong>Hello, Shopping Cat！</strong>';
