<?
class adminUser
{
	public function user_login($username,$passowrd)
	{
		$q = "select * from admin where username ='".$username."' and password='".$passowrd."'";
		echo $q;
		$pdo = new PDO("mysql:host=".SAE_MYSQL_HOST_M.";port=".SAE_MYSQL_PORT.";dbname=".SAE_MYSQL_DB, SAE_MYSQL_USER, SAE_MYSQL_PASS);


		$r = $pdo->query($q);
		print_r($r);



	}


}

$admin = new adminUser;

$r = $admin->user_login("degang",md5("123456"));

print_r($r);
