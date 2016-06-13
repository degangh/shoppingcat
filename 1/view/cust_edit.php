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

	<form role="form" id='cust_form'>
	  <div class="form-group">
	    <label for="cname">Name:</label>
	    <input type="text" class="form-control" id="cname">
	  </div>
	  <div class="form-group">
	    <label for="cname_init_py">Name Initial Pinyin:</label>
	    <input type="text" class="form-control" id="cname_init_py">
	  </div>


	  <div class="form-group">
	    <label for="mobile">Mobile:</label>
	    <input type="text" class="form-control" id="mobile">
	  </div>
	  <div class="form-group">
	    <label for="address">Address:</label>
	    <input type="text" class="form-control" id="address">
	  </div>
	  <div class="form-group">
	    <label for="postcode">Postcode:</label>
	    <input type="text" class="form-control" id="postcode">
	  </div>

	  <div class="form-group">
  		<label for="comment">Comment:</label>
  		<textarea class="form-control" rows="3" id="comment"></textarea>
	  </div>
	  <input type="hidden" id="cid" >

	  <button type="submit" class="btn btn-default">Submit</button>
	</form>

<div>

</div>
</div>
<script src="../static/jquery-2.2.4.min.js"></script>
<script src="../static/bs/js/bootstrap.js"></script>
<script>
$(document).ready(function () {

$('#cust_form').validate({
    rules: {
        cname: {
            minlength: 2,
            required: true
        },
        cname_init_py: {
            required: true,
            email: true
        },
        address: {
            minlength: 2,
            required: true
        }
    },
    highlight: function (element) {
        $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    success: function (element) {
        element.text('OK!').addClass('valid')
            .closest('.control-group').removeClass('error').addClass('success');
    }
});
});
</script>
