<?
class adminUser
{

	private $pdo;

	function __construct($pdo)
	{
		$this->$pdo = $pdo
	}

	public function user_login($username,$passowrd)
	{
		$q = "select * from admin where username ='".$username."' and password='".$passowrd."'";
		//echo $q;

		$r = $pdo->query($q);
		//print_r($r);

		if ($r->rowCount() == 1)
		{
			$rt = array("response_code"=>200);
		}
		else {
			$rt = array("response_code"=>404);# code...
		}

		return json_encode($rt);



	}


}

$pdo = new PDO("mysql:host=".SAE_MYSQL_HOST_M.";port=".SAE_MYSQL_PORT.";dbname=".SAE_MYSQL_DB, SAE_MYSQL_USER, SAE_MYSQL_PASS);


$admin = new adminUser($pdo);

$r = $admin->user_login("degang",md5("123456"));

print_r($r);
