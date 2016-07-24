<?
class Tag()
{
	public function add_tag($user_id, $tag_text)
	{
		$sql = "insert into tag set user_id = :user_id, tag_text = :tag_text";

		$db = dbConn::dbInit();

		$stmt = $db->pdo->prepare($sql);

		//print_r ($stmt);

		$stmt->bindValue(":user_id",$user_id,PDO::PARAM_STR);
		$stmt->bindParam(":tag_text",$tag_text,PDO::PARAM_STR);

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

	public function list_tag_by_userid($user_id)
	{
		$sql = "select * from tag where user_id = :user_id";

		$db = dbConn::dbInit();

		$stmt = $db->pdo->prepare($sql);

		$stmt->bindValue(":user_id");

		$r = $db->pdo->query($sql);

		return $r->fetchAll(PDO::FETCH_ASSOC);
	}

}
?>