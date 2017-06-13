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

$drinks = [
  ["title"=>"Church Road Chardonnay", "venue"=>"Mr. GoodBar", "id"=>1, "vol"=>140, "unit"=>"Glasses", "price" => "33", "size" => 5],
  ["title"=>"Church Road Piont Gris", "venue"=>"Clovercrest Hotel", "id"=>2, "vol"=>140, "unit"=>"Glasses", "price" => "22" , "size" => 3],
  ["title"=>"Cooper Sparkling Ale Bottle", "venue"=>"Hilton Adelaide", "id"=>3, "vol"=>375, "unit"=>"Glasses", "price" => "38", "size" => 3],
  ["title"=>"Absolute Vodka", "venue"=>"King's Head", "id"=>4, "vol"=>30, "unit"=>"Glasses", "price" => "25" , "size" => 5],
  ["title"=>"Bowmore Islay Single Malt Scotch Whisky Aged 18 Years", "venue"=>"King's Head", "id"=>5, "vol"=>30, "unit"=>"Glasses", "price" => "25", "size" => 3],
  ["title"=>"Little Creatures Rogers Beer", "venue"=>"Mr. GoodBar", "id"=>6, "vol"=>330, "unit"=>"bottle", "price" => "18", "size" => 5]
];

echo json_encode($drinks);
