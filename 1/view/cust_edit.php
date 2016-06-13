<?
session_start();
include_once "../class/customer.class.php";

if ($_SESSION['username'] == "") header ("location:view/login.php");
?>

<html>
<head>
	<title>Search User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="../static/bs/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<div class='container'>

	<form role="form">
	  <div class="form-group">
	    <label for="cname">Name:</label>
	    <input type="text" class="form-control" id="cname">
	  </div>
	  <div class="form-group">
	    <label for="address">Address:</label>
	    <input type="text" class="form-control" id="address">
	  </div>
	  <div class="form-group">
	    <label for="cname_init_py">Email address:</label>
	    <input type="text" class="form-control" id="cname_init_py">
	  </div>
	  <div class="form-group">
	    <label for="mobile">Mobile:</label>
	    <input type="text" class="form-control" id="mobile">
	  </div>
	  <div class="form-group">
	    <label for="postcode">Postcode:</label>
	    <input type="text" class="form-control" id="postcode">
	  </div>

	  <button type="submit" class="btn btn-default">Submit</button>
	</form>

<div>

</div>
</div>
