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
			<input type='text' id="keyword" class="form-control" name="keyword" placeholder="Search Key">
		</div>
		<div class="form-group">
			<button type="button" class='btn btn-default' id="btn_search">Search</button>
		</div>
	</form>

<div>
	<table id="sch_table" class="hidden">
	    <tr>
	        <th>City</th>
	        <th>Status</th>
	    </tr>
	</table>
</div>
</div>

<script src="../static/jquery-2.2.4.min.js"></script>
<script src="../static/bs/js/bootstrap.js"></script>
<script>
$(document).ready(function(){
	$("#btn_search").click(function(){
		alert("clicked");
		keyword = $("#keyword").val();

		$.ajax({type:"POST",
		url: "../agent/cust.list.agent.php",
		data: "keyword="+ keyword,
		success: function(data){
			//alert(data);
			var len = data.length;
			var txt = "";

			if (len > 0)
			{
				for (var i=0; i<len; i++)
				{
					txt += "<tr><td>"+data[i].cname + "</td><td>" + data[i].mobile + "</td></tr>";
				}
				if (txt != "")
				{
					$("#sch_table").append(txt).removeClass("hidden");
				}
			}
			else {
				alert ("no result");
			}

		}
		});
	});
});
</script>
</body>
</html>
