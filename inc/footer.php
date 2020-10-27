    <!-- CTA -->
    <div class="section overlap-bottom">
        <div class="content-wrap pb-5 pt-0">
            <div class="container">
<?php 
    $HeadTop = $HT->SelectAllTop();
    if ($HeadTop) {
        while ($result = $HeadTop->fetch_assoc()) { 
 ?>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="bg-secondary p-4 shadow-lg">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <!-- BOX 1 -->
                                    <div class="rs-icon-info">
                                        <div class="info-icon">
                                            <i class="fa fa-map-o"></i>
                                        </div>
                                        <div class="info-text">
                                            <h4>Our headquarters</h4>
                                            <?php echo $result['slogan'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <!-- BOX 2 -->
                                    <div class="rs-icon-info">
                                        <div class="info-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="info-text">
                                            <h4>Call center</h4>
                                            <?php echo $result['phone'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <!-- BOX 3 -->
                                    <div class="rs-icon-info">
                                        <div class="info-icon">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <div class="info-text">
                                            <h4>Contact Email</h4>
                                            <?php echo $result['email'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php }} ?>
            </div>
        </div>
    </div>

    <!-- FOOTER SECTION -->
    <div class="footer">
        <div class="spacer-50"></div>
        <div class="content-wrap">
            <div class="container">

                <div class="row">

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="footer-item">
<?php 
    $HeadTopLogo = $HT->SelectAllLogo();
    if ($HeadTopLogo) {
        while ($result = $HeadTopLogo->fetch_assoc()) { 
 ?>
                            <img src="<?php echo $result['logo'] ?>" class="logoEdit" alt="logo bottom" class="logo-bottom">
<?php }} ?>
                            <div class="spacer-30"></div>
                            <p><strong>CodingSolve</strong> is a one-stop web and graphic services company. With an experience of over 10 years in the IT industry and having worked with over 800+ clients...</p>
                            <div class="sosmed-icon d-inline-flex">
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
                            


<a href="skype:live:.cid.e8901229192e4799">Call With Skype</a>

<?php }else{echo "Please Insert Social Link";} ?>
<?php }} ?>
                            </div>
                        </div>
                    </div>  


                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-title">
                                Useful Links
                            </div>
                            <ul class="list">
                                <li><a href="https://www.codingsolve.com/about-company.php" title="About Us">About Us</a></li>
                                <li><a href="https://www.codingsolve.com/about-team.php" title="Our Team">Our Team</a></li>
                                <li><a href="https://www.codingsolve.com/project.php" title="Portfolio">Portfolio</a></li>
                                <li><a href="https://www.codingsolve.com/contact.php" title="Our Office">Contact Us</a></li>
                            </ul>                               
                        </div>
                    </div>              

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="footer-item">
                            <div class="footer-title">
                                Contact Info
                            </div>
<?php 
    $HeadTop = $HT->SelectAllTop();
    if ($HeadTop) {
        while ($result = $HeadTop->fetch_assoc()) { 
 ?>
                            <ul class="list-info">
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="info-text"><?php echo $result['slogan'] ?></div> </li>
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="info-text"><?php echo $result['phone'] ?></div>
                                </li>
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <div class="info-text"><?php echo $result['email'] ?></div>
                                </li>
                                <li>
                                    <div class="info-icon">
                                        <span class="fa fa-clock-o"></span>
                                    </div>
                                    <div class="info-text">24/7</div>
                                </li>
                            </ul>
<?php }} ?>
                        </div>

                    </div>

                </div>
                
            </div>
        </div>
<?php 
    $year = date('Y')
 ?>
        <div class="fcopy">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <p class="mt-3 text-center">Copyright <?php echo $year ?> © <span class="text-secondary">Online Service Center</span>. Designed by <span class="text-secondary">Coding Solve.</span></p> 
                    </div>
                </div>
            </div>
        </div>
        
    </div>

<script type="text/javascript">function add_chatinline(){var hccid=38817272;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>


    <!-- JS VENDOR -->
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/owl.carousel.js"></script>
    <script src="js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="js/vendor/isotope.pkgd.min.js"></script>
    <script src="js/vendor/imagesloaded.pkgd.min.js"></script>

    <!-- SENDMAIL -->
    <script src="js/vendor/validator.min.js"></script>
    <script src="js/vendor/form-scripts.js"></script>
    <script src="//apps.skaip.org/buttons/widget/core.min.js" defer="defer"></script>
    <script src="js/script.js"></script>

</body>
</html>