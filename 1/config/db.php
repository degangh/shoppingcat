<?php
/* singleton model */

class dbConn
{
	public $pdo;
	private static $instance;

	private function __construct()
	{
		$this->pdo = new PDO("mysql:host=".SAE_MYSQL_HOST_M.";port=".SAE_MYSQL_PORT.";dbname=".SAE_MYSQL_DB, SAE_MYSQL_USER, SAE_MYSQL_PASS);
	}

	public static function dbInit()
	{
		if (!isset(self::$instance))
		{
			$object = __CLASS__;
			self::$instance = new $object;
		}

		return self::$instance;
	}
}
?>
