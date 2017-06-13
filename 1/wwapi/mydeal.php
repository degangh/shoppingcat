<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
     header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
     header('Access-Control-Allow-Credentials: true');
     header('Access-Control-Max-Age: 86400');    // cache for 1 day
 }

 // Access-Control headers are received during OPTIONS requests
 if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

     if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
         header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
             header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

 //var_dump($_REQUEST);
             exit(0);
 }


 //http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
 $postdata = file_get_contents("php://input");
// var_dump($_SERVER);

$deals = [
  ["title"=>"Church Road Chardonnay", "venue"=>"Mr. GoodBar", "id"=>1, "num"=>25],
  ["title"=>"Church Road Piont Gris", "venue"=>"Clovercrest Hotel", "id"=>2, "num"=>5],
  ["title"=>"Cooper Sparkling Ale Bottle", "venue"=>"Hilton Adelaide", "id"=>3, "num"=>10],
  ["title"=>"Absolute Vodka", "venue"=>"King's Head", "id"=>4, "num"=>2]
];

echo json_encode($deals);
