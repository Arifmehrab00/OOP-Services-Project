<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>
<?php
    if (isset($_GET['delClint'])) { 
        $id = $_GET['delClint'];
        $delClint = $tes->delClint($id);
    }
?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Testimonials List</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Testimonials List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single">    
                    <table id="example_one" class="table table-bordered table-hover table-striped js-basic-example dataTable table-custom">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Clint Name</th> 
							<th>Clint Title</th> 
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php 
	$getCat = $tes->selectAllClient();
	if ($getCat) {
		$i = 0;
		while ($result = $getCat->fetch_assoc()) {
			$i++ ;
 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['cliName'] ?></td>
							<td><?php echo $result['cliTitle'] ?></td>
							<td><img width="70px" src="<?php echo $result['image'] ?>"></td>
							<td><a href="tesEdit.php?editClient=<?php echo $result['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
								<a onclick="return confirm(' X Are you sure to Delete '); " href="?delClint=<?php echo $result['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
						</tr>
<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

