<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'bookstoredb');
$status="";
if (isset($_POST['isbn']) && $_POST['isbn']!=""){
$isbn = $_POST['isbn'];
$result = mysqli_query($con,"SELECT * FROM books WHERE isbn='$isbn' AND type='new'");
$row = mysqli_fetch_assoc($result);
$book_title = $row['book_title'];
$isbn = $row['isbn'];
$author = $row['author'];
$publisher = $row['publisher'];
$price = $row['price'];
$image = $row['image_loc'];
$image_loc = "upload/".$image;

$cartArray = array(
	$isbn=>array(
	'book_title'=>$book_title,
	'isbn'=>$isbn,
	'author'=>$author,
	'publisher'=>$publisher,
	'price'=>$price,
	'quantity'=>1,
	'image_loc'=>$image_loc)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($isbn,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
if (isset($_POST['img']) && $_POST['img']!=""){
$isbn = $_POST['img'];
$_SESSION["image_details"] = $isbn;
header('location: index.php');
}
?>
<html>
<head>
<link rel='stylesheet' href='style2.css' type='text/css' media='all' />
</head>
<body>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<?php
$i=1;
$sql = "SELECT * FROM books" ;
$result = mysqli_query( $con , $sql ) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
		if($i%4==0)
		{
		echo " <div class='row'> ";
		}
		echo " <div class='product_wrapper'>
		 	<form method='post' action=''>
			<div class='image'><button type='submit' name='img' value=".$row['isbn']."><img src='upload/".$row['image_loc']."' width=200px hieght=250px></button></div>
			</form> 
			<form method='post' action=''>  
			<input type='hidden' name='isbn' value=".$row['isbn'].">
			<div class='name'>".$row['book_title']."</div>
			<div class='name'>".$row['author']."</div>
			<div class='name'>".$row['publisher']."</div>
		   	  <div class='price'>RS-".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
		</form>
		   	  </div> 
			</div>";
		$i++;
}
		
mysqli_close($con);
?>
</body>
</html>