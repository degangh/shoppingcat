<?
include_once "../config/db.php";
include_once "../class/admin.class.php";
session_start();

if ($_POST)
{
	$admin_user = new adminUser();
	header('Content-Type: application/json');
	$r = $admin_user->user_login($_POST['username'],$_POST['password']);

	$a = json_decode($r);



	if ($a->{"response_code"} == 200)
	{
		//reg session here
		$_SESSION['username'] = $_POST['username'];
		//set cookie httponly
		setcoookie("testcookie",md5("123456"),time()+3600,"/","shoppingcat.applinzi.com",false,true);
	}

	echo $r;
}

else {
	header('Content-Type: application/json');
	echo json_encode(array("response_code"=>400));# code...
}
