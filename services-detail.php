<?php include 'inc/header.php' ?>
<style type="text/css">
.starcoma {
    color: orange;
    font-size: 19px;
    margin-top: 10px !important;
}
</style>
<?php 
    if (!isset($_GET['SID']) || $_GET['SID'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    }else{
        $id = $_GET['SID'];
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
					    <li class="breadcrumb-item active" aria-current="page">Services Detail</li>
					  </ol>
					</nav>
				</div>
			</div>
			
		</div>
	</div>
<?php 
    $ServiceDetails = $ser->ServiceDetails($id);
    if ($ServiceDetails) {
        while ($result = $ServiceDetails->fetch_assoc()) { 
        	$category = $result['catName'];
        	$weDoQ = $result['weDoQ'];
        	$weDoA = $result['weDoA'];
 ?>
    <!-- CONTENT -->
	<div id="class" class="">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-12 col-sm-12 col-md-4 order-last">

						<div class="widget categories">
							<ul class="category-nav">
								<li class="active"><a href="#">Related Service </a></li>
<?php 
    $getdata = $ser->selectAllSerByCAtLimit($category);
    if ($getdata) {
        while ($resultLi = $getdata->fetch_assoc()) { 
 ?>
								<li><a href="services-detail.php?ServiceDeta=<?php echo $resultLi['title'] ?>&SID=<?php echo $resultLi['id'] ?>"><?php echo $fm->textShorten($resultLi['title'], 80) ?></a></li>
<?php }} ?>
							</ul>
						</div>

						<div class="widget download">

						<!-- Bootstrap model start -->
							<button class="btn btn-secondary btn-block btn-sidebar" data-toggle="modal" data-target="#login"> 
								<span class="fa  fa-file-pdf-o"></span> Order Now
							</button>
							<br>	<br>	<br>	<br>
							<div class="modal" id="login">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Order Now</h4>
											<button  data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
										  <form>
											<div class="form-group">
												<strong>Name</strong>
												<input type="text" class="form-control" placeholder="Enter Your Name">
											</div>		
											<div class="form-group">
												<strong>Email</strong>
												<input type="email" class="form-control" placeholder="Enter Your Email">
											 </div>
										   </form>
										</div>
										<div class="modal-footer">
											<button class="btn btn-info" data-dismiss="modal">Close</button>
											<input type="submit" class="btn btn-info"  name="" value="Order">
										</div>
							
							
								  </div>
							  	</div>
							   </div>
							
						<!-- Bootstrap Model End -->

						</div>

						<div class="widget contact-info-sidebar">
							<div class="widget-title">
								Contact Info
							</div>
<?php 
    $HeadTop = $HT->SelectAllTop();
    if ($HeadTop) {
        while ($resultCO = $HeadTop->fetch_assoc()) { 
 ?>
							<ul class="list-info">
								<li>
									<div class="info-icon">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="info-text"><?php echo $resultCO['slogan'] ?></div> </li>
								<li>
									<div class="info-icon">
										<span class="fa fa-phone"></span>
									</div>
									<div class="info-text"><?php echo $resultCO['phone'] ?></div>
								</li>
								<li>
									<div class="info-icon">
										<span class="fa fa-envelope"></span>
									</div>
									<div class="info-text"><?php echo $resultCO['email'] ?></div>
								</li>
								<li>
									<div class="info-icon">
										<span class="fa fa-clock-o"></span>
									</div>
									<div class="info-text">24/7</div>
								</li>
							</ul>
<?php }} ?>
						</div>

					</div>

					<div class="col-12 col-sm-12 col-md-8">

				    	<div class="owl-carousel owl-theme full-screen">
				    		<!-- Item 1 -->
					    	<div class="item">
					    		<!-- <div class="overlay-bg"></div> -->
					        	<img src="adcode25/<?php echo $result['image'] ?>" alt="Slider">		        	
					    	</div>
					    	<div class="item">
					    		<!-- <div class="overlay-bg"></div> -->
					        	<img src="adcode25/<?php echo $result['imageTwo'] ?>" alt="Slider">        	
					    	</div>
					    	<div class="item">
					    		<!-- <div class="overlay-bg"></div> -->
					        	<img src="adcode25/<?php echo $result['imageThree'] ?>" alt="Slider">	       	
					    	</div>
				    	</div>

						<h3 class="text-primary my-4">
							<?php echo $result['title'] ?>
						</h3>
						<?php echo $result['body'] ?>
						<!-- end single blog -->




						 

 <?php if (!empty($weDoQ) AND !empty($weDoA)) { ?>
						<!-- end author box -->
						<div class="spacer-10"></div>
						<h2 class="section-heading text-primary no-after mb-4">
							What We Do
						</h2>

						<div class="accordion rs-accordion" id="accordionExample">
						   <!-- Item 1 -->

        <?php 
        $Question = $result['weDoQ'];
        $Question = explode(',', $Question);

        $Answer = $result['weDoA'];
        $Answer = explode(',', $Answer);
        $t = 0;
        foreach ($Question as $key => $value) {
        	$t++;
        	if ($t == 2) { 
        		$eq = "true"; 
        		$gh = " show";
        	}else{ $eq = "false"; $gh = "nay"; }

        	if ($t > 1) {
			echo '<div class="card">
						      <div class="card-header" id="headingOne">
						         <h3 class="title">
						            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#A'.$t.'" aria-expanded="'.$eq.'" aria-controls="A'.$t.'">'.$Question[$key].'</button>
						         </h3>
						      </div>
						      <div id="A'.$t.'" class="collapse '.$gh.'" aria-labelledby="headingOne" data-parent="#accordionExample">
						         <div class="card-body">'.$Answer[$key].' 
						         <a href="?delTextQ='.$Question[$key].'&delTextA='.$Answer[$key].'&addWhatWeDo='.$id.'" class="ComaSepa">Delete</a> </div>
						      </div>
						   </div>';
        	}

        }
        ?>

			   
						           
						            
						</div>
<?php } ?>
<br><br><br>
						<!-- end accordion -->
					<div class="comments-box">
						<div class="spacer-10"></div>
						<h2 class="section-heading text-primary no-after mb-4">
<?php 
        $unreadMessage =  $ser->clintSayByID($id);
    if ($unreadMessage) {
        $count = mysqli_num_rows($unreadMessage);
            $countCli = "(".$count.")";
        }else{
            $countCli = "(0) ";
        }
 ?>
							Client Say <span><?php echo $countCli ?></span>
						</h2>
<?php 
    $clintSay = $ser->clintSayByID($id);
    if ($clintSay) {
        while ($resultCli = $clintSay->fetch_assoc()) { 
        	$stars = $resultCli['stars'];
 ?>
							<div class="media comment">
								<img class="mr-3" alt="64x64" src="adcode25/<?php if(!empty($resultCli['image'])){echo $resultCli['image'];}else{echo "upload/ClientSay/Defalut/demo.jpg";} ?>">
								<div class="media-body">
									<h5 class="media-heading mt-0 mb-1"><?php echo $resultCli['cliName'] ?> 
									<small class="date"><?php echo $fm->formatDate4th($resultCli['date']) ?></small>

									<br>
								<span class="starcoma">   
									<?php if ($stars == 1) { ?>
										<i class="fa fa-star" aria-hidden="true"></i>
									<?php }elseif($stars == 2){ ?>
		                                <i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
									<?php }elseif($stars == 3){ ?>
		                                <i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
									<?php }elseif($stars == 4){ ?>
										<i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
									<?php }elseif($stars == 5){ ?>
										<i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
		                                <i class="fa fa-star" aria-hidden="true"></i>
									<?php } ?>
								

                            	</span>
	                                </h5> 
							      <?php echo $resultCli['msg'] ?>
							    </div>
	                        </div>
<?php }} ?>							
						</div>
						<!-- end comment -->
        	</div>				            
						       


<!-- End What we do -->


						</div>
						<!-- end accordion -->

					</div>
<?php }}else{echo "<script>window.location = '404.php'</script>";} ?>
				</div>

			</div>
		</div>
	</div>   


<?php include 'inc/footer.php' ?>