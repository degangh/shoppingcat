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
$(document).ready(function(){



	$(".btn-default").click(function(event){

		$(".form-group").removeClass("has-error");
		var flag = true;
		var cname = $("#cname").val();
		var mobile = $("#mobile").val();
		var address = $("#address").val();
		var postcode = $("#postcode").val();
		var cname_init_py = $("#cname_init_py").val();



		if (cname == "")
		{
			$("#cname").closest(".form-group").addClass("has-error");
			flag = false;
		}

		if (address == "")
		{
			$("#address").closest(".form-group").addClass("has-error");
			flag = false;
		}

		if (mobile == "")
		{
			$("#mobile").closest(".form-group").addClass("has-error");
			flag = false;
		}

		if (cname_init_py == "")
		{
			$("#cname_init_py").closest(".form-group").addClass("has-error");
			flag = false;
		}

		if (postcode == "")
		{
			$("#postcode").closest(".form-group").addClass("has-error");
			flag = false;
		}



		event.preventDefault();

		//console.log(flag);

		if (flag == true)
		{
			alert ("will submit");
		}

	});

	$("input").focusout(function(){
		var flag = true;
		if ($(this).val() == "")
		{
			$(this).closest(".form-group").addClass("has-error");
			flag = false;
		}
		else {
			$(this).closest(".form-group").removeClass("has-error");
		}

		//console.log(flag);
	});







});
</script>
