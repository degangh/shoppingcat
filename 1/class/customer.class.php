<?
class Customer
{
	public function get_customer_by_id($cid)
	{
		$sql = "select * from customer where cid = '".$cid."'";

		$db = dbConn::dbInit();
		//$db->pdo->query("set NAMES utf8");

		$r = $db->pdo->query($sql);


		return json_encode($r->fetchAll());


	}

	public function update_customer_by_id($cid)
	{
		//
	}

	public function list_customer($keyword, $page)
	{
		$sql = "select * from customer";

		$db = dbConn::dbInit();

		$r = $db->pdo->query($sql);

		return $r->fetchAll();
	}
}

include ("../config/db.php");

$cust_data = new Customer;

$r = $cust_data->list_customer("",0);

?>
<html xmlns=http://www.w3.org/1999/xhtml><head>                 <meta http-equiv=Content-Type content="text/html;charset=utf-8">

<?

print_r ($r);
