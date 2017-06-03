<?
class c_book{

	function cViewAllBooks($limit,$page,$links,$searchText){
		$result = m_book::getAllBook($limit,$page,$links,$searchText);	

		if($searchText){
			$searchText = "&searchText=".$searchText;
		}	

		v_book::viewAllBooks($result,$page,$searchText);
	}

	function cViewBook($id,$mode,$page,$searchText){
		//$viewParam => (VISIBILITY, SUBMIT_BUTTON, DISABLED)

		$result = m_book::getBook($id);
		$value = $result->fetch_assoc();
		
		if (!$mode){
			$value = array('','','','');
			$viewParam = array('visibility: hidden;', '-', '');
		}else if ($mode=='add'){
			$value = array('','','','');
			$viewParam = array('visibility: visible;', 'Save', '');
		}else if ($mode=='update'){
			$viewParam = array('visibility: visible;', 'Update', '');
		}else if ($mode=='delete'){
			$viewParam = array('visibility: visible;', 'Delete', 'disabled');
		}

		if($searchText){
			$searchText = "&searchText=".$searchText;
		}

		if($mode){
			v_book::viewBook($value,$viewParam,$mode,$page,$searchText);
		}

	}

	function cSearchBook($mode, $searchText){
		if(!$mode){
			v_book::searchBook($searchText);
		}
	}

	function cDML(){
		$id=$_POST['id'];
		$mode=$_POST['mode'];
		$title=$_POST['title'];
		$author=$_POST['author'];
		$year=$_POST['year'];

		if($mode=='add'){
			m_book::setNewBook($title, $author, $year);
		} else if($mode=='update'){
			m_book::setUpdateBook($id,$title, $author, $year);
		} else if($mode=='delete'){
			m_book::setDeleteBook($id);
		}

	}

}

?>