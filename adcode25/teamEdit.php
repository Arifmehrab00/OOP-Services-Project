<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php
    if (!isset($_GET['editTeam']) || $_GET['editTeam'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    }else{
        $id = $_GET['editTeam'];
    }

?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $teamUpdate = $Tea->teamUpdate($_POST, $_FILES, $id);
    }
 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Team Menber Update</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Member Update</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single"> 
<?php 
if (isset($teamUpdate)) {
    echo $teamUpdate;
}
?> 
                 <form action="" method="POST" enctype="multipart/form-data">

<?php 
    $getMemByID = $Tea->viewMemberById($id);
    if ($getMemByID) {
    while ($result = $getMemByID->fetch_assoc()) {
 ?>
                    <div class="form-group">
                        <label for="memName">Name</label>
                        <input type="text" class="form-control" value="<?php echo $result['memName'] ?>" id="memName" name="memName" placeholder="Enter Client Name">
                    </div>
                    <div class="form-group">
                        <label for="memTitle">Title</label>
                        <input type="text" class="form-control" value="<?php echo $result['memTitle'] ?>" id="memTitle" name="memTitle" placeholder="Enter  Client Title">
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
                        <label for="memIcon">Social Icon</label>
                        <input type="text" data-role="tagsinput" value="<?php echo $result['memIcon'] ?>" class="form-control" id="memIcon" name="memIcon" placeholder="Enter  Client Title">
                    </div>                    
                    <div class="form-group">
                        <label for="memLink">Social Link</label>
                        <input type="text" data-role="tagsinput" class="form-control" value="<?php echo $result['memLink'] ?>" id="memLink" name="memLink" placeholder="Enter  Client Title">
                    </div>
<?php }} ?>
                       <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Update</button>

                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>