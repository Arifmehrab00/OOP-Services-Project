<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php 
    if (!isset($_GET['editProject']) || $_GET['editProject'] == NULL) {
        echo "<script>window.location = 'ProList.php'</script>";
    }else{
        $id = $_GET['editProject'];
    }
 ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $UpdatPro = $Pro->ProUpdate($_POST, $_FILES, $id);
    }
 ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Update Project</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Update Project</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single"> 

        <?php 
            if (isset($UpdatPro)) {
               echo $UpdatPro;
            }
         ?>
<?php 
   $getSingService = $Pro->getSingleProject($id);
   if ($getSingService) {
    while ($result = $getSingService->fetch_assoc()) {

 ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Project Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $result['title'] ?>">
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
                            <option value="<?php echo $resultCat['id'] ?>"
                              <?php if ($result['catId'] == $resultCat['id']) {
                               echo "selected";
                              } ?>
                               ><?php echo $resultCat['catName']; ?></option>
<?php }} ?>
                </select>
              </div>


              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Primary Image</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-eventOne" name="image" data-show-remove="false" data-default-file="<?php echo $result['image'] ?>">
                    </div>
              </div>

              <div class="form-group">
                <label for="Type">Chocsr Type</label>
                <select class="form-control" required="" onchange="random()" id="Type">
                  <option value="">Select One</option>

                            <option value="1"
                            <?php if (!empty($result['imageTwo'])) {
                             echo "selected";
                            } ?>
                            >Image</option>
                            <option value="2"
                            <?php if (!empty($result['link'])) {
                             echo "selected";
                            } ?>
                            >Link</option>

                </select>
              </div>
<div id="One" style="<?php if (!empty($result['imageTwo'])) {
                             echo "display: block;";
                            }else{echo "display: none;";} ?>">
              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Image</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-eventTwo" name="imageTwo" data-default-file="<?php echo $result['imageTwo'] ?>">
                    </div>
              </div>
</div>
<div id="Two" style="<?php if (!empty($result['link'])) {
                             echo "display: block;";
                            }else{echo "display: none;";} ?>">
  
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="<?php echo $result['link'] ?>">
            </div> 
</div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Submit</button>
            </form>
<?php }}else{ echo "<script>window.location = 'ProList.php'</script>"; } ?>
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
<script type="text/javascript">
function random(){
    var One   = document.getElementById("One");
    var Two   = document.getElementById("Two");

    var a=document.getElementById('Type').value;
    // Show Image
    if (a==="1") {
        One.style.display = "block";
        document.getElementById("dropify-eventTwo").required = true;
    }else{
        One.style.display = "none";  
        document.getElementById("dropify-eventTwo").required = false;      
    }
    // Show Link
    if (a==="2") {
        Two.style.display = "block";
        document.getElementById("link").required = true;
    }else{
        Two.style.display = "none";  
        document.getElementById("link").required = false;       
    }
}
</script>
<?php include 'inc/footer.php';?>


