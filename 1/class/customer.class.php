<?
class Customer
{
	public function get_customer_by_id($cid)
	{
		$sql = "select * from customer where cid = '".$cid."'";

		$db = dbConn::dbInit();
		//$db->pdo->query("set NAMES utf8");

		$r = $db->pdo->query($sql);


		return json_encode($r->fetchAll(PDO::FETCH_ASSOC));


	}

	public function update_customer_by_id($cid,$post)
	{

		if ($cid!="")
		{
			$op = "update customer set ";
			$where_clause = " where cid = :cid";
		}

		else {
			$op = "insert into customer set ";
		}

		$data = "cname = :cname, cname_init_py = :cname_init_py, mobile = :mobile, address = :address, postcode = :postcode, id_num = :id_num, comment = :comment";

		$q = $op.$data.$where_clause;

		$db = dbConn::dbInit();

		$stmt = $db->pdo->prepare($q);

		//print_r ($stmt);

		$stmt->bindValue(":cname",$post['cname'],PDO::PARAM_STR);
		$stmt->bindParam(":cname_init_py",$post['cname_init_py'],PDO::PARAM_STR);
		$stmt->bindParam(":mobile",$post['mobile'],PDO::PARAM_STR);
		$stmt->bindParam(":address",$post['address'],PDO::PARAM_STR);
		$stmt->bindParam(":postcode",$post['postcode'],PDO::PARAM_STR);
		$stmt->bindParam(":id_num",$post['id_num'],PDO::PARAM_STR);
		$stmt->bindParam(":comment",$post['comment'],PDO::PARAM_STR);


		if ($where_clause != "")
		{
			//echo $cid."<b>here</b>";
			$stmt->bindParam(":cid", $cid, PDO::PARAM_INT);
		}


		$stmt->execute();

		$res = $stmt->errorInfo();

		if ($res[0]="00000")
		{
			return TRUE;
		}
		else {
			return FALSE;
		}








	}

	public function list_customer($keyword, $page, $page_size = 20)
	{
		if ($page == "") $page = 1;

		$start_record = ( $page - 1 ) * $page_size ;

		$sql = "select * from customer";

		if (trim($keyword) !="")
		{
			$where = " where cname like '%".$keyword."%' or cname_init_py like '%".$keyword."%' ";
		}

		$order = " order by cid desc LIMIT " . $start_reocord .", " . $page_size;

		$db = dbConn::dbInit();

		$r = $db->pdo->query($sql.$where.$order);

		return json_encode($r->fetchAll(PDO::FETCH_ASSOC));
	}
}
