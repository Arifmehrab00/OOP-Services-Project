<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>


<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $insertSer = $ser->SerInsert($_POST, $_FILES);
    }

 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Add New Service</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Add Service</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single"> 

        <?php 
            if (isset($insertSer)) {
               echo $insertSer;
            }
         ?>
              
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Service Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Course Title">
            </div>
              
              <div class="form-group">
                <label for="catId">Category</label>
                <select class="form-control" id="catId" name="catId">
                  <option value="">Select Category</option>
<?php 
    $getCat = $cat->selectAllSerCat();
    if ($getCat) {
        while ($result = $getCat->fetch_assoc()) {
 ?>
                            <option value="<?php echo $result['id'] ?>"><?php echo $result['catName']; ?></option>
<?php }} ?>
                </select>
              </div>

              <div class="form-group">
                <label for="editor">Service Description</label><br> <br>
                <textarea class="form-control" id="editor" name="body" rows="4"></textarea>
              </div>

              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Primary Image</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-eventOne" name="image">
                    </div>
              </div>
              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Image One</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-eventTwo" name="imageTwo">
                    </div>
              </div>
              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Image Two</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-event" name="imageThree">
                    </div>
              </div>
                
              <div class="form-group">
                <label for="tag">Post Tag</label>
                <input type="text" class="form-control" data-role="tagsinput" id="tag" name="tag" placeholder="Enter Post Tag">
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" id="adID" name="adID" value="<?php echo Session::get('id'); ?>">
              </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Next</button>
            </form>
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


