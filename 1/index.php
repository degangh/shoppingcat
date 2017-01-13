<?php
session_start();
include_once "config/db.php";
include_once "class/customer.class.php";

if ($_SESSION['username'] == "") header ("location:view/login.html");
else header ("location:view/cust_list.html");

?>
<html>
<head>
	<title>User Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="static/bs/css/bootstrap.css" rel="stylesheet">
</head>

<body>

<?
echo "<h3>Hello ".$_SESSION['username'].", Shopping Cat CRM</h3>";

?>
<ul>
	<li><a href="view/cust_list.html">Search User</a></li>

</ul>
<script src="static/jquery-2.2.4.min.js"></script>
<script src="static/bs/js/bootstrap.js"></script>
</body>

</html>
