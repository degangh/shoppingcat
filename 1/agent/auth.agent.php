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

	print_r($a);

	if ($a->{"response_code"} == 200)
	{
		//
	}

	echo $r;
}

else {
	header('Content-Type: application/json');
	echo json_encode(array("response_code"=>400));# code...
}
