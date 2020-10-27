<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>
<?php 
    if (!isset($_GET['clintSayList']) || $_GET['clintSayList'] == NULL) {
        echo "<script>window.location = 'SerList.php'</script>";
    }else{
        $id = $_GET['clintSayList'];
    }
?>
<?php 
    if (isset($_GET['delClientSay'])) { 
        $Did = $_GET['delClientSay'];
        $delClientSay = $ser->delClientSayByID($Did);
    }
 ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Client Say List</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Client Say List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single">
<?php if (isset($delClientSay)) {
    echo  $delClientSay;
} ?>
         <table id="example_one" class="table table-bordered table-hover table-striped js-basic-example dataTable table-custom">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>Client Name</th>
                    <th>Message</th>
                    <th>Image</th>
                    <th>date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php 
 $getService = $ser->clintSayByID($id);
 if ($getService) {
    $i = 0;
    while ($result = $getService->fetch_assoc()) {
    $i++
 ?>
                <tr class="odd gradeX">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fm->textShorten($result['cliName'], 15); ?></td>
                    <td><?php echo $fm->textShorten($result['msg'], 30); ?></td>
                    <td>
                        <img width="64px" height="64px" style="margin-top: 5px; margin-bottom: -17px;" src="<?php if(empty($result['image'])){echo "upload/ClientSay/Defalut/demo.jpg";}else{echo $result['image'];} ?>">
                    </td>
                    <td><?php echo $fm->formatDate2nd($result['date']) ?></td>
                    <td> 
                        <a onclick="return confirm('Are you sure to Delete');" href="?clintSayList=<?php echo $id ?>&delClientSay=<?php echo $result['id'] ?>">
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
