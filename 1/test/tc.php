<?
session_start();
include_once "../config/db.php";
include_once "../class/customer.class.php";

$customer = new Customer;


if ($_SESSION['username'] == "") header ("location:view/login.php");

//echo $customer->list_customer("hdg","");

$post=array("cid"=>104,"cname"=>"耿玥","cname_init_py"=>"gy","mobile"=>"13436982179","address"=>"somewhere","postcode"=>"100000","id_num"=>"110115");

print_r($customer->update_customer_by_id($post['cid'],$post));
