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
	<form role="form" class="form-inline">
		<div class="form-group">
			<input type='text' id="keyword" class="form-control" placeholder="Search Key">
		</div>
		<div class="form-group">
			<button type="button" class='btn btn-default' id="btn_search">Search</button>
		</div>
	</form>
<div><a href="cust_edit.php">Add Customer 添加新顾客</a> | <a href="" id="mondalopener">Add Customer (Beta)</a></div>
<div>
	<table id="sch_table" class="hidden table table-striped">
	    <tr>
	        <th>Name</th>
			<th>ID</th>
	        <th>Mobile</th>
			<th>Address</th>
	    </tr>
	</table>
</div>

<div>
	<div id="genericModal" class="modal fade">
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
	//preload form html
	$(".modal-body").load("../static/html/customer_form.html");
	//preload js
	$.getScript("../static/js/edit_customer.js");
	processModal();
	processSchData();

	$("#btn_search").on("click",processSchData);



	$(document).keypress(function(e) {
	    if(e.which == 13) {
	        processSchData();
			e.preventDefault();
	    }

	});

	$('.modal').on('hidden.bs.modal', function(){
    	$(this).find("form").find("input, textarea").val("");
});
});

function processSchData()
{



			//alert("clicked");
			keyword = $("#keyword").val();
			//alert(keyword);

			$.ajax({type:"POST",
			url: "../agent/cust.list.agent.php",
			data: "keyword="+ keyword,
			success: function(data){
				//alert(data);
				var len = data.length;
				var txt = "";
				$("#sch_table tr.data_row").remove();

				if (len > 0)
				{
					for (var i=0; i<len; i++)
					{
						txt += "<tr class='data_row'><td><a href='' class='xx1' data-cid ='" + data[i].cid +"'>"+data[i].cname + "</a></td><td>" + data[i].id_num + "</td><td>" + data[i].mobile + "</td><td>" + data[i].address + " " + data[i].postcode + "</td></tr>";
					}

				}
				else {
					txt  = "<tr class = 'data_row' style='text-align:center'><td colspan=4>No Result <b>\"" + keyword + "\" </b> !</td></tr>";
				}

				if (txt != "")
				{
					$("#sch_table").append(txt).removeClass("hidden");
				}

				$(".xx1").on("click",{cid: $(this).data('cid'), id: "#genericModal", title: "Edit Customer"}, openModal);
			}
			});

}



function processModal()
{
	$("#mondalopener").on("click",{id: "#genericModal", title: "Add Customer"}, openModal);
}

function openModal(event)
{
	//alert ("open");
	alert (event.data.cid);
	$(event.data.id).find(".modal-body").css("overflow-y","auto");

	$(event.data.id).find('.modal-title').text(event.data.title);
	$(event.data.id).modal('show');

	event.preventDefault();
}
</script>
</body>
</html>
