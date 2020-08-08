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
?>
<html>
<head>
<style>
 * {box-sizing: border-box}
      body {
      font-family: Verdana, sans-serif;
      margin:0}
      .mySlides {display: none}
      img {vertical-align: middle;}
      .slideshow-container {
      max-width: 500px;
      position: relative;
      margin: auto;
      }
      /* Next & previous buttons */
      .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
      }
      /* Position the "next button" to the right */
      .next {
      right: 0;
      border-radius: 3px 0 0 3px;
      }
      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
      }
      /* Caption text */
      .text {
      color: #ffffff;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
      }
      /* Number text (1/3 etc) */
      .numbertext {
      color: #ffffff;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
      }
      /* The dots/bullets/indicators */
      .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #999999;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
      }
      .active, .dot:hover {
      background-color: #111111;
      }
      /* Fading animation */
      .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
      }
      @-webkit-keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
      }
      @keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
      }
      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
      .prev, .next,.text {font-size: 11px}
      }
.buybtn {
	text-transform: uppercase;
    	background: #F68B1E;
    	border: 1px solid #F68B1E;
    	cursor: pointer;
   	 color: #fff;
   	 padding: 8px 40px;
    	margin-top: 10px;
   	align-items: center;
	justify-content: center;
}
.buybtn:hover {
	background: #f17e0a;
    	border-color: #f17e0a;
}
</style>
<link rel='stylesheet' href='style2.css' type='text/css' media='all' />
</head>
<body style="background:url(../bookstoredemo/asoggetti-cfKC0UOZHJo-unsplash.jpg);min-height:380px;background-position:center;background-repeat:no-repeat;background-size:cover;position:relative;">
<div>
<!-- Navigation -->
<div class="topnav">
<a  class="active" href="mainpage.php">HOME</a>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
echo "<div class='cart_div'>
<a class='active' href='cart.php'><img src='cart-icon.png' /> Cart<span>$cart_count</span></a>
</div>";
}
?>
</div>
<div style="clear:both;"></div>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<?php
$isbn = $_SESSION["image_details"];
$sql = "SELECT * FROM books WHERE isbn='$isbn'" ;
$result = mysqli_query( $con , $sql ) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);
echo " <div style='width: 33%;margin: 0 auto;padding: 20px;'>
		 	<form method='post' action=''>
			<input type='hidden' name='isbn' value=".$row['isbn'].">
			 <div class='slideshow-container'>
   			   <div class='mySlides fade'>
       			 <div class='numbertext'>1 / 2</div>
			<img src='upload/".$row['image_loc']."' width=483px height=600px> </div>
 			<div class='mySlides fade'>
       			 <div class='numbertext'>2 / 2</div>
			<img src='upload/".$row['index_img']."' width=483px height=600px> </div>
 <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
      <a class='next' onclick='plusSlides(1)'>&#10095;</a>
    </div>
    <br>
    <div style='text-align:center'>
      <span class='dot' onclick='currentSlide(1)'></span> 
      <span class='dot' onclick='currentSlide(2)'></span> 
 </div>
			<p><div style='font-weight:bold;float: left;'>BOOK TITLE:</div>".$row['book_title']."</p>
			<p><div style='font-weight:bold;float: left;'>AUTHOR NAME:</div>".$row['author']."</p>
			<p><div style='font-weight:bold;float: left;'>PUBLISHER:</div>".$row['publisher']."</p>
			<p><div style='font-weight:bold;float: left;'>DESCRIPTION:</div>".$row['description']."</p>
		   	 <p><div style='font-weight:bold;float: left;'>PRICE: </div>RS-".$row['price']."</p>
			  <button type='submit' class='buybtn'>Buy Now</button>
			</form>
</div>";
mysqli_close($con);
?>
<script>
      var slideIndex = 1;
      showSlides(slideIndex);
      
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }
    </script>
</body>
</html>