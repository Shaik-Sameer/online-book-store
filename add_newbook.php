<?php include('add_newbooks.php') ?>

<!DOCTYPE html>

<html>

<head>
		
<link rel="stylesheet" type="text/css" href="style.css">
	
<style>
		
.header {
			
background: #003366;
		
}
		
button[name=register_btn] {
			
background: #003366;
		
}
	
</style>

</head>

<body style="background:url(../onlinebookstoreminiproject-2/asoggetti-cfKC0UOZHJo-unsplash.jpg);min-height:380px;background-position:center;background-repeat:no-repeat;background-size:cover;position:relative;">
	
<!-- Navigation -->
<div class="topnav">
<a  class="active" href="home.php">BACK</a>
</div>
<div class="header">
		
<h2>Admin - ADD NEW BOOKS</h2>
	
</div>
	
	
<form method="POST" action="add_newbook.php" enctype="multipart/form-data">

		
<?php echo display_error(); ?>

		
<div class="input-group">
			
<label>BOOK TITLE</label>
			
<input type="text" name="booktitle" value="<?php echo $booktitle; ?>">
		
</div>
		
<div class="input-group">
			
<label>ISBN</label>
			
<input type="text" name="isbn" value="<?php echo $isbn; ?>">
		
</div>
		
<div class="input-group">
			
<label>PUBLISHER</label>
			
<input type="text" name="publisher" value="<?php echo $publisher; ?>">
	
</div>
		
<div class="input-group">
			
<label>AUTHOR</label>
			
<input type="text" name="author" value="<?php echo $author; ?>">
</div>

<div class="input-group">
		
<label>PRICE</label>
			
<input type="text" name="price" value="<?php echo $price; ?>">

</div>
		
</div>

<div class="input-group">
		
<label>CHOOSE IMAGE</label>
			
<input type="file" name="image_file">

</div>
	
<div class="input-group">
		
<label>DESCRIPTION</label>
			
<input type="text" name="description" value="<?php echo $description; ?>">

</div>

<div class="input-group">
		
<label>CHOOSE CONTENT IMAGE</label>
			
<input type="file" name="contentimg_file">

</div>
			
<div class="input-group">
			
<button type="submit" class="btn" name="add_newbook"> ADD BOOK</button>
		
</div>
	
</form>

</body>

</html>