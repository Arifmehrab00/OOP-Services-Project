<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>
<?php 
    if (!isset($_GET['editPost']) || $_GET['editPost'] == NULL) {
        echo "<script>window.location = 'postlist.php'</script>";
    }else{
        $id = $_GET['editPost'];
    }
 ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $UpdatPost = $post->PostUpdate($_POST, $_FILES, $id);
    }
 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Update Post</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Update Post</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single"> 

        <?php 
            if (isset($UpdatPost)) {
               echo $UpdatPost;
            }
         ?>
             
         <form action="" method="POST" enctype="multipart/form-data">
<?php 
    $getPostById = $post->viwePostById($id);
    if ($getPostById) {
        while ($result = $getPostById->fetch_assoc()) {
 ?>
            <table class="form">               
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $result['title'] ?>" placeholder="Enter Course Title">
            </div>
              <div class="form-group">
                <label for="catId">Category</label>
                <select class="form-control" id="catId" name="catId">
                  <option value="">Select Category</option>
<?php 
    $getCat = $cat->selectAllCat();
    if ($getCat) {
        while ($resultCat = $getCat->fetch_assoc()) {
 ?>
                            <option 
                                <?php if ($resultCat['id'] == $result['catId']) { ?>
                                   selected = "selected"
                                <?php } ?>
                                value="<?php echo $resultCat['id'] ?>"
                            ><?php echo $resultCat['cat_name']; ?></option>
<?php }} ?>
                </select>
              </div>

              <div class="form-group">
                <label for="editor">Course Description</label> <br> <br>
                <textarea class="form-control" id="editor" name="body" rows="4"><?php echo $result['body'] ?></textarea>
              </div>

            
            <div class="card" style="width: 600px">
                <div class="header">
                    <h2>SoftWeb-IT Logo</h2>
                </div>
                <div class="body">
                    <input type="file" id="dropify-event" name="image" data-show-remove="false" data-default-file="<?php echo $result['image'] ?>">
                </div>
            </div>

              <div class="form-group">
                <label for="tag">Post Tag</label>
                <input type="text" class="form-control" data-role="tagsinput" id="tag" name="tag" value="<?php echo $result['tag'] ?>" placeholder="Enter Post Tag">
              </div>
         
        <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Update</button>
<?php }} ?>
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


