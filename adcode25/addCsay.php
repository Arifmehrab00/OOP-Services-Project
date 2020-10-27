<?php include'inc/header.php' ?>
<?php include'inc/left_sidebar.php' ?> 
<?php include'inc/mega_menubar.php' ?>   
<?php include 'inc/right_sidebar.php' ?>

<style type="text/css">
section.fiveSec {
    width: 330px;
    text-align: left;
    overflow: hidden;
    margin-top: 8px;
    margin-left: 176px;
}
.FiveSatrdd {
    width: 100%;
    overflow: hidden;
    text-align: left;
}
/* reset */
/*! normalize.css v3.0.2 | MIT License | git.io/normalize */html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%
}


article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary { display: block }

audio, canvas, progress, video {
  display: inline-block;
  vertical-align: baseline
}

audio:not([controls]) {
  display: none;
  height: 0
}
[hidden], template {
display:none
}

a { background-color: transparent }

a:active, a:hover { outline: 0 }

abbr[title] { border-bottom: 1px dotted }

b, strong { font-weight: bold }

dfn { font-style: italic }

h1 {
  font-size: 2em;
  margin: 0.67em 0
}

mark {
  background: #ff0;
  color: #000
}

small { font-size: 80% }

sub, sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline
}

sup { top: -0.5em }

sub { bottom: -0.25em }

img { border: 0 }

svg:not(:root) { overflow: hidden }

figure { margin: 1em 40px }

hr {
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box;
  box-sizing: content-box;
  height: 0
}

pre { overflow: auto }

code, kbd, pre, samp {
  font-family: monospace, monospace;
  font-size: 1em
}

button, input, optgroup, select, textarea {
  color: inherit;
  font: inherit;
  margin: 0
}

button { overflow: visible }

button, select { text-transform: none }

button, html input[type="button"], input[type="reset"], input[type="submit"] {
  -webkit-appearance: button;
  cursor: pointer
}

button[disabled], html input[disabled] { cursor: default }
button::-moz-focus-inner, input::-moz-focus-inner {
border:0;
padding:0
}

input { line-height: normal }

input[type="checkbox"], input[type="radio"] {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 0
}
input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button {
height:auto
}

input[type="search"] {
  -webkit-appearance: textfield;
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box;
  box-sizing: content-box
}
input[type="search"]::-webkit-search-cancel-button, input[type="search"]::-webkit-search-decoration {
-webkit-appearance:none
}

fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em
}

legend {
  border: 0;
  padding: 0
}

textarea { overflow: auto }

optgroup { font-weight: bold }

table {
  border-collapse: collapse;
  border-spacing: 0
}

td, th { padding: 0 }

#star-1:checked ~ section [for='star-1'] svg, #star-2:checked ~ section [for='star-1'] svg, #star-2:checked ~ section [for='star-2'] svg, #star-3:checked ~ section [for='star-1'] svg, #star-3:checked ~ section [for='star-2'] svg, #star-3:checked ~ section [for='star-3'] svg, #star-4:checked ~ section [for='star-1'] svg, #star-4:checked ~ section [for='star-2'] svg, #star-4:checked ~ section [for='star-3'] svg, #star-4:checked ~ section [for='star-4'] svg, #star-5:checked ~ section [for='star-1'] svg, #star-5:checked ~ section [for='star-2'] svg, #star-5:checked ~ section [for='star-3'] svg, #star-5:checked ~ section [for='star-4'] svg, #star-5:checked ~ section [for='star-5'] svg {
  -webkit-transform: scale(1);
  transform: scale(1);
}

#star-1:checked ~ section [for='star-1'] svg path, #star-2:checked ~ section [for='star-1'] svg path, #star-2:checked ~ section [for='star-2'] svg path, #star-3:checked ~ section [for='star-1'] svg path, #star-3:checked ~ section [for='star-2'] svg path, #star-3:checked ~ section [for='star-3'] svg path, #star-4:checked ~ section [for='star-1'] svg path, #star-4:checked ~ section [for='star-2'] svg path, #star-4:checked ~ section [for='star-3'] svg path, #star-4:checked ~ section [for='star-4'] svg path, #star-5:checked ~ section [for='star-1'] svg path, #star-5:checked ~ section [for='star-2'] svg path, #star-5:checked ~ section [for='star-3'] svg path, #star-5:checked ~ section [for='star-4'] svg path, #star-5:checked ~ section [for='star-5'] svg path {
  fill: #FFBB00;
  stroke: #cc9600;
}

