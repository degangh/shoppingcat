<?
class Tag
{
	public function add_tag($cid, $tag_text)
	{
		$sql = "insert into tag set cid = :cid, tag_text = :tag_text";

		$db = dbConn::dbInit();

		$stmt = $db->pdo->prepare($sql);

		//print_r ($stmt);

		$stmt->bindValue(":cid",$cid,PDO::PARAM_INT);
		$stmt->bindParam(":tag_text",$tag_text,PDO::PARAM_STR);

		$stmt->execute();

		$res = $stmt->errorInfo();

		//print_r ($res);

		if ($res[0] == "00000")
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function list_tag_by_cid($cid)
	{
		$sql = "select * from tag where cid = :cid";

		$db = dbConn::dbInit();

		$stmt = $db->pdo->prepare($sql);

		$stmt->bindValue(":cid", $cid, PDO::PARAM_INT);

		$r = $db->pdo->query($sql);

		return $r->fetchAll(PDO::FETCH_ASSOC);
	}

}
?>
