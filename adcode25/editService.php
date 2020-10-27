<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php 
    if (!isset($_GET['editService']) || $_GET['editService'] == NULL) {
        echo "<script>window.location = 'SerList.php'</script>";
    }else{
        $id = $_GET['editService'];
    }
 ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $UpdatSer = $ser->SerUpdate($_POST, $_FILES, $id);
    }
 ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Update Service</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Update Service</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single"> 

        <?php 
            if (isset($UpdatSer)) {
               echo $UpdatSer;
            }
         ?>
<?php 
   $getSingService = $ser->getSingleService($id);
   if ($getSingService) {
    while ($result = $getSingService->fetch_assoc()) {

 ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Service Title</label>
                <input type="text" class="form-control" value="<?php echo $result['title'] ?>" id="title" name="title" placeholder="Enter Course Title">
            </div>
              
              <div class="form-group">
                <label for="catId">Category</label>
                <select class="form-control" id="catId" name="catId">
                  <option value="">Select Category</option>
<?php 
    $getCat = $cat->selectAllSerCat();
    if ($getCat) {
        while ($resultCat = $getCat->fetch_assoc()) {
 ?>
                            <option 
                              <?php if ($resultCat['id'] == $result['catId']): ?>
                                selected
                              <?php endif ?>
                            value="<?php echo $resultCat['id'] ?>"><?php echo $resultCat['catName']; ?></option>
<?php }} ?>
                </select>
              </div>

              <div class="form-group">
                <label for="editor">Service Description</label><br> <br>
                <textarea class="form-control" id="editor" name="body" rows="4"><?php echo $result['body'] ?></textarea>
              </div>

              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Primary Image</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-eventOne" name="image" data-show-remove="false" data-default-file="<?php echo $result['image'] ?>">
                    </div>
              </div>
              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Image One</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-eventTwo" name="imageTwo" data-show-remove="false" data-default-file="<?php echo $result['imageTwo'] ?>">
                    </div>
              </div>
              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Image Two</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-event" name="imageThree" data-show-remove="false" data-default-file="<?php echo $result['imageThree'] ?>">
                    </div>
              </div>
                
              <div class="form-group">
                <label for="tag">Post Tag</label>
                <input type="text" class="form-control" data-role="tagsinput" id="tag" value="<?php echo $result['tag'] ?>" name="tag" placeholder="Enter Post Tag">
              </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Submit</button>
                <a href="WhatWeDo.php?addWhatWeDo=<?php echo $result['id'];?>" class="btn btn-success">Edit We Do</a>
            </form>
<?php }}else{ echo "<script>window.location = 'SerList.php'</script>"; } ?>
        </div>
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


