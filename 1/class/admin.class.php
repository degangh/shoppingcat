<?
class adminUser
{
	public function user_login($username,$passowrd)
	{
		$q = "select * from admin where username ='".$username."' and passowrd='".$passowrd."'";

		$pdo = new PDO("mysql:host=".SAE_MYSQL_HOST_M.";port=".SAE_MYSQL_PORT.";dbname=".SAE_MYSQL_DB, SAE_MYSQL_USER, SAE_MYSQL_PASS);
		$sth = $pdo->prepare($q);
		$sth->execute();



	}


}

$admin = new adminUser;

$r = $admin->user_login("degang",md5("123456"));

print_r($r);
