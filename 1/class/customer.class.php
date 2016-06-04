<?
class Customer
{
	public function get_customer_by_id($cid)
	{
		$sql = "select * from customer where cid = '".$cid."'";

		$db = dbConn::dbInit();

		$r = $db->pdo->query($sql);


	}

	public function update_customer_by_id($cid)
	{
		//
	}

	public function list_customer($keyword, $page)
	{
		//
	}
}

include ("../config/db.php");

$cust_data = new Customer;

$r = $cust_data->get_customer_by_id(1);

print_r ($r);
