<?php 
   include '../lib/Session.php';
    Session::checkSession();
?>
<?php 
    include '../lib/Database.php';
    include '../Helper/Format.php';
    spl_autoload_register(function($classes){
        include_once "../classes/".$classes.".php";
    });

    $fm           = new Format();
    $HT           = new Headtop();
    $cat          = new Category();
    $post         = new Post();
    $ser          = new Service();
    $tes          = new Testimonials();
    $Tea          = new Team();
    $Pro          = new Project();
 ?>
<?php 
    date_default_timezone_set("Asia/Dhaka");
 ?>


<!doctype html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SW-IT :: Home</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Mplify Bootstrap 4.1.1 Admin Template">
<meta name="author" content="ThemeMakker, design by: ThemeMakker.com">

<link rel="icon" href="assets/img/fa-icon.png" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <link rel="stylesheet" href="assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="assets/vendor/sweetalert/sweetalert.css"/> -->
<link rel="stylesheet" href="assets/vendor/dropify/css/dropify.min.css"> 

<link rel="stylesheet" href="assets/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="assets/vendor/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/jquerysctipttop.css">
<link rel="stylesheet" href="assets/css/inbox.css">
<link rel="stylesheet" href="assets/css/chatapp.css">

<link rel="stylesheet" href="assets/css/color_skins.css">

<link rel="stylesheet" href="assets/css/custom.css">

        <script src="js/ckeditor/ckeditor.js"></script>
        <script src="js/ckeditor/samples/js/sample.js"></script>

</head>
<body class="theme-blue">

<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
        <p>Please wait...</p>        
    </div>
</div> -->
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="index.php">
                    <img src="assets/img/logo.png" alt="Mplify Logo" class="img-responsive logo">
                </a>
            </div>
            
            <div class="navbar-right">
                <ul class="list-unstyled clearfix mb-0">
                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                        </div>                        
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <form id="navbar-search" class="navbar-form search-form">
                            <input value="" class="form-control" placeholder="Search here..." type="text">
                            <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                        </form>
                    </li>
                    <li>
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="javascript:void(0);" class="mega_menu icon-menu" title="Mega Menu">Mega</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="create_new icon-menu" title="Create New">Create New</a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <i class="icon-bell"></i>
                                        <span class="notification-dot"></span>
                                    </a>
                                    <ul class="dropdown-menu animated bounceIn notifications">
                                        <li class="header"><strong>You have 4 new Notifications</strong></li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-info text-warning"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text">Campaign <strong>Holiday Sale</strong> is nearly reach budget limit.</p>
                                                        <span class="timestamp">10:00 AM Today</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>                               
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-like text-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text">Your New Campaign <strong>Holiday Sale</strong> is approved.</p>
                                                        <span class="timestamp">11:30 AM Today</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-pie-chart text-info"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text">Website visits from Twitter is 27% higher than last week.</p>
                                                        <span class="timestamp">04:00 PM Today</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-info text-danger"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text">Error on website analytics configurations</p>
                                                        <span class="timestamp">Yesterday</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="footer"><a href="javascript:void(0);" class="more">See all notifications</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="icon-flag"></i><span class="notification-dot"></span></a>
                                    <ul class="dropdown-menu animated bounceIn task">
                                        <li class="header"><strong>Project</strong></li>
                                        <li class="body">
                                            <ul class="menu tasks list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span class="text-muted">Clockwork Orange <span class="float-right">29%</span></span>
                                                        <div class="progress">
                                                            <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span class="text-muted">Blazing Saddles <span class="float-right">78%</span></span>
                                                        <div class="progress">
                                                            <div class="progress-bar l-slategray" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span class="text-muted">Project Archimedes <span class="float-right">45%</span></span>
                                                        <div class="progress">
                                                            <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span class="text-muted">Eisenhower X <span class="float-right">68%</span></span>
                                                        <div class="progress">
                                                            <div class="progress-bar l-coral" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span class="text-muted">Oreo Admin Templates <span class="float-right">21%</span></span>
                                                        <div class="progress">
                                                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="21" aria-valuemin="0" aria-valuemax="100" style="width: 21%;"></div>
                                                        </div>
                                                    </a>
                                                </li>                        
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="javascript:void(0);">View All</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="fa fa-language"></i></a>
                                    <ul class="dropdown-menu animated flipInX choose_language">                                        
                                        <li><a href="javascript:void(0);">English</a></li>
                                        <li><a href="javascript:void(0);">French</a></li>
                                        <li><a href="javascript:void(0);">Spanish</a></li>
                                        <li><a href="javascript:void(0);">Portuguese</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <img class="rounded-circle" src="<?php echo Session::get('pic'); ?>" width="30" alt="">
                                    </a>
                                    <div class="dropdown-menu animated flipInY user-profile">
                                        <div class="d-flex p-3 align-items-center">
                                            <div class="drop-left m-r-10">
                                                <img src="<?php echo Session::get('pic'); ?>" class="rounded" width="50" alt="">
                                            </div>
                                            <div class="drop-right">
                                                <h4><?php echo Session::get('name'); ?></h4>
                                                <p class="user-name"><?php echo Session::get('email'); ?></p>
                                            </div>
                                        </div>
                                        <div class="m-t-10 p-3 drop-list">
                                            <ul class="list-unstyled">
                                                <li><a href="page-profile.php"><i class="icon-user"></i>My Profile</a></li>
                                                <li><a href="app-inbox.php"><i class="icon-envelope-open"></i>Messages</a></li>
                                                <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                                                <li class="divider"></li>
<?php 
    if (isset($_GET['action']) && $_GET['action'] == "logout"){
       Session::destroy();
    }
?>
                                                <li>
                                                    <a href="?action=logout"><i class="icon-power"></i>Logout</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="icon-menu js-right-sidebar"><i class="icon-settings"></i></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>