<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="../static/bs/css/bootstrap.css" rel="stylesheet">
</head>

<body>
	<h3>Login to ShoppingCat CRM</h3>
	<div class="container">
		<form class="form-horizontal" role="form">
  		<div class="form-group">
	    	<label class="control-label col-sm-2" for="username">Username:</label>
	    	<div class="col-sm-10">
	      		<input type="text" class="form-control" id="username" placeholder="Enter User Name">
	    	</div>
  		</div>

		<div class="form-group">
    		<label class="control-label col-sm-2" for="pwd">Password:</label>
    		<div class="col-sm-10">
      			<input type="password" class="form-control" id="pwd" placeholder="Enter password">
    		</div>
  		</div>
  		<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-default" id="login_submit">Submit</button>
    	</div>
  		</div>
		</form>

	</div>
</body>
<script src="../static/jquery-2.2.4.min.js"></script>
<script src="../static/js/bootstrap.js"></script>
<script>
$(document).ready(function(){
	$("#login_submit").click(function(){
		alert ($.getJSON("../agent/auth.agent.php"));

	});
});
</script>
</html>
