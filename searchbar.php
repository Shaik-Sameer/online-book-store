<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'bookstoredb');
$status="";
if (isset($_POST['isbn']) && $_POST['isbn']!=""){
$isbn = $_POST['isbn'];
$result = mysqli_query($con,"SELECT * FROM books WHERE isbn='$isbn'");
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
<body style="background:url(../onlinebookstoreminiproject-2/asoggetti-cfKC0UOZHJo-unsplash.jpg);min-height:380px;background-position:center;background-repeat:no-repeat;background-size:cover;position:relative;">
<!-- Navigation -->
<div class="topnav">
<a  class="active" href="mainpage.php">HOME</a>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
echo "<div class='cart_div'>
<a class='active' href='cart.php'><img src='cart-icon.png' /> Cart<span>$cart_count</span></a>
</div>" ;
}
?>
</div>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<?php
if(isset($_POST['search']))
{
$_SESSION['search'] = $_POST['search'];
}
$search=$_SESSION['search'];
$i=1;
$sql = "SELECT * FROM books WHERE book_title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%' OR publisher LIKE '%" . $search . "%'";
$result = mysqli_query( $con , $sql ) or die(mysqli_error($con));
if(mysqli_num_rows($result)>0)
{
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
}
else{
echo"<h3>RELATED BOOKS NOT FOUND IN STORE!!!!</h3>
<h4>WE WILL BRING THE RELATED BOOKS SOON IN THE STORE.</h4>";
}		
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</div>
</body>
</html>