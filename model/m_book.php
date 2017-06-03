<?

include ("lib/Paginator.class.php");

class m_book{

	function getBook($id){
		$q = "select c_id, c_title, c_author, c_release_year from t_m_books where c_id ='".$id."' ";
		return self::commonExecQuery($q);
	}

	function getAllBook($limit, $page, $links, $searchText){
		$q = "select c_id, c_title, c_author, c_release_year from t_m_books t ";
		$q .= "where c_title like '%$searchText%' or c_author like '%$searchText%' ";
		//return self::commonExecQuery($q);
		return self::commonExecQueryPaging($limit,$page,$links,$q,$searchText);
	}

	function setNewBook($title, $author, $year){
		$q = "insert into t_m_books(c_title, c_author, c_release_year) values('$title','$author','$year')";
		return self::commonExecQuery($q);
	}

	function setUpdateBook($id,$title, $author, $year){
		$q = "update t_m_books set c_title = '$title',  c_author = '$author', c_release_year='$year' where c_id=$id ";
		return self::commonExecQuery($q);
	}

	function setDeleteBook($id){
		$q = "delete from t_m_books where c_id=$id";
		return self::commonExecQuery($q);
	}

	function commonExecQuery($q){
		global $db;
		$result = $db->query($q);

		if(!$result){
			die('query error: '.$db->error);
		}	
		return $result;
	}

	function commonExecQueryPaging($limit,$page,$links,$q,$searchText){
		global $db;

		$Paginator = new Paginator( $db, $q );
		$results = $Paginator->getData( $limit, $page );
		$results->htmlLinks = $Paginator->createLinks( $links, 'pagination pagination-sm', $searchText );

		return $results;
	}

}

?>