section {
  width: 300px;
  text-align: center;
  /*position: absolute;*/
  top: 50%;
  left: 50%;
  -webkit-transform: translate3d(-50%, -50%, 0);
  transform: translate3d(-50%, -50%, 0);
}

label {
  display: inline-block;
  width: 50px;
  text-align: center;
  cursor: pointer;
}

label svg {
  width: 100%;
  height: auto;
  fill: #eff2f7;
  stroke: #3018b1;
  -webkit-transform: scale(0.8);
  transform: scale(0.8);
  -webkit-transition: -webkit-transform 200ms ease-in-out;
  transition: -webkit-transform 200ms ease-in-out;
  transition: transform 200ms ease-in-out;
  transition: transform 200ms ease-in-out, -webkit-transform 200ms ease-in-out;
}

label svg path {
  -webkit-transition: fill 200ms ease-in-out, stroke 100ms ease-in-out;
  transition: fill 200ms ease-in-out, stroke 100ms ease-in-out;
}

label[for="star-null"] {
  display: block;
  margin: 0 auto;
  color: #999;
}



input { margin-top: 1rem; }
</style>
<?php 
    if (!isset($_GET['addCsay']) || $_GET['addCsay'] == NULL) {
        echo "<script>window.location = 'postlist.php'</script>";
    }else{
        $Sid = $_GET['addCsay'];
    }
 ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $ClientSay = $ser->SerStarInsert($_POST, $_FILES, $Sid);
    }
?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Client Say</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Client Say</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content_box_single">
<?php 
if (isset($ClientSay)) {
    echo $ClientSay;
}
?> 
                 <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cliName">Client Name</label>
                        <input type="text" class="form-control" id="cliName" name="cliName" placeholder="Enter Course Category">
                    </div>
                    <div class="card" style="width: 600px; float: left;">
                        <div class="header" style="text-align: left;">
                            <h2>Image</h2>
                        </div>
                        <div class="body">
                            <input type="file" id="dropify-eventOne" name="image">
                        </div>
                    </div>
                    <br>
<div class="form-group FiveSatrdd">
        <input type="radio" style="visibility: hidden;" value=""  name="stars" id="star-null" />
        <input type="radio" style="visibility: hidden;" value="1" name="stars" id="star-1" />
        <input type="radio" style="visibility: hidden;" value="2" name="stars" id="star-2" />
        <input type="radio" style="visibility: hidden;" value="3" name="stars" id="star-3" />
        <input type="radio" style="visibility: hidden;" value="4" name="stars" id="star-4" />
        <input type="radio" style="visibility: hidden;" value="5" name="stars" id="star-5" checked />
 
<section class="fiveSec">
        <div class="header">
            <h2 style="font-size: 23px; color: black; font-weight: 600;">Chocse Star</h2>
        </div>
  <label for="star-1"> <svg width="255" height="240" viewBox="0 0 51 48">
    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
    </svg> </label>
  <label for="star-2"> <svg width="255" height="240" viewBox="0 0 51 48">
    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
    </svg> </label>
  <label for="star-3"> <svg width="255" height="240" viewBox="0 0 51 48">
    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
    </svg> </label>
  <label for="star-4"> <svg width="255" height="240" viewBox="0 0 51 48">
    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
    </svg> </label>
  <label for="star-5"> <svg width="255" height="240" viewBox="0 0 51 48">
    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
    </svg> </label>
  <label for="star-null"> Clear </label>
</section>
</div>
                    <div class="form-group">
                        <label for="text">Client Message</label><br> <br>
                        <textarea class="form-control" id="text" name="msg" rows="4"></textarea>
                    </div>
                     <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Submit</button>
                     <a href="clintSayList.php?clintSayList=<?php echo $Sid ?>" class="btn btn-success btn-lg text-center">Client Say List</a>
                 </form>
                </div>
            </div>
        </div>



<?php include'inc/footer.php' ?>