<?php include 'inc/header.php' ?>

<?php 
    if (!isset($_GET['serviceByCat']) || $_GET['serviceByCat'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    }else{
        $id = $_GET['serviceByCat'];
    }
 ?>

	<!-- BANNER -->
	<div class="section banner-page" data-background="images/banner-single.jpg">
		<div class="content-wrap pos-relative">
			<div class="container">
				<div class="col-12 col-md-12">
					<div class="d-flex bd-highlight mb-2">
						<div class="title-page">Services</div>
					</div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb ">
					    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><?php echo $id ?></li>
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
				<div class="row">
<?php 
    $getdata = $ser->selectAllSerByCAt($id);
    if ($getdata) {
        while ($result = $getdata->fetch_assoc()) { 
 ?>
					<!-- Item 1 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="feature-box-7 shadow">
							<div class="media-box">
								<a href="services-detail.php?ServiceDeta=<?php echo $result['title'] ?>&SID=<?php echo $result['id'] ?>">
									<img src="adcode25/<?php echo $result['image'] ?>" alt="<?php echo $result['title'] ?>" class="img-fluid">
								</a>
							</div>
							
<?php $decodeffff = strip_tags($result['body']);
?>

							<div class="body">
								<div class="info-box">
									<div class="text">
										<div class="title"><?php echo $result['title'] ?></div>
										<?php echo $fm->textShorten($decodeffff, 100); ?>
										<br><br>
										<a href="services-detail.php?ServiceDeta=<?php echo $result['title'] ?>&SID=<?php echo $result['id'] ?>" class="btn btn-secondary" title="Get Detail">Get Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
<?php }} ?>
				</div>
			</div>
		</div>
	</div>    

<?php include 'inc/footer.php' ?>