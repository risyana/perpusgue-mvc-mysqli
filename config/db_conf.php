<?

$db = new mysqli('localhost','root','','perpusgue');

if($db->connect_errno > 0){
	die('Database connection error. '.$db->connect_error);
}


?>
