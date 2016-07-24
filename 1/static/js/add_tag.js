$("#add_tag_btn").click(function(event){
	$(".form-group").removeClass("has-error");

	var flag = true;

	var tag_text = $("#tag_text").val();
	var cid = $("#cid").val();

	if (tag_text == "")
	{
		$("#tag_text").closest(".form-group").addClass("has-error");
		flag = false;
	}

	event.preventDefault();

	if (flag == true)
	{
		console.log(tag_text);
		console.log(cid);

		var query_str = "cid=" + cid + "&tag_text=" + tag_text;

		$.ajax({type:"POST",
		url: "../agent/add.tag.agent.php",
		data: query_str,

		success: function(data){
			if (data.response_code == 200)
			{
				alert ("Tag Saved");
				//$("#loading_placeholder").addClass("hidden");
				//window.location.replace("cust_list.php");
				$("#genericModal").modal('hide');
				//processSchData();
			}
			else{
				alert(data.response_code);
			}
		}

	});

	else {
		alert ("Incorrect Input");
	}





})
