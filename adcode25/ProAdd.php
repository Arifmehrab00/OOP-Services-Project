<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>


<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $insertPro = $Pro->ProInsert($_POST, $_FILES);
    }

 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Add New Project</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Add Project</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single"> 

        <?php 
            if (isset($insertPro)) {
               echo $insertPro;
            }
         ?>
              
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Project Title</label>
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


              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Primary Image</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-eventOne" name="image">
                    </div>
              </div>

              <div class="form-group">
                <label for="Type">Chocsr Type</label>
                <select class="form-control" required="" onchange="random()" id="Type">
                  <option value="">Select One</option>

                            <option value="1">Image</option>
                            <option value="2">Link</option>

                </select>
              </div>
<div id="One" style="display: none;">
              <div class="card" style="width: 600px;">
                    <div class="header">
                        <h2>Image</h2>
                    </div>
                    <div class="body">
                        <input type="file" id="dropify-eventTwo" name="imageTwo">
                    </div>
              </div>
</div>
<div id="Two" style="display: none;">
  
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Enter Course Title">
            </div> 
</div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Submit</button>
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


