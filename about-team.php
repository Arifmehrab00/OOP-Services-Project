<?php include 'inc/header.php' ?>

	<!-- BANNER -->
	<div class="section banner-page" data-background="images/banner-single.jpg">
		<div class="content-wrap pos-relative">
			<div class="container">
				<div class="col-12 col-md-12">
					<div class="d-flex bd-highlight mb-2">
						<div class="title-page">Our Team</div>
					</div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb ">
					    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Our Team</li>
					  </ol>
					</nav>
				</div>
			</div>
			
		</div>
	</div>

    <!-- SERVICES -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row mt-4">
<?php 
	$getCat = $Tea->selectHomeTeamMem();
	if ($getCat) {
		while ($result = $getCat->fetch_assoc()) {
 ?>
					<!-- Item 1 -->
					<div class="col-12 col-sm-6 col-md-4">
						<div class="rs-team-1 mb-5">
							<div class="media">
								<img src="adcode25/<?php echo $result['image'] ?>" alt="<?php echo $result['memName'] ?>" class="img-fluid">
								<div class="sosmed-icon">
 <?php if (!empty($result['memIcon']) ) { ?>
                                    <?php 
                                    $link = $result['memLink'];
                                    $link = explode(',', $link);

                                    $icon = $result['memIcon'];
                                    $icon = explode(',', $icon);
                                    foreach ($link as $key => $value) {
                    echo '<a href="'.$link[$key].'"><i class="'.$icon[$key].'"></i></a>';
                                    }
                                    ?>
                            



<?php }else{echo "Please Insert Social Link";} ?>
									

								</div>
							</div>
							<div class="body">
								<div class="title"><?php echo $result['memName'] ?></div>
								<div class="text-primary"><?php echo $result['memTitle'] ?></div>
							</div>
						</div>
					</div>
<?php }} ?>
				</div>
			</div>
		</div>
	</div>    

<?php include 'inc/footer.php' ?>