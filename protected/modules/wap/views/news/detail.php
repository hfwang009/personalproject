<main id="about_us_page">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="mb30"><?php echo $detail['title']; ?></h1>
                <h1 class="mb30"><?php echo !empty($detail['ctime'])?date('d/m/Y',$detail['ctime']):''; ?></h1>
                <?php echo !empty($detail['content'])?$detail['content']:''; ?>
            </div>

        </div>
    </div>
</main>

<!-- ========== JAVASCRIPT ========== -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!---<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyBDgMJEPio2qomUKV1iqlIufj4u2NVd3q4"></script>--->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery.smoothState.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/morphext.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.thumbs.min.js"></script>
<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="js/jPushMenu.js"></script>
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="js/countUp.min.js"></script>
<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
