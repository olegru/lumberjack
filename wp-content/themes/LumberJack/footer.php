</div>
<div id="contact-fr" class="container-fluid footer margin-top-75px">
    <div class="padding-0 col-lg-2 hidden-xs hidden-md"></div>
    <div class="foo-content padding-0 col-lg-10 col-xs-12 col-md-12">
    	<img src="<?php bloginfo('template_url'); ?>/img/foo_bg_new.jpg">
    	<div class="foo-abs-cont col-lg-12 col-md-12 col-xs-12 padding-30">
    		<div class="contacts col-lg-4 col-xs-12 col-md-12">
    			<div class="title">
					<?php
						if (qtranxf_getLanguage() == 'en') {
							echo "Contacts";
						} elseif (qtranxf_getLanguage() == 'ru') {
							echo "Контакты";
						} elseif (qtranxf_getLanguage() == 'ua') {
							echo "Контакти";
						}   
					?>
    			</div>
				<?php
					$contacts = ot_get_option( 'contacts', array());
					foreach($contacts as $item) {
						echo '
							<div class="cont-info">
								<span class="text-info">'.$item['title'].'</span>
								<span class="text-info">'.$item['text'].'</span>
							</div>
						';
					}
				?>
    			<div class="cont-info">
					<span class="text-info"><?= ot_get_option('email'); ?></span>
    			</div>
    		</div>
    		<div class="map-container padding-left-30 col-lg-8 hidden-md hidden-xs">
    			<div id='map'><?= ot_get_option('map'); ?></div>
    		</div>
    	</div>
    </div>
	<div class="padding-0 col-lg-12 col-xs-12 col-md-12">
		<div class="padding-0 col-lg-2 hidden-xs hidden-md"></div>
	    <div class="copyright col-lg-10 col-xs-12 col-md-12">
            <ul id="social-sidebar" class="hidden-lg visible-md visible-sm visible-xs">
                <li><a class="fb" href="https://www.facebook.com/lumberjack.barberhouse" target="_blank"></a></li>
                <li><a class="inst" href="https://www.instagram.com/lumberjack.barberhouse" target="_blank"></a></li>
                <li><a class="youtube" href="https://www.youtube.com/channel/UC2EAtSCyCN_S4vne_K947mg" target="_blank"></a></li>
                <li><a class="googlePlus" href="https://plus.google.com/u/0/112931325223792076947/posts/p/pub?_ga=1.255019406.706149052.1455192888" target="_blank"></a></li>
            </ul>
	    	
	    	<?= ot_get_option('copyright'); ?>
	    	<a class="dev_tools hidden-xs hidden-md" href="http://hestenagency.com/">
		    	<?= ot_get_option('dev'); ?>
	    	</a>
	    </div>
	</div>
</div>
<div id="modal">
        <div class="container">
            <div id="parse-end" class="col-lg-4 col-lg-offset-4">
                <div class="modal-title">
                    <span>Открытие в феврале</span>
                    <a id="modal-close"></a>
                </div>
                <div id="parse-desc-container"></div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.drawsvg.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.animateNumber.min.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js'></script> 

<script type="text/javascript">
$(function() {

$("#menu-item-298").on("click", function() {
$("#menu-item-298>.sub-menu").toggleClass("displayblock");
});

});
</script>

<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script> 
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ 
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), 
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) 
})(window,document,'script','//www.google-analytics.com/analytics.js','ga'); 

ga('create', 'UA-74262152-1', 'auto'); 
ga('require', 'displayfeatures');
ga('send', 'pageview'); 

/* Accurate bounce rate by time */
if (!document.referrer || document.referrer.split('/')[2].indexOf(location.hostname) != 0) setTimeout(function(){
ga('send', 'event', 'Новый пользователь', location.pathname);
}, 15000);

</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1190135127666217');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1190135127666217&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<script type="text/javascript" src="//w42970.yclients.com/widgetJS" charset="UTF-8"></script>

