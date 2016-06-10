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
		return $customer->list_customer($keyword,$page);
	}
	else {
		echo json_encode(array("response_code"=>401));# code...
	}
}
else {
	echo json_encode(array("response_code"=>400));# code...
}
