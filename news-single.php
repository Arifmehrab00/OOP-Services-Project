<?php include 'inc/header.php' ?>
<style type="text/css">
.catLi {
    border-bottom: 1px solid red;
    padding-left: 2%;
    margin-bottom: 7px;
    padding-bottom: 3px;
}
</style>
<?php 
    if (!isset($_GET['BID']) || $_GET['BID'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    }else{
        $id = $_GET['BID'];
    }
?>

	<!-- BANNER -->
	<div class="section banner-page" data-background="images/banner-single.jpg">
		<div class="content-wrap pos-relative">
			<div class="container">
				<div class="col-12 col-md-12">
					<div class="d-flex bd-highlight mb-2">
						<div class="title-page">Single Blog</div>
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

    <!-- CONTENT -->
	<div id="class" class="">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
<?php 
 $getSinglePost = $post->getSinglePost($id);
 if ($getSinglePost) {
 	while ($result = $getSinglePost->fetch_assoc()) {

 ?>
					<div class="col-sm-12 col-md-12 col-lg-8">

						<div class="single-news">
							<div class="media-box">
								<a href="news-single.php?SingleBlog=<?php echo $result['title']; ?>&BID=<?php echo $result['id'] ?>">
									<img src="adcode25/<?php echo $result['image'] ?>" alt="<?php echo $result['title'] ?>" class="img-fluid">
								</a>
							</div>
							<h2 class="title"><?php echo $result['title'] ?></h2>
							<div class="meta mb-4">
								
								<div class="meta-date d-inline"><i class="fa fa-clock-o"></i> <?php echo $fm->formatDate3rd($result['date']) ?></div> <div class="meta-author d-inline">Posted by <?php echo $result['adName'] ?></div>
							</div>

							<?php echo $result['body'] ?>
						</div>
						<!-- end single blog -->

						<div class="author-box">
							<div class="media">
								<img src="adcode25/<?php echo $result['pic'] ?>" alt="" class="img-fluid">
							</div>
							<div class="body">
	                            <h4 class="media-heading"><span>Author :</span><?php echo $result['name'] ?></h4>
	                          <?php echo $result['Des'] ?>
	                      	</div>
	                      	<div class="clearfix"></div>
						</div>
						<!-- end author box -->

<!-- 						<div class="comments-box">
							<h4 class="title-heading">Comments <span>(3)</span></h4>
							
							<div class="media comment">
								<img class="mr-3" alt="64x64" src="images/testimony-thumb-1.jpg">
								<div class="media-body">
									<h5 class="media-heading mt-0 mb-1">Susi Doel<small class="date">March 24, 2019</small>
	                                </h5> 
							      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
							    </div>
	                        </div>
							<div class="media reply-comment">
								<img class="mr-3" alt="64x64" src="images/testimony-thumb-2.jpg">
								<div class="media-body">
									<h5 class="media-heading mt-0 mb-1">Susi Doel<small class="date">March 24, 2019</small>
	                                </h5> 
							      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
							    </div>
							</div>
							<div class="media comment">
	                            <img class="mr-3" alt="64x64" src="images/testimony-thumb-3.jpg">
								<div class="media-body">
									<h5 class="media-heading mt-0 mb-1">Susi Doel<small class="date">March 24, 2019</small>
	                                </h5> 
							      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
							    </div>
	                        </div>
							
						</div> -->
						<!-- end comment -->

<!-- 						<div class="leave-comment-box">
							<h4 class="title-heading">Leave Comments</h4>
							<form action="#" class="form-comment">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<input type="text" id="name" name="name" value="" class="inputtext form-control" placeholder="Enter Name">
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<input type="text" id="name" name="name" value="" class="inputtext form-control" placeholder="Enter Email">
										</div>
									</div>
									<div class="col-xs-12 col-md-12">
										<div class="form-group">
											<input type="text" id="name" name="name" value="" class="inputtext form-control" placeholder="Enter Website">
										</div>
									</div>
									<div class="col-xs-12 col-md-12">
										<div class="form-group">
											<textarea id="message" name="message" class="inputtext form-control" rows="6" placeholder="Enter Your Message..."></textarea>
										</div>
									</div>
									<div class="col-xs-12 col-md-12">
										<div class="form-group">
											<button id="send" type="submit" class="btn btn-primary">Post Comment</button>
										</div>
									</div>
								</div>
							</form>
					
						</div> -->
						<!-- end leave comment -->

						
					</div>

					<div class="col-sm-12 col-md-12 col-lg-4">
						
						<div class="widget categories">
							<ul class="category-nav">
								<li class="active"><a href="#" title="Landscape Design">Popular Articles</a></li>
<?php 
 $popuLArPo = $post->MostViwePost();
 if ($popuLArPo) {
 	while ($resultMo = $popuLArPo->fetch_assoc()) {

 ?>
								<li><a href="news-single.php?SingleBlog=<?php echo $resultMo['title']; ?>&BID=<?php echo $resultMo['id'] ?>" title="Planting & Removal">
									<?php echo $fm->textShorten($resultMo['title'], 30) ?>
										
									</a>
								</li>
<?php }} ?>
							</ul>
						</div>

						<div class="widget widget-text">
							<div class="widget-title">
								Latest Post
							</div>
<?php 
 $latestPost = $post->getPostLimitBB($id);
 if ($latestPost) {
 	while ($resultLP = $latestPost->fetch_assoc()) {

 ?>
							<div class="latest-post-item">
								<div class="meta-date"><span><?php echo $fm->OnlyDate($resultLP['date'])?></span>
									<?php echo $fm->OnlyMonth($resultLP['date']) ?></div>
								<div class="title"><a href="news-single.php?SingleBlog=<?php echo $resultLP['title']; ?>&BID=<?php echo $resultLP['id'] ?>">
									<?php echo $fm->textShorten($resultLP['title'], 40) ?></a>
								</div>
								<p class="meta-author">Posted by <?php echo $resultLP['name'] ?></p>
							</div>
<?php }} ?>
						</div>

<?php 
    $HeadTop = $HT->SelectAllTop();
    if ($HeadTop) {
        while ($resultCO = $HeadTop->fetch_assoc()) { 
 ?>
						<div class="widget widget-text">
							<div class="widget-title">
								Contact Info
							</div>
							<div class="row mb-3">
								<div class="col-4">Address :</div>
								<div class="col-8"><?php echo $resultCO['slogan'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-4">Phone  :</div>
								<div class="col-8"><?php echo $resultCO['phone'] ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-4">Email :</div>
								<div class="col-8"><?php echo $resultCO['email'] ?></div>
							</div>

						</div>
<?php }} ?>
						<div class="widget widget-text">
							<div class="widget-title">
								Download Brochure
							</div>
							
							<p>Nam efficitur orci quis leo tincidunt, ac lacinia purus aliquet. Nam pellentesque pretium nibh cursus diam dapibus a.</p>
							<a href="#" class="btn btn-primary">Download Now</a>
						</div>

						<div class="widget widget-archive">
							<div class="widget-title">
								Category
							</div>
<?php 
    $catList = $cat->selectAllCat();
    if ($catList) {
        while ($resultCat = $catList->fetch_assoc()) { 
 ?>
							<div class="catLi">
								<?php echo $resultCat['cat_name'] ?>
							</div>
<?php }} ?>
						</div> 

						<div class="widget tags">
							<div class="widget-title">
								Tags
							</div>
							<div class="tagcloud">
									<?php 
									$tags = $result['tag'];
									$tags = explode(',', $tags);
									foreach ($tags as $key => $tag) {
										echo '<a href="#">', $tag, '</a>';
									}
									?>
								
							</div>
						</div>

					</div>
					
				</div>
			</div>
<?php }} ?>
		</div>
	</div>   

<?php include 'inc/footer.php' ?>