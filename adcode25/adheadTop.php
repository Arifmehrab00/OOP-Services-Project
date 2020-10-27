<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {
        $updateTitleSlogan = $HT->titleSloganUpdate($_POST);
    }
 ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Add Head top</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Add Head Top</li>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="content_box_single">
<?php 
    if (isset($updateTitleSlogan)) {
        echo $updateTitleSlogan;
    }
 ?>
<?php
    $getData = $HT->SelectAllTop();
    if ($getData) {
       while ($result = $getData->fetch_assoc()) {
?>

				<form action="" method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="Slogan">Contact Us</label>
				    <input type="text" class="form-control" id="Slogan" name="slogan" value="<?php echo $result['slogan'] ?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo $result['email'] ?>">
				  </div>
				  <div class="form-group">
				    <label for="Phone">Phone</label>
				    <input type="text" class="form-control" id="Phone" name="phone" value="<?php echo $result['phone'] ?>">
				  </div>	
				  <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Update</button>
				</form>
<?php }} ?>
			</div>
		</div>
	</div>


<?php include'inc/footer.php' ?>