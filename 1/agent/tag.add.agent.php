<?
include_once "../config/db.php";
include_once "../class/tag.class.php";
session_start();

header('Content-Type: application/json');

if ($_POST)
{
	if ($_SESSION["username"])
	{
		//echo "";
		$tag = new Tag();
		$r = $tag($_POST['user_id'], $_POST['tag_text']);

		if ($r == TRUE)
		{
			echo json_encode(array("response_code"=>200));
		}
		else {
			echo json_encode(array("response_code"=>-1));# code...
		}
	}

	else {
		echo json_encode(array("response_code"=>401, "result"=>"Error"));# code...
	}
}
else {
	echo json_encode(array("response_code"=>400,"result"=>"Error"));# code...
}
?>
