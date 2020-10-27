<?php 
    include 'lib/Database.php';
    include 'Helper/Format.php';
    spl_autoload_register(function($classes){
        include_once "classes/".$classes.".php";
    });

    $HT           = new Headtop();
    $post         = new Post();
    $fm           = new Format();
    $db           = new Database();
    $cat          = new Category();
    $ser          = new Service();
    $tes          = new Testimonials();
    $Tea          = new Team();
    $Pro          = new Project();
 ?>

<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
		<title>CodingSolve-Contact US</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<?php 
    $HeadTopLogo = $HT->SelectAllLogo();
    if ($HeadTopLogo) {
        while ($result = $HeadTopLogo->fetch_assoc()) { 
 ?>
    <link rel="shortcut icon" href="<?php echo $result['favicon'] ?>">
<?php }} ?>

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="contactfile/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="contactfile/css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form action="">
					<h3>Contact Us</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
					<label class="form-group">
						<input type="text" class="form-control"  required>
						<span>Your Name</span>
						<span class="border"></span>
					</label>
					<label class="form-group">
						<input type="text" class="form-control"  required>
						<span for="">Your Mail</span>
						<span class="border"></span>
					</label>
					<label class="form-group" >
						<textarea name="" id="" class="form-control" required></textarea>
						<span for="">Your Message</span>
						<span class="border"></span>
					</label>
					<button>Submit 
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>