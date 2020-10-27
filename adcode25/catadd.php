<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['cat_name'];
        $insertCat = $cat->catInsert($catName);
    }
?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Post Category Add</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Category Add</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single">
<?php 
if (isset($insertCat)) {
    echo $insertCat;
}
?> 
                 <form action="" method="POST">
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Enter Course Category">
                     </div>
                     <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
<?php include'inc/footer.php' ?>