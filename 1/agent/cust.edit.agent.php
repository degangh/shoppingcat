<?
include_once "../config/db.php";
include_once "../class/customer.class.php";
session_start();

header('Content-Type: application/json');

if($_POST)
{
	if ($_SESSION['username'])
	{
		$customer = new Customer;
		$r = $customer->list_customer($cid,$_POST);

		echo json_encode(array("response_code"=>200,"dataset"=>$r));
	}
	else {
		echo json_encode(array("response_code"=>401));# code...
	}
}
else {
	echo json_encode(array("response_code"=>400));# code...
}
