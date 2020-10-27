<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php
    if (!isset($_GET['editSerCat']) || $_GET['editSerCat'] == NULL) {
        echo "<script>window.location = 'serCatlist.php'</script>";
    }else{
        $id = $_GET['editSerCat'];
    }

?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $updateCat = $cat->serCatUpdate($_POST, $_FILES, $id);
    }
 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Post Category Update</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Category Update</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single"> 
<?php 
if (isset($updateCat)) {
    echo $updateCat;
}
?> 
                 <form action="" method="POST" enctype="multipart/form-data">

<?php 
    $getCatByID = $cat->viewSerCatById($id);
    if ($getCatByID) {
    while ($result = $getCatByID->fetch_assoc()) {
 ?>
                    <div class="form-group">
                        <label for="catName">Category Name</label>
                        <input type="text" class="form-control" id="catName" name="catName" value="<?php echo $result['catName'] ?>">
                    </div>
                    <div class="card" style="width: 600px;">
                        <div class="header">
                            <h2>Image</h2>
                        </div>
                        <div class="body">
                            <input type="file" id="dropify-eventOne" data-show-remove="false" data-default-file="<?php echo $result['image'] ?>" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">Category Description</label><br> <br>
                        <textarea class="form-control" id="text" name="des" rows="4"><?php echo $result['des'] ?></textarea>
                    </div>
<?php }} ?>
                       <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Update</button>

                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>