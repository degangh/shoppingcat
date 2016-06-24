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
		$r = $customer->list_customer($_POST['keyword'],$page);

		echo json_encode(array("response_code"=>200,"result"=>$r));
	}
	else {
		echo json_encode(array("response_code"=>401, "result"=>"Error"));# code...
	}
}
else {
	echo json_encode(array("response_code"=>400,"result"=>"Error"));# code...
}
