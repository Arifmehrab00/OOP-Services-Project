<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>
<style type="text/css">
button.btn.btn-link.collapsed {
    background: #212529;
    color: white;
    text-decoration: none;
    padding: 10px 15px;
}
h3.title button {
    color: white;
    font-weight: bold;
    font-size: 18px !important;
}
h3.title {
    background: #343a40;
    color: white !important;
    margin-top: -20px;
    border-radius: 10px;
}
.btn-link:hover {
    color: wheat !important;
    text-decoration: none !important;
}
.card {
    margin-bottom: 10px !important;
    background: white !important;
}
</style>
<?php 
    if (!isset($_GET['addWhatWeDo']) || $_GET['addWhatWeDo'] == NULL) {
        //echo "<script>window.location = 'SerList.php'</script>";
    }else{
        $id = $_GET['addWhatWeDo'];
    }
 ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $UpdateWhatWe = $ser->UpadateWhatWeDo($_POST, $id);
    }

 ?>
<?php 
    if (isset($_GET['delTextQ']) || isset($_GET['delTextA'])) { 
	    $textQ = $_GET['delTextQ'];
	    $textA = $_GET['delTextA'];
	    $delTextQA = $ser->RemoveSomthingText($textQ, $textA, $id);

	}
 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Add New What We do</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Add Service</li>
                        </ul>
                    </div>
                </div>
            </div>
<?php if (isset($UpdateWhatWe)) {
	echo $UpdateWhatWe;
} ?>
<?php 
	if (isset($delTextQA)) {
		echo $delTextQA;
	}
 ?>
            <div class="content_box_single">              
	         	<form action="" method="POST" enctype="multipart/form-data">
		            <div class="form-group">
		                <label for="weDoQ">Question</label>
		                <input type="text" class="form-control" required="" id="weDoQ" name="weDoQ" placeholder="Enter Question">
		            </div>

		          <div class="form-group">
		            <label for="weDoA">Answer</label>
		            <input type="text" class="form-control" required="" id="weDoA" name="weDoA" placeholder="Enter Answer">
		          </div>

	                <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Submit</button>
	            </form>
        	</div>


<?php 
    $WeDoQA = $ser->SelectAllWedoQAByID($id);
    if ($WeDoQA) {
    	$i = 0;
        while ($resultQA = $WeDoQA->fetch_assoc()) {
        	$i++;
        	$weDoQ = $resultQA['weDoQ'];
        	$weDoA = $resultQA['weDoA'];
 ?>
 <?php if (!empty($weDoQ) AND !empty($weDoA)) { ?>
             <div class="content_box_single">   
						<div class="accordion rs-accordion" id="accordionExample">
						   <!-- Item 1 -->

        <?php 
        $Question = $resultQA['weDoQ'];
        $Question = explode(',', $Question);

        $Answer = $resultQA['weDoA'];
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
						<!-- end accordion -->
        	</div>				            
						       
<?php } }}?>


    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->

<?php include 'inc/footer.php';?>