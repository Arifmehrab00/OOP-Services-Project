<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php
    if (!isset($_GET['editClient']) || $_GET['editClient'] == NULL) {
        echo "<script>window.location = 'serCatlist.php'</script>";
    }else{
        $id = $_GET['editClient'];
    }

?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $clientUpdate = $tes->clientUpdate($_POST, $_FILES, $id);
    }
 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Testimonials Update</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Testimonials Update</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single"> 
<?php 
if (isset($clientUpdate)) {
    echo $clientUpdate;
}
?> 
                 <form action="" method="POST" enctype="multipart/form-data">

<?php 
    $getCliByID = $tes->viewClientById($id);
    if ($getCliByID) {
    while ($result = $getCliByID->fetch_assoc()) {
 ?>
                    <div class="form-group">
                        <label for="cliName">Name</label>
                        <input type="text" class="form-control" value="<?php echo $result['cliName'] ?>" id="cliName" name="cliName" placeholder="Enter Client Name">
                    </div>
                    <div class="form-group">
                        <label for="cliTitle">Title</label>
                        <input type="text" class="form-control" value="<?php echo $result['cliTitle'] ?>" id="cliTitle" name="cliTitle" placeholder="Enter  Client Title">
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
                        <label for="cliSay">Client Say</label><br> <br>
                        <textarea class="form-control" id="cliSay" name="cliSay" rows="4"><?php echo $result['cliSay'] ?></textarea>
                    </div>
<?php }} ?>
                       <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Update</button>

                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>