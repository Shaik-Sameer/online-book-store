<?php 
	session_start();
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'bookstoredb');
	// variable declaration
	$booktitle = "";
	$isbn = "";
	$publisher = ""; 
 	$author = ""; 
	$price = ""; 
	$name = ""; 
	$description = "";
	$content_name = ""; 
                 $errors = array();
	// call the add_OLDbook() function if add_newbook button is clicked
	if (isset($_POST['add_oldbook'])) {
		add_oldbook();
	}
	// add new books
	function add_oldbook(){
		global $db,$errors;
		// receive all input values from the form
		$booktitle = e($_POST['booktitle']);
		$isbn = e($_POST['isbn']);
		$publisher = e($_POST['publisher']);
		$author  = e($_POST['author']);
		$price =  e($_POST['price']);
		$description = e($_POST['description']);
		//image selection
		$name = $_FILES['image_file']['name'];
		$target_dir = "upload/".basename($name);
		$imageFileType = strtolower(pathinfo($target_dir,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif");

		$contentimg_file = $_FILES['contentimg_file']['name'];
		$target_dir2 = "upload/".basename($contentimg_file);
		$imageFileType2 = strtolower(pathinfo($target_dir2,PATHINFO_EXTENSION));
		// form validation: ensure that the form is correctly filled
		if (empty($booktitle)) { 
			array_push($errors, "BOOK TITLE is required"); 
		}
		if (empty($isbn)) { 
			array_push($errors, "ISBN NUMBER is required"); 
		}
		if (empty($publisher)) { 
			array_push($errors, "PUBLISHER NAME is required"); 
		}
		if (empty($author)) { 
			array_push($errors, "AUTHOR NAME is required"); 
		}
		if (empty($price)) { 
			array_push($errors, "PRICE is required"); 
		}
		if (empty($description)) { 
			array_push($errors, "ENTER SOME DESCRIPTION ABOUT BOOK"); 
		}
		if (empty($name)) { 
			array_push($errors, "IMAGE is required"); 
		}
		if (empty($contentimg_file)) { 
			array_push($errors, "INDEX PAGE IMAGE is required"); 
		}
		$sql = "SELECT * FROM books WHERE isbn='$isbn'";
		$result = mysqli_query($db,$sql);
		if (mysqli_num_rows($result) > 0) {
			array_push($errors, "DUPLICATE ISBN NUMBER");  
		}
		// add book if there are no errors in the form
		if (count($errors) == 0){
			if( in_array($imageFileType,$extensions_arr) &&  in_array($imageFileType2,$extensions_arr))
{
				$query = "INSERT INTO books(book_title,isbn, publisher,author,price,image_loc,type,description,index_img) VALUE('$booktitle','$isbn','$publisher','$author','$price','$name','old','$description','$contentimg_file')";
				move_uploaded_file($_FILES['image_file']['tmp_name'] , $target_dir);
				move_uploaded_file($_FILES['contentimg_file']['tmp_name'] , $target_dir2);
				mysqli_query($db, $query);
				$_SESSION['success']  = "Book added successfully!!";
				header('location: home.php');
			}

		}
}
function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}
?>