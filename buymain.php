<?php 
	session_start();
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'bookstoredb');
	// variable declaration
	$name = "";
	$address = "";
	$phone_no = ""; 
 	$emailid = ""; 
	$errors = array();
	if (isset($_POST['buy'])) {
		buy();
	}
	function buy(){
		global $db,$errors;
		// receive all input values from the form
		$receipt_no = e($_POST['receipt_no']);
		$name = e($_POST['name']);
		$address = e($_POST['address']);
		$phone_no = $_POST['phone_no'];
		$emailid = e($_POST['emailid']);
		if (empty($name)) { 
			array_push($errors, "NAME is required"); 
		}
		if (empty($address)) { 
			array_push($errors, "ADDRESS is required"); 
		}
		if (empty($phone_no)) { 
			array_push($errors, "PHONE NUMBER is required"); 
		}
		if (empty($emailid)) { 
			array_push($errors, "EMAIL ID is required"); 
		}
		$total_price = 0; 
		foreach ($_SESSION["shopping_cart"] as $product){
			$total_price += ($product["price"]*$product["quantity"]);
		}
		if (count($errors) == 0){
				$_SESSION["receipt_no"] = $receipt_no;
				$query = "INSERT INTO cust_order(recipt_no,name,address,phone_no,emailid,price) VALUE('$receipt_no','$name','$address','$phone_no','$emailid','$total_price')";
				mysqli_query($db, $query);
  				header('location: receipt.php');

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

