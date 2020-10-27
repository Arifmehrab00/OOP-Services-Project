<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateLogo = $HT->LogoUpdated($_FILES);
    }
 ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Add Logo</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Add Logo</li>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="content_box_single">
                
<?php 
	if (isset($updateLogo)) {
		echo $updateLogo;
	}
 ?>

<?php 
	$getData = $HT->SelectAllLogo();
	if ($getData) {
		while ($result = $getData->fetch_assoc()) {
 ?>
                <div class="col-lg-6 col-md-12">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="header">
                            <h2>Code Solve Logo</h2>
                        </div>
                        <div class="body">
                            <input type="file" id="dropify-event" name="logo" data-show-remove="false" data-default-file="<?php echo $result['logo'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="header">
                            <h2>Code Solve Favicon</h2>
                        </div>
                        <div class="body">
                            <input type="file" id="dropify-eventOne" name="favicon" data-show-remove="false" data-default-file="<?php echo $result['favicon'] ?>">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block text-center">Update</button>
                  </form>
                </div>
<?php }} ?>
			</div>
		</div>
	</div>


<?php include'inc/footer.php' ?>