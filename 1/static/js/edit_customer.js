$("#save_customer").click(function(event){

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



		$("#loading_placeholder").removeClass("hidden");

		var query_str = "cid=" + cid + "&cname=" + cname + "&cname_init_py=" + cname_init_py + "&id_num=" + id_num + "&mobile=" + mobile + "&address=" + address + "&postcode=" + postcode + "&comment=" + comment;
		$.ajax({type:"POST",
		url: "../agent/cust.edit.agent.php",
		data: query_str,

		success: function(data){
			if (data.response_code == 200)
			{
				alert ("用户保存成功");
				$("#loading_placeholder").addClass("hidden");
				//window.location.replace("cust_list.php");
				$("#genericModal").modal('hide');		
			}
		}
	});

		//console.log(query_str + "oops");
	}
	else {
		//var message = "Information Missing 红色框为必填部分";
		//$('#alertModal').find('.modal-body p').text(message);
		//$('#alertModal').modal('show');
		alert ("Information Missing");
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
