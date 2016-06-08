<?
include_once "../class/admin.class.php";

if ($_POST)
{
	$admin_user = new adminUser();

	echo $admin_user->login($_POST['username'],$_POST['password']);
}
/*
else {
	echo json_encode(array("response_code"=>400));# code...
}
*/
