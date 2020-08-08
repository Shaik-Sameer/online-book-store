<!DOCTYPE html>
<html>
<head>
<style>
footer {
width: 100%;
background-color: #00334d;

}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style2.css">

</head>
<body style="background:url(../onlinebookstoreminiproject-2/asoggetti-cfKC0UOZHJo-unsplash.jpg);min-height:380px;background-position:center;background-repeat:no-repeat;background-size:cover;position:relative;">
<!-- Navigation -->
<div class="topnav">
	<img src="IMG_1584976001886.jpg" width=50px height=47px style="float:left;">
       <a class="active" href="login.php">ADMIN LOGIN</a>
        <a  href="newbooks_display.php">NEW BOOKS</a>
        <a  class="active" href="oldbooks_display.php">OLD BOOKS</a>
       <a  href="cart.php">CART</a>
</div>
<form action="searchbar.php" method="post">
<section>
<div class="wrap">
   <div class="search" aling="center">
      <input type="text" name="search" class="searchTerm" placeholder="search books..." style="font-size:20px;">
      <button type="submit" class="searchButton">search</button>
   </div>
</div>
</section>
</form>
<!-- Slide Show -->
<div aling="center">
<section>
  <img class="mySlides"  src="aliptak_190612_3457_8687.0.JPG"  width=1567px height=500px>
<img class="mySlides"  src="SAVE_20200113_172917.JPG" width=1567px height=500px>
<img  class="mySlides"  src="free-book-library.JPG"  width=1567px height=500px>
<img  class="mySlides"  src="getty_883231284_200013331818843182490_335833.jpg"  width=1567px height=500px>
<img  class="mySlides"  src="daisy-2320519_1920.jpg"  width=1567px height=500px>
</section>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>
<?php 
include 'allbooks_display.php' ; ?>
<div style="text-align:center;">
<footer>
<h3 style="color: #66ccff;font-weight:bold;"><u>CONTACT</u>  <u>INFO</u>:-</h3>  
<p style="font-weight:bold;color: #99ddff;">PHONE NO:- 8008169286</p>
<p style="font-weight:bold;color: #99ddff;">ADDRESS:- CBIT, GANDIPET HYD</p>
<p style="font-weight:bold;color: #99ddff;">EMAIL ID:- SHAIKSAMEERSS111@GMAIL.COM</p>
</footer>
</div>
 </body>
</html>
