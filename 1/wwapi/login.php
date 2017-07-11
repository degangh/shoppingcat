<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 86400');    // cache for 1 day
}


//http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
$postdata = file_get_contents("php://input");
//var_dump($_SERVER);
if (isset($postdata)) {
	$request = json_decode($postdata);
	

    if ($request->username == 'nicolas' && $request->password == "123456")
    {
        echo json_encode(array("login_success"=>true, "username" => $request->username, "token"=>md5($request->password."server_salt")));
    }
	else {
		echo json_encode(array("login_success" => false, "error" => "Wrong User Name or Password", "message" => $_SERVER['HTTP_ORIGIN']));
	}
}
else {
	echo "Not called properly with username parameter!";
}
?>
