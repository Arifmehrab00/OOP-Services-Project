<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php
    if (!isset($_GET['editCat']) || $_GET['editCat'] == NULL) {
        echo "<script>window.location = 'catlist.php'</script>";
    }else{
        $id = $_GET['editCat'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['cat_name'];
        $updateCat = $cat->catUpdate($catName, $id);
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
                 <form action="" method="POST">

<?php 
    $getCatByID = $cat->viewCatById($id);
    if ($getCatByID) {
    while ($result = $getCatByID->fetch_assoc()) {
 ?>
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo $result['cat_name'] ?>">
                     </div>
<?php }} ?>
                       <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Update</button>

                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>