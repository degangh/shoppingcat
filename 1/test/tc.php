<?
include_once "../config/db.php";
include_once "../class/customer.class.php";

$customer = new Customer;

//echo $customer->list_customer("hdg","");

$post=array("cname"=>"耿玥","cname_init_py"=>"gy","mobile"=>"13436982179");

print_r($customer->update_customer_by_id($cid,$post));