<?php wp_footer(); ?>

<script>
		function AjaxChange(result_id,form_id,url,kolichestvo) {
                jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных
                    data:  jQuery("#"+form_id).serialize() + "&kolichestvo="+kolichestvo,			
                    success: function(response) { //Если все нормально
					
             Cart_Tour('cart-count','/wp-content/themes/LumberJack/cart-count.php');
                    document.getElementById(result_id).innerHTML = response;

                },
                  error: function(jqXHR, textStatus, errorThrown){
                // Функция при ошибочном запросе
                console.error('Ajax request failed', jqXHR, textStatus, errorThrown);
            }
             });
        };
	
	function AjaxFormRequest(result_id,form_id,url) {
                jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных
                    data: jQuery("#"+form_id).serialize(), 
                    success: function(response) { //Если все нормально

					
			 Cart_Tour('cart-count','/wp-content/themes/LumberJack/cart-count.php');
                    document.getElementById(result_id).innerHTML = response;

                },
                  error: function(jqXHR, textStatus, errorThrown){
                // Функция при ошибочном запросе
                console.error('Ajax request failed', jqXHR, textStatus, errorThrown);
            }
             });
        };
		function Cart_Tour(result_id,url) {
                jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных			
                    success: function(response) { //Если все нормально

					
                    document.getElementById(result_id).innerHTML = response;

                },
                  error: function(jqXHR, textStatus, errorThrown){
                // Функция при ошибочном запросе
                console.error('Ajax request failed', jqXHR, textStatus, errorThrown);
            }
             });
        };
		   $(' .prod-img-block').delegate('.add-to-cart-hover', 'click', function(cart){
    	cart.preventDefault();
    });
	$(document).ready(function(){

		// var $preloader = $('#load-page')
	 //    $preloader.delay(2500).fadeOut('slow');

		// var mySVG = $('#svg').drawsvg();
		// mySVG.drawsvg('animate');

        var bodyClass = $('body');

        if ( !bodyClass.hasClass('home')){
            $('#menu-item-6 a').removeAttr('href').attr("href", "http://lumberjack.style/#lumber-jeck");
            $('#menu-item-7 a').removeAttr('href').attr("href", "http://lumberjack.style/#best-side");
            $('#menu-item-8 a').removeAttr('href').attr("href", "http://lumberjack.style/#services");
            $('#menu-item-9 a').removeAttr('href').attr("href", "http://lumberjack.style/#barber");
            $('#menu-item-10 a').removeAttr('href').attr("href", "http://lumberjack.style/#photo-galary");
            $('#menu-item-11 a').removeAttr('href').attr("href", "http://lumberjack.style/#magazine");
            $('#menu-item-12 a').removeAttr('href').attr("href", "http://lumberjack.style/#contact-fr");
        }


		var elementWidth = $('#prod-list li').width(),
			imgHeightLi = $('#prod-list li .prod-img-block .prod-image').height(),
			borderBlock = $('#prod-list li .prod-img-block'),
			paddingSize = ((elementWidth - imgHeightLi) / 2).toFixed(0);
			borderBlock.css('padding', paddingSize);

		var ourUrl = self.location.pathname,
			catList = $('#magazine-list-mob li, #magazine-list li');

			catList.each(function(){
				if( ourUrl == $(this).find('a').attr('href')){
					$(this).addClass('select-menu-item');
				} else {
					$(this).removeClass('select-menu-item');
				}
			});

            $('.active-revslide').css('width', '100vw !important');

		$('#searchsubmit').click(function(e){
			e.preventDefault();
			
			if( $('#s').hasClass('s-open') ){
				$('#s').removeClass('s-open');
			} else {
				$('#s').addClass('s-open');
			}
		});

	});	

    function getProdActive(){
        $("#cart").addClass('get_product');
        setTimeout(function() { 
            $("#cart").removeClass('get_product');
        }, 300);
    }
</script>
