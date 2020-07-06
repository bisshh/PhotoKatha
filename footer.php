<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Photo Katha
 */

?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <a href="/"><img src="<?php echo get_stylesheet_directory_uri();?>/img/logo.png" alt="Photokatha logo" class="img-fluid f-img"></a>
            </div>
            <div class="col-md-4">
                <h4>Photo Katha</h4>
                <address>
                    +977-9841565626<br>
                    info@photokatha.news <br>
                    <strong>अध्यक्ष/प्रधान सम्पादक</strong> - दिपेन्द श्रेष्ठ <br>
                    <strong>सम्पादक</strong> - दिपेन्द श्रेष्ठ <br>
                    <!-- <strong>सुचना बिभाग दर्ता नं.</strong> - -->
                </address>	
                <ul class="social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>				
            </div>
            <div class="col-md-4">
                <h4>क्याटेगोरी</h4>
                <ul class="category row">
                    <?php 
                        $categories = get_categories();
                        foreach($categories as $category) {
                            echo '<li class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>महत्वपूर्ण लिंकहरु</h4>
                <ul class="link">
                    <li><a href="https://www.kpa.org.np/" target="_blank"><i class="fal fa-camera-retro"></i> Kathmandu Photographer Association</a></li>
                    <li><a href="https://www.kpa.org.np/" target="_blank"><i class="fal fa-camera-retro"></i> Kathmandu Photographer Association</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="f-btm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>© २०२० photokatha.news सर्वाधिकार सुरक्षित</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<a class="back-to-top" id="back-top"></a>
	
	<?php if ( is_active_sidebar( 'footer-ad' ) ) : ?>
		<div class="rd-bottom-popup" id="popup">
			<span class="close">&times;</span>
			<?php dynamic_sidebar('footer-ad');?>
		</div> <!-- /bottom popup -->
	<?php endif;?>

	<?php if ( is_active_sidebar( 'skip-ad' ) ) : ?>
    <!-- Modal -->
    <div class="modal fade modal-load" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="clock">
						<img src="<?php echo get_template_directory_uri(); ?>/img/onlinenuwakot-logo.png" alt="Logo" scale="0" style="width:170px">
					</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Skip Ad</button>
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php dynamic_sidebar('skip-ad');?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#myModal').modal('show').css({
                'background': '#333'
            }, {
                'opacity': '0.5'
            });
            setTimeout(function () {
                $('#myModal').modal('hide');
            }, 5000);
        });
    </script>
	<?php endif;?>
	<script>
        // const el = document.querySelector("#mySidenav");
        // document.addEventListener("click",el,function(){
            
        // });
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function openNav() {
          document.querySelector(".mb-menu").style.width = "250px";
          document.querySelector("#main").style.marginLeft = "250px";
          document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }
        
        function closeNav() {
          document.querySelector(".mb-menu").style.width = "0";
          document.querySelector("#main").style.marginLeft= "0";
          document.body.style.backgroundColor = "white";
        }        
    </script>

	<a class="back-to-top" id="back-top"></a> <!-- /back to top -->

<?php wp_footer(); ?>

</body>
</html>
