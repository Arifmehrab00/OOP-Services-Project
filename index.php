<?php include 'inc/header.php' ?>

	<!-- BANNER -->
    <div id="home" class="banner">
    	<div class="owl-carousel owl-theme full-screen">
    		<!-- Item 1 -->
	    	<div class="item">
	    		<!-- <div class="overlay-bg"></div> -->
	        	<img src="images/home03.jpg" alt="Slider">
	        	<div class="container d-flex align-items-center h-left">
	            	<div class="wrap-caption">
		                <h1 class="caption-heading text-white">We Are<span> Provide Web And Graphic Services</span></h1>
		                <p class="uk18 text-white">We are team of professional web & Graphic service with over 8+ years of experience on the market! we have  400+ satisfy clint all over the world! we provide Qualityful service.

		                </p>
		                <a href="https://www.codingsolve.com/services.php?serviceByCat=Wordpress" class="btn btn-primary text-white">Service Detail</a> 
		                <a href="https://www.codingsolve.com/project.php" class="btn btn-secondary">Experience</a>
		            </div>   
	            </div>
	    	</div>
	    		<!-- Item 2 -->
	    	<div class="item">
	    		<div class="overlay-bg"></div>
	            <img src="images/slider02.jpg" alt="Slider">
	            <div class="container d-flex align-items-center h-center">
	            	<div class="wrap-caption">
		               <h1 class="caption-heading text-white"> OUR 8+  <span> Services Experience!</span></h1>
		                <p class="uk18 text-white">We've worked with Word's Top 5 Web Company Unified Infotech/ELEKS/Hidden Brains Infotech/Iflexion/ Cyber Infrastructure Inc etc..</p>
		                <a href="https://www.codingsolve.com/services.php?serviceByCat=Wordpress" class="btn btn-primary text-white">Our Services</a> 
		                <a href="https://www.codingsolve.com/project.php" class="btn btn-secondary">Our All Project</a>
		            </div>  
	            </div>
	        </div> 
	    		<!-- Item 3 -->
	    	<div class="item">
	    		<!-- <div class="overlay-bg"></div> -->
	        	<img src="images/slider02.jpeg" alt="Slider">
	        	<div class="container d-flex align-items-center h-left">
	            	<div class="wrap-caption">
		                <h1 class="caption-heading text-white">We Are<span> provide This type of services!
</span></h1>
		                <p class="uk18 text-white">GraphicDesign/ WebSiteDesign/ WebDevelopment/ Wordpresss CMS/ Ecommerce/ website maintenance
</p>
		                <a href="https://www.codingsolve.com/services.php?serviceByCat=Wordpress" class="btn btn-primary text-white">Service Detail</a> 
		                <a href="https://www.codingsolve.com/project.php" class="btn btn-secondary">Experience</a>
		            </div>   
	            </div>
	    	</div>
	    
    	</div>
	    <div class="custom-nav owl-nav"></div>
    </div>	

    <!-- SERVICES -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading text-primary no-after mb-5">
							SERVICES
						</h2>
						<p class="subheading">We provide high standard clean web & Graphic Service for your business</p>
					</div>
				</div>
				
				<div class="row mt-5">
<?php 
    $getdata = $ser->selectAllSerCat();
    if ($getdata) {
        while ($resultSer = $getdata->fetch_assoc()) { 
 ?>
					<!-- Item 1 -->
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="feature-box-7 shadow">
							<div class="media-box">
								<a href="services-detail.php"><img src="adcode25/<?php echo $resultSer['image'] ?>" alt="<?php echo $resultSer['catName'] ?>" class="img-fluid"></a>
							</div>
							<div class="body">
								<div class="info-box">
									<div class="text">
										<div class="title"><?php echo $resultSer['catName'] ?></div>
										<p><?php echo $resultSer['des'] ?></p>
										<a href="services.php?serviceByCat=<?php echo $resultSer['catName'] ?>&serviceByCatID=<?php echo $resultSer['id'] ?>" title="Get Detail">Get Detail</a>
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

   

	<!-- PROJECT -->
	<div class="section bg-primary">
		<div class="content-wrap">
			<div class="container">
				
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading mt-3 mb-4 text-white">
							RECENT WORKS
						</h2>
						<p class="subheading mb-4 text-white">The best of the best for everyone</p>
					</div>
				</div>

			</div>

			<div class="container-fluid">
				<div class="row mt-5 zero-row">
					
					<div class="col-sm-12 col-md-12">
						<div id="carousel-project" class="owl-carousel owl-theme owl-light">
				    
<?php 
    $selectAllProLM = $Pro->selectAllProLimit();
    if ($selectAllProLM) {
    	$i = 0;
        while ($result = $selectAllProLM->fetch_assoc()) { 
        $i++;
 ?>
 		<!-- Item <?php echo $i ?> -->
					    	<div class="item">
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

		</div>
	</div>

	<!-- OUR TESTIMONIALS -->
	<div class="section bgi-cover-center" data-background="images/testmonial-back.png">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading mb-5">
							TESTIMONIALS
						</h2>
						<p class="subheading mb-5">Every case is very important to us and we always take care of them seriously.</p>
					</div>
				</div>
				<div class="row">
					
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div id="carousel3" class="owl-carousel owl-theme">
<?php 
	$getCat = $tes->selectAllClient();
	if ($getCat) {
		while ($result = $getCat->fetch_assoc()) {
 ?>
							<!-- Item 1 -->
							<div class="item">
								<div class="rs-box-testimony">
									
									<div class="media-box">
										<img src="adcode25/<?php echo $result['image'] ?>" alt="" class="rounded-circle">
									</div>
									<div class="quote-box">
										<blockquote class="quote">
										<?php echo $result['cliSay'] ?>
										</blockquote>
										<div class="quote-name">
											<?php echo $result['cliName'] ?> <span><?php echo $result['cliTitle'] ?></span>
										</div> 
									</div>

								</div>
							</div>
<?php }} ?>


						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- FACT -->
	<div class="section bgi-cover-center bg-overlay-primary" data-background="images/home04.jpg">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					
					<div class="col-sm-3 col-md-3">
						<div class="box-stat">
							<div class="icon">
								<div class="fa fa-users"></div>
							</div>
							<h2 class="counter">250+</h2>
							<p>Passionate Employee</p>
						</div>
					</div>

					<div class="col-sm-3 col-md-3">
						<div class="box-stat">
							<div class="icon">
								<div class="fa fa-users"></div>
							</div>
							<h2 class="counter">16+</h2>
							<p>Offices Worldwide</p>
						</div>
					</div>

					<div class="col-sm-3 col-md-3">
						<div class="box-stat">
							<div class="icon">
								<div class="fa fa-building-o"></div>
							</div>
							<h2 class="counter">10+</h2>
							<p>Years Experience</p>
						</div>
					</div>

					<div class="col-sm-3 col-md-3">
						<div class="box-stat">
							<div class="icon">
								<div class="fa fa-briefcase"></div>
							</div>
							<h2 class="counter">833+</h2>
							<p>PROJECTS</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>	
	
	<!-- end project -->

	<!-- OUR PARTNERS -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				
				<div class="row gutter-5">
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="images/client1.png" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="images/client2.png" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="images/client3.png" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="images/client4.png" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="images/client5.png" alt="" class="img-fluid img-border"></a>
					</div>
					<div class="col-6 col-md-4 col-lg-2">
						<a href="#"><img src="images/client6.png" alt="" class="img-fluid img-border"></a>
					</div>

				</div>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php' ?>