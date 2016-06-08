<?
class adminUser
{



	public function user_login($username,$password)
	{
		$q = "select * from admin where username ='".$username."' and password=md5('".$password."')";
		//echo $q;

		$db = dbConn::dbInit();

		$r = $db->pdo->query($q);
		//print_r($r);

		if ($r->rowCount() == 1)
		{
			$rt = array("response_code"=>200);
			$_SESSION['username'] = $username;
		}
		else {
			$rt = array("response_code"=>$q);# code...
		}

		return json_encode($rt);



	}


}
