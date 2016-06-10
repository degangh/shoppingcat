<?
include_once "../config/db.php";
include_once "../class/customer.class.php";

$customer = new Customer;

echo $customer->list_customer("hdg","");
