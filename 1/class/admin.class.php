<?
class adminUser
{



	public function user_login($username,$passowrd)
	{
		$q = "select * from admin where username ='".$username."' and password=md5('".$passowrd."')";
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
			$rt = array("response_code"=>404);# code...
		}

		return json_encode($rt);



	}


}

include ("../config/db.php");

$admin = new adminUser;

$r = $admin->user_login("degang",md5("123456"));

print_r($r);
