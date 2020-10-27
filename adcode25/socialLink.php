<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {
        $SocialLinkUpdate = $HT->SocialLinkUpdate($_POST);
    }
 ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Add Socila Link</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Add Social Link</li>
                        </ul>
                    </div>
                </div>
            </div>
<?php 
	$getData = $HT->SelectAllSocilaLink();
	if ($getData) {
		while ($result = $getData->fetch_assoc()) {
 ?>
			<div class="content_box_single">
<?php 
if (isset($SocialLinkUpdate)) {
	echo $SocialLinkUpdate;
	} 
?>
				<form action="" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="tw">Icon</label>
				    <input type="text" class="form-control" name="icon" data-role="tagsinput" value="<?php echo $result['icon'] ?>">
				  </div>
				  <div class="form-group">
				    <label for="li">Link</label>
				    <input type="text" class="form-control" data-role="tagsinput" name="link"value="<?php echo $result['link'] ?>">
				  </div>	
				  <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Update</button>
				</form>
			</div>
<?php }} ?>
		</div>
	</div>


<?php include'inc/footer.php' ?>