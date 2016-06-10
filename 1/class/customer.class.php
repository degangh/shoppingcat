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
		if (isset($cid))
		{
			$op = "update customer set ";
			$where_clause = "where cid = :cid";
		}

		else {
			$op = "insert into customer set ";
		}

		$data = "cname = :cname, cname_init_py = :cname_init_py, mobile = :mobile, address = :address, postcode = :postcode, id_num = :id_num, comment = :comment";

		$q = $op.$data.$where_clause;

		$db = dbConn::dbInit();

		$stmt = $db->pdo->prepare($q);

		$stmt->bindParam(":cname",$post['cname'],PDO::PARAM_STR);
		$stmt->bindParam(":cname_init_py",$post['cname_init_py'],PDO::PARAM_STR);
		$stmt->bindParam(":mobile",$post['mobile'],PDO::PARAM_STR);
		$stmt->bindParam(":adress",$post['address'],PDO::PARAM_STR);
		$stmt->bindParam(":postcode",$post['postcode'],PDO::PARAM_STR);
		$stmt->bindParam(":id_num",$post['id_num'],PDO::PARAM_STR);
		$stmt->bindParam(":comment",$post['comment'],PDO::PARAM_STR);

		if ($where_class != "")
		{
			$stmt->bindParam(":cid", $cid, PARAM_INT);
		}

		$stmt->execute();

		//TBD


	}

	public function list_customer($keyword, $page)
	{
		$sql = "select * from customer";

		if (trim($keyword) !="")
		{
			$where = " where cname like '%".$keyword."%' or cname_init_py like ''%".$keyword."%'";
		}

		echo $sql.$where;

		$db = dbConn::dbInit();

		$r = $db->pdo->query($sql.$where);

		return json_encode($r->fetchAll(PDO::FETCH_ASSOC));
	}
}
