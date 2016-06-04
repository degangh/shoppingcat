<?php
/*
$dbc = mysql_connect("localhost", "n1503z1k4n", "h54jzlmzmzy1x33l1kz5iwkk3xj53z345jl4im30");

if (!$dbc)  die('Could not connect DB: ' . mysql_error());

mysql_query("SET NAMES UTF8");

$db_selected = mysql_select_db("app_shoppingcat", $dbc);

*/

$pdo = new PDO("mysql:host=".SAE_MYSQL_HOST_M.";port=".SAE_MYSQL_PORT.";dbname=".SAE_MYSQL_DB, SAE_MYSQL_USER, SAE_MYSQL_PASS);

?>
