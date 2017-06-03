<html>
<head>
	<title>PerpusGue (MVC) mysqli </title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h2><a href="index.php">Perpus Gue (MVC) mysqli </a></h2>
	<div>
		<?
			include("config/db_conf.php");
			include("controller/c_book.php");
			include("model/m_book.php");
			include("view/v_book.php");
			
			$mode = $_GET['mode']; 	// mode: '', add, update, delete
			$id = $_GET['id'];		// get record id for update and delete mode

			// parameter for the sake of pagination
			$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
			$page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
			$links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 8;
			$searchText = ( isset( $_GET['searchText'] ) ) ? $_GET['searchText'] : '';


			if(isset($_POST['id'])){
				c_book::cDML();
			}

			c_book::cSearchBook($mode,$searchText);

			c_book::cViewBook($id,$mode,$page,$searchText);
			
			c_book::cViewAllBooks($limit,$page,$links,$searchText);


			?>

	</div>

</body>
</html>