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
		$r = $customer->update_customer_by_id($_POST['cid'],$_POST);

		//echo json_encode(array("response_code"=>200,"dataset"=>$r));

		if ($r == TRUE)
		{
			echo json_encode(array("response_code"=>200));
		}
		else {
			echo json_encode(array("response_code"=>-1));# code...
		}
	}
	else {
		echo json_encode(array("response_code"=>401));# code...
	}
}
else {
	echo json_encode(array("response_code"=>400));# code...
}
