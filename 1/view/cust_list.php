<?
session_start();
include_once "../class/customer.class.php";

if ($_SESSION['username'] == "") header ("location:view/login.php");
?>

<html>
<head>
	<title>User Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="../static/bs/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<div class='container'>
	<form role="form" class="form-inline">
		<div class="form-group">
			<input type='text' name="keyword" placeholder="Search Key">
		</div>
		<div class="form-gourp">
			<button type="button" value="Search" />
		</div>
	</form>

<div>

</div>
</div>

<script src="../static/jquery-2.2.4.min.js"></script>
<script src="../static/bs/js/bootstrap.js"></script>
</body>
</html>
