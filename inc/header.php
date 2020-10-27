<?php 
   //include 'lib/Session.php';
    //Session::checkSession();
    //Session::checkVerifyLogin();
?>
<?php 
    include 'lib/Database.php';
    include 'Helper/Format.php';
    spl_autoload_register(function($classes){
        include_once "classes/".$classes.".php";
    });

    $HT           = new Headtop();
    $post         = new Post();
    $fm           = new Format();
    $db           = new Database();
    $cat          = new Category();
    $ser          = new Service();
    $tes          = new Testimonials();
    $Tea          = new Team();
    $Pro          = new Project();
 ?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">
  
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Basic Page Needs
    ================================================== -->
    
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php 
        if (isset($_GET['BID'])) {
        $postID = $_GET['BID'];                     
        $getAllPost = $post->SelectTitlePostHea($postID);
        if ($getAllPost) {
        while ($PostTitleResult = $getAllPost->fetch_assoc()) {   ?>
    <title><?php echo $PostTitleResult['title'] ?> - <?php echo TITLE; ?></title>
    <?php }}}elseif (isset($_GET['serviceByCat'])) { 
                     $serviceByCat = $_GET['serviceByCat'];
                     echo '<title>'.$serviceByCat.'-'.TITLE.'</title>';?>

    <?php } elseif (isset($_GET['ServiceDeta'])) {
                     $ServiceDeta = $_GET['ServiceDeta'];
                     echo '<title>'.$ServiceDeta.'-'.TITLE.'</title>';
    } else{ ?>
    <title><?php echo $fm->title(); ?>-<?php echo TITLE; ?></title>
 <?php } ?>



    <meta name="description" content=''>

    <?php 
        if (isset($_GET['BID'])) {
        $postID = $_GET['BID'];                     
        $getAllPost = $post->SelectTitlePostHea($postID);
        if ($getAllPost) {
        while ($PostTagResult = $getAllPost->fetch_assoc()) {   ?>
        <meta name="keywords" content="<?php echo $PostTagResult['tag'] ?>, <?php echo TAG ;?>">
    <?php }}}elseif (isset($_GET['SID'])) {
        $SerID = $_GET['SID'];                     
        $getSerTag = $ser->SelectSerTag($SerID);
        if ($getSerTag) {
        while ($SerTagResult = $getSerTag->fetch_assoc()) { ?>
        <meta name="keywords" content="<?php echo $SerTagResult['tag'] ?>, <?php echo TAG; ?>">
    <?php }}} else{ ?>
         <meta name="keywords" content="<?php echo TAG ?>">
    <?php } ?>

    <meta name="author" content="codingsolve.com"> 
    
    <!-- ==============================================
    Favicons
    =============================================== -->
<?php 
    $HeadTopLogo = $HT->SelectAllLogo();
    if ($HeadTopLogo) {
        while ($result = $HeadTopLogo->fetch_assoc()) { 
 ?>
    <link rel="shortcut icon" href="<?php echo $result['favicon'] ?>">
<?php }} ?>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    
    <!-- ==============================================
    CSS VENDOR
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/vendor/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/vendor/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/vendor/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/vendor/animate.min.css">
    
    <!-- ==============================================
    Custom Stylesheet
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    
    <script src="js/vendor/modernizr.min.js"></script>

    <script src='../../../google_analytics_auto.php'></script>
<style type="text/css">
img.logoEdit {
    width: 205px !important;
}
.hrefbtnn {
    margin-top: 12px !important;
    border-radius: 8px;
    margin: 0 auto;
}
</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HJT5N1J8VG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HJT5N1J8VG');
</script>

</head>

<body data-spy="scroll" data-target="#navbar-example">

    <!-- LOAD PAGE -->
    <div class="animationload">
        <div class="loader"></div>
    </div>
    
    <!-- BACK TO TOP SECTION -->
    <a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

    <!-- HEADER -->
    <div class="header header-1">
        <!-- TOP BAR -->
        <div class="topbar d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-md-6">
<?php 
    $HeadTop = $HT->SelectAllTop();
    if ($HeadTop) {
        while ($result = $HeadTop->fetch_assoc()) { 
 ?>
                        <p class="mb-0"><?php echo $result['email']; ?></p>
<?php }} ?>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="sosmed-icon d-inline-flex pull-right">
<?php 
    $SocialLink = $HT->SelectAllSocilaLink();
    if ($SocialLink) {
        while ($result = $SocialLink->fetch_assoc()) { 
 ?>
 <?php if (!empty($result['icon'])) { ?>
                                    <?php 
                                    $link = $result['link'];
                                    $link = explode(',', $link);

                                    $icon = $result['icon'];
                                    $icon = explode(',', $icon);
                                    foreach ($link as $key => $value) {
                    echo '<a href="'.$link[$key].'"><i class="'.$icon[$key].'"></i></a>';
                                    }
                                    ?>
                            



<?php }else{echo "Please Insert Social Link";} ?>
<?php }} ?>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>

        <!-- NAVBAR SECTION -->
        <div class="navbar-main">
            <div class="container">
                <nav id="navbar-example" class="navbar navbar-expand-lg">
<?php 
    $HeadTopLogo = $HT->SelectAllLogo();
    if ($HeadTopLogo) {
        while ($result = $HeadTopLogo->fetch_assoc()) { 
 ?>
                    <a class="navbar-brand" href="index.php">
                        <img src="<?php echo $result['logo'] ?>" class="logoEdit" alt="Code Solve Logo" />
                    </a>
<?php }} ?> 
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">
                                  HOME
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  ABOUT US
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about-company.php">OUR COMPANY</a>
                                    <a class="dropdown-item" href="about-team.php">OUR TEAM</a>
                                    
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  SERVICES 
                                </a>
                                <div class="dropdown-menu">
<?php 
    $getSerCat = $cat->selectAllSerCat();
    if ($getSerCat) {
        while ($result = $getSerCat->fetch_assoc()) { 
 ?>
                                    <a class="dropdown-item" href="services.php?serviceByCat=<?php  echo $result['catName'] ?>"><?php echo $result['catName'] ?></a>
<?php }} ?>
                                
                                </div>
                            </li>

<!--                             <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  PROJECTS  
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="">GRID LAYOUT</a>
                                    <a class="dropdown-item" href="project-detail.php">SINGLE PROJECT</a>
                                </div>
                            </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="project.php" role="button"  aria-haspopup="true" aria-expanded="false">
                                  PROJECTS 
                                </a>    
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="Blog.php" role="button"  aria-haspopup="true" aria-expanded="false">
                                  Blog 
                                </a>    
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">CONTACT</a>
                            </li>

                        </ul>
                    </div>
                </nav> <!-- -->
            </div>
        </div>

    </div>