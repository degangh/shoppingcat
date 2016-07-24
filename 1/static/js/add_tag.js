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

	if (flag == true)
	{
		console.log(tag_text);
		console.log(cid);

	}

	else {
		alert ("Incorrect Input");
	}


	event.preventDefault();


})
