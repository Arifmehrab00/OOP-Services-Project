<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<?php 
    if (isset($_GET['delService'])) { 
	    $id = $_GET['delService'];
	    $delService = $ser->delServiceById($id);
	}
 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Post List</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Post List</li>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="content_box_single">
<?php if (isset($delService)) {
	echo  $delService;
} ?>
         <table id="example_one" class="table table-bordered table-hover table-striped js-basic-example dataTable table-custom">
			<thead>
				<tr>
					<th width="5%">SL.</th>
					<th width="15%">Service Title</th>
					<th width="15%">Description</th>
					<th width="11%">Category</th>
					<th width="11%">Image</th>
					<th width="12%">Author</th>
					<th width="7%">C.S</th>
					<th width="12%">Date</th>
					<th width="12%">Action</th>
				</tr>
			</thead>
			<tbody>
<?php 
 $getService = $ser->SelectAllService();
 if ($getService) {
 	$i = 0;
 	while ($result = $getService->fetch_assoc()) {
 	$i++;
 	$id = $result['id'];
 ?>
 <?php 
        $unreadMessage =  $ser->clintSayByID($id);
    if ($unreadMessage) {
        $count = mysqli_num_rows($unreadMessage);
            $countCli = "(".$count.")";
        }else{
            $countCli = "(0) ";
        }
 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $fm->textShorten($result['title'], 15); ?></td>
					<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
					<td><?php echo $result['catName'] ?></td>
					<td>
						<img width="70px" height="40px" style="margin-top: 5px; margin-bottom: -17px;" src="<?php echo $result['image'] ?>">
					</td>
					<td><?php echo $result['name'] ?></td>
					<td><a href="addCsay.php?addCsay=<?php echo $result['id'] ?>">C.Say <sup><?php echo $countCli ?></sup></a></td>
					<td><?php echo $fm->formatDate2nd($result['date']) ?></td>
					<td>
						<a href="editService.php?editService=<?php echo $result['id'] ?>"> 
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>  
						<a onclick="return confirm('Are you sure to Delete');" href="?delService=<?php echo $result['id'] ?>">
							<i class="fa fa-trash-o" aria-hidden="true"></i>
						</a>
					</td>
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
