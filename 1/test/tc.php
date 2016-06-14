<?
include_once "../config/db.php";
include_once "../class/customer.class.php";

$customer = new Customer;

echo $customer->list_customer("hdg","");

$post=array("cnmae"=>"耿玥","cname_init_py"=>"gy","mobile"=>"13436982179");

echo $custome->update_customer_by_id($cid,$post);
