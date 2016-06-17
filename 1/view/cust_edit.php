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
	  <button type="submit" class="btn btn-default">Save 保存</button> <span id="loading_placeholder" class="hidden"><img src = '../static/img/loading.gif' width="45" height="45" ></span>
  	</div>
	</form>

<div>
	<div id="alertModal" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button class="close" data-dismiss="modal">&times;</button>
	                <h4 class="modal-title">Error 提交错误</h4>
	            </div>
	            <div class="modal-body">
	                <p></p>
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-default" data-dismiss="modal">
	                    Close</button>
	            </div>
	        </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div>
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
		var id_num = $("#id_num").val();
		var comment = $("#comment").val();
		var cid = $("#cid").val();



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

			//alert ("will submit");

			var img = "";

			$("#loading_placeholder").append(img);

			var query_str = "cid=" + cid + "&cname=" + cname + "&cname_init_py=" + cname_init_py + "&id_num=" + id_num + "&mobile=" + mobile + "&address=" + address + "&postcode=" + postcode + "&comment=" + comment;
			$.ajax({type:"POST",
			url: "../agent/cust.edit.agent.php",
			data: query_str,

			success: function(data){
				if (data.response_code == 200)
				{
					alert ("用户保存成功");
					window.location.replace("cust_list.php");
				}
			}
		});

			//console.log(query_str + "oops");
		}
		else {
			var message = "Information Missing 红色框为必填部分";
    		$('#alertModal').find('.modal-body p').text(message);
    		$('#alertModal').modal('show')
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
