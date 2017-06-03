<?
class v_book{

	function viewAllBooks($result,$page,$searchText){

		echo "<a id='add' class='mybtn' href='index.php?mode=add&page=".$page."' title='Add Book'><img src='img/b_insrow.png'  /> Add </a>";
		echo "<div class='table-row'>";
            echo "<span class='table_med' id='head'>Title</span>";
            echo "<span class='table_med' id='head'>Author</span>";
            echo "<span class='table_med' id='head'>Released </span>";
            echo "<span class='table_small' id='head'> </span>";
   		 echo "</div>";


   		for($i=0; $i < count($result->data); $i++) :
			echo "<div class='table-row'>";
				echo "<span class='table_med'><a href='http://google.com?#q=". $result->data[$i]['c_title'] ." ". $result->data[$i]['c_author']  . " ' target='_blank' >".$result->data[$i]['c_title']."</a></span>";
				echo "<span class='table_med'>".$result->data[$i]['c_author']."</span> ";
				echo "<span class='table_med'>".$result->data[$i]['c_release_year']."</span> ";
				echo "<span class='table_small'>";
					echo "<a class='mybtn' href='index.php?mode=update&page=".$page."&id=".$result->data[$i]['c_id']. '' . $searchText . "' title='Update Book' ><img src='img/b_edit.png' /></a> ";
					echo "<a class='mybtn' href='index.php?mode=delete&page=".$page."&id=".$result->data[$i]['c_id']. '' . $searchText . "' title='Delete Book' ><img src='img/b_drop.png'  /></a> ";
				echo "</span> ";
			echo "</div>";
		endfor;

		echo $result->htmlLinks; // print pagination

/*		while($row = $result->fetch_assoc()){
			echo "<div class='table-row'>";
				echo "<span class='table_med'><a href='http://google.com?#q=". $row['c_title'] ." ". $row['c_author']  . " ' target='_blank' >".$row['c_title']."</a></span>";
				echo "<span class='table_med'>".$row['c_author']."</span> ";
				echo "<span class='table_med'>".$row['c_release_year']."</span> ";
				echo "<span class='table_small'>";
					echo "<a class='btn' href='index.php?mode=update&id=".$row['c_id']."' title='Update Book' ><img src='img/b_edit.png' /></a> ";
					echo "<a class='btn' href='index.php?mode=delete&id=".$row['c_id']."' title='Delete Book' ><img src='img/b_drop.png'  /></a> ";
				echo "</span> ";
			echo "</div>";
		}*/
	}

	function viewBook($value,$viewParam,$mode,$page,$searchText){
		echo "<form  action='index.php?page=".$page.''. $searchText . "' method='POST'>";
			echo "<input style='".$viewParam[0]."' name='id' type='hidden' value='".$value['c_id']."' />";
			echo "<input style='".$viewParam[0]."' name='mode' type='hidden' value='".$mode."' />";
			echo "<input style='".$viewParam[0]."' name='title' type='text' placeholder='Title' value='".$value['c_title']."'  autocomplete='off' required autofocus ".$viewParam[2]." /> ";
			echo "<input style='".$viewParam[0]."' name='author' type='text' placeholder='Author' value='".$value['c_author']."' autocomplete='off' required ".$viewParam[2]." /> ";
			echo "<input style='".$viewParam[0]."' name='year' type='number' placeholder='Year' value='".$value['c_release_year']."'  autocomplete='off' required min=1900 max=3000 ".$viewParam[2]." /> ";
			echo "<input style='".$viewParam[0]."' type='submit' value='".$viewParam[1]."' />";
			echo "<a style='".$viewParam[0]."' href='index.php?page=".$page.''. $searchText . "'><input type='button' value='Cancel' /></a>";
		echo "</form>";

	}

	function searchBook($searchText){
		echo "<form action='index.php' method='GET'>";
			echo "<input placeholder='Search Books' autofocus type='text' name='searchText' value='".$searchText."' />";
			//echo "<input type='submit' value='Search' />";
		echo "</form>";
	}

}

?>