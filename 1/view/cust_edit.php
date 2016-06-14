<?
session_start();
include_once "../class/customer.class.php";

if ($_SESSION['username'] == "") header ("location:view/login.php");
?>

<html>
<head>
	<title>Edit User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="../static/bs/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<div class='container'>

	<form role="form" id='cust_form'>
	  <div class="form-group col-md-6">
	    <label for="cname">Name 中文姓名:</label>
	    <input type="text" class="form-control required-field" id="cname">
	  </div>
	  <div class="form-group col-md-6">
	    <label for="cname_init_py">Name Initial Pinyin 拼音缩写:</label>
	    <input type="text" class="form-control required-field" id="cname_init_py">
	  </div>

	  <div class="form-group col-md-6">
	    <label for="cname_init_py">ID Number 身份证号码:</label>
	    <input type="text" class="form-control" id="id_num">
	  </div>


	  <div class="form-group col-md-6">
	    <label for="mobile">Mobile 手机号码:</label>
	    <input type="text" class="form-control required-field" id="mobile">
	  </div>
	  <div class="form-group  col-md-12">
	    <label for="address">Address 地址:</label>
	    <input type="text" class="form-control required-field" id="address">
	  </div>
	  <div class="form-group  col-md-12">
	    <label for="postcode">Postcode 邮编:</label>
	    <input type="text" class="form-control" id="postcode">
	  </div>

	  <div class="form-group  col-md-12">
  		<label for="comment">Comment:</label>
  		<textarea class="form-control" rows="3" id="comment"></textarea>
	  </div>
	  <input type="hidden" id="cid" >
	  <div class = "col-md-12">
	  <button type="submit" class="btn btn-default">Save 保存</button>
  	</div>
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
		//var postcode = $("#postcode").val();
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
		/*
		if (postcode == "")
		{
			$("#postcode").closest(".form-group").addClass("has-error");
			flag = false;
		}*/



		event.preventDefault();

		//console.log(flag);

		if (flag == true)
		{
			alert ("will submit");
		}

	});

	$("input.required-field").focusout(function(){
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
