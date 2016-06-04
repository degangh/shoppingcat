<?
class dbConn
{
	public $pdo;
	private static $instance

	private function __construct()
	{
		$this->pdo = new PDO("mysql:host=".SAE_MYSQL_HOST_M.";port=".SAE_MYSQL_PORT.";dbname=".SAE_MYSQL_DB, SAE_MYSQL_USER, SAE_MYSQL_PASS);
	}

	public function dbInit()
	{
		if (!isset(self::instance))
		{
			$object = __CLASS__;
			self::instance = new $object;
		}

		return self::instance;
	}
}

class adminUser
{



	public function user_login($username,$passowrd)
	{
		$q = "select * from admin where username ='".$username."' and password='".$passowrd."'";
		//echo $q;

		$pdo = dbConn::dbInit();

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


$admin = new adminUser;

$r = $admin->user_login("degang",md5("123456"));

print_r($r);
