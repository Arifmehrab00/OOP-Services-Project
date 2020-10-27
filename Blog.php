<?php include 'inc/header.php' ?>

	<!-- BANNER -->
	<div class="section banner-page" data-background="images/banner-single.jpg">
		<div class="content-wrap pos-relative">
			<div class="container">
				<div class="col-12 col-md-12">
					<div class="d-flex bd-highlight mb-2">
						<div class="title-page">Blog</div>
					</div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb ">
					    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Blog</li>
					  </ol>
					</nav>
				</div>
			</div>
			
		</div>
	</div>
<?php 
	$per_page = 6;
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	} else {
		$page = 1;
	}
	$Start_from = ($page-1) * $per_page;

 ?>
    <!-- CONTENT -->
	<div id="class" class="">
		<div class="content-wrap">
			<div class="container">
				
				<div class="row">
<?php 
 $getPost = $post->SelectAllPostByPagination($Start_from, $per_page);
 if ($getPost) {
 	$i = 0;
 	while ($result = $getPost->fetch_assoc()) {
 	$i++
 ?>
					<!-- Item 1 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="rs-news-1 mb-5">
							<div class="media">
								<a href="news-single.php?SingleBlog=<?php echo $result['title']; ?>&BID=<?php echo $result['id'] ?>">
									<img src="adcode25/<?php echo $result['image'] ?>" alt="Blog Image <?php echo $result['title'] ?>" class="img-fluid">
								</a>
							</div>
							<div class="body">
								<div class="title"><a href="news-single.php?SingleBlog=<?php echo $result['title']; ?>&BID=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></div>
								<div class="meta-date"><?php echo $fm->formatDate4th($result['date']) ?></div>
								<p><?php echo $fm->textShorten($result['body'], 100) ?></p>
							</div>
						</div>
					</div>
<?php }?>
				</div>
				<div class="row mt-5">
					<div class="col-sm-12 col-md-12">
<?php 
$query = "SELECT * FROM tbl_post";
$result = $db->select($query);
$total_rows = mysqli_num_rows($result);
$total_pages = ceil($total_rows/$per_page);
 ?>
						<nav aria-label="Page navigation">
						  <ul class="pagination">
						  	<?php if ($page > 1) { ?>
						    <li class="page-item"><a class="page-link" href="Blog.php?page=<?php echo $page-1 ?>">Previous</a></li>
							<?php }else{ ?>
							<li class="page-item"><a class="page-link" style="opacity: 0.5;" href="#">Previous</a></li>
							<?php } ?>
<?php for ($i=1; $i <= $total_pages; $i++) {  ?>
						    <li class="page-item <?php if($i == $page){echo 'active';} ?>"><a class="page-link" href="Blog.php?page=<?php echo $i ?>"><?php echo $i; ?></a></li>

<?php } ?>
						    <?php if ($page == $total_pages) { ?>
						    <li class="page-item"><a class="page-link" style="opacity: 0.5;" href="#">Next</a></li>
							<?php }else{ ?>
							<li class="page-item"><a class="page-link" href="Blog.php?page=<?php echo $page+1 ?>">Next</a></li>
							<?php } ?>
						  </ul>
						</nav>
<?php }else{echo "<script>window.location = '404.php'</script>";;}  ?>
					</div>
				</div>

			</div>
		</div>
	</div>   

<?php include 'inc/footer.php' ?>