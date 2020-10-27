<?php include 'inc/header.php' ?>
	<!-- BANNER -->
	<div class="section banner-page" data-background="images/banner-single.jpg">
		<div class="content-wrap pos-relative">
			<div class="container">
				<div class="col-12 col-md-12">
					<div class="d-flex bd-highlight mb-2">
						<div class="title-page">Project</div>
					</div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb ">
					    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Project</li>
					  </ol>
					</nav>
				</div>
			</div>
			
		</div>
	</div>

    <!-- CONTENT -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">

						<nav class="navfilter">
							<ul class="portfolio_filter">
								<li><a href="#" class="active" data-filter="*">All</a></li>
<?php 
    $getSerCat = $cat->selectAllSerCat();
    if ($getSerCat) {
        while ($result = $getSerCat->fetch_assoc()) { 
 ?>
								<li><a href="#" data-filter=".P<?php echo $result['id'] ?>"><?php echo $result['catName'] ?> </a></li>
<?php }} ?>
							</ul>
						</nav>

					</div>
				</div>
				<div class="row gutter-5 grid-v1">
					<div class="grid-sizer-v1"></div>
					<div class="gutter-sizer-v1"></div>
<?php 
    $selectAllPro = $Pro->selectAllPro();
    if ($selectAllPro) {
        while ($result = $selectAllPro->fetch_assoc()) { 
 ?>
					<div class="col-sm-6 col-md-4 grid-item-v1 P<?php echo $result['catId'] ?> manufacturing gas">
						<div class="box-image-5 shadow">
							
							<?php if(!empty($result['imageTwo'])){ ?>
						<a class="image-popup" href="adcode25/<?php echo $result['imageTwo'] ?>">
							<?php }elseif(!empty($result['link'])){ ?>
						<a href="<?php echo $result['link'] ?>">
							<?php } ?>
								<div class="media">
									<img src="adcode25/<?php echo $result['image'] ?>" alt="" class="img-fluid">
								</div>
								<div class="body">
									<div class="content">
										<h4 class="title"><?php echo $result['title'] ?></h4>
										<span class="category"><?php echo $result['catName'] ?></span>
										<?php if(!empty($result['link'])){ ?>
										<a class="category btn btn-secondary hrefbtnn" href="<?php echo $result['link'] ?>">
											Go Website
										</a>
									<?php } ?>

									</div>
								</div>
							</a>
						</div>
					</div>
<?php }} ?>
				</div>
			</div>
		</div>
	</div>   
<?php include 'inc/footer.php' ?>