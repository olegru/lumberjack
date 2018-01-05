<?php
	/* Template Name: Главная */
?>
<?php get_header(); ?>

<div class="container-fluid padding-0">
	<div class="content col-lg-12 col-xs-12 col-md-12">
		<div id="lumber-jeck" class="top-side col-lg-12 col-xs-12 col-md-12 padding-0 margin-top-75px">
			<div class="padding-0 col-lg-5 col-xs-12 col-md-12">
				<img class="img" src="<?php bloginfo('template_url'); ?>/img/about.jpg">
			</div>
			<div class="img-desc padding-0 col-lg-7 col-xs-12 col-md-12">
				<?= get_post_meta($post->ID, 'home_desc', true); ?>
			</div>
		</div>
		<div id="best-side" class="top-side col-lg-12 col-xs-12 col-md-12 padding-0 margin-top-55px">
			<div class="img-desc padding-0 col-lg-3 col-lg-offset-1">
				<?= get_post_meta($post->ID, 'home_gallery_desc', true); ?>
			</div>
			<div class="img-icon padding-0 col-lg-7 col-xs-12 col-md-12 col-lg-offset-1">
				<ul class="bx-slider-wiev col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-0">
					<?php
						if ( function_exists( 'ot_get_option' ) ) {
						  $images = explode( ',', get_post_meta($post->ID, 'home_gallery', true ) );
						  
						  if ( ! empty( $images ) ) {
							foreach( $images as $id  ) {
								$full_img_src = wp_get_attachment_image_src( $id, '' );
							  echo '
							  <li><div class="sliderViewImage viewImage1 hidden-lg hidden-md hidden-sm visible-xs"></div>
							<img class="hidden-xs" src="' . $full_img_src[0] . '"></li>';
							}
						  }
						}
					?>
				</ul>
			</div>
		</div>
		<div class="our-service fullwidth">
			<div id="services" class="col-lg-12 col-xs-12 col-md-12">
				<div class="block-title">
					<h3>
						<?php
							if (qtranxf_getLanguage() == 'en') {
								echo "Services";
							} elseif (qtranxf_getLanguage() == 'ru') {
								echo "УСЛУГИ";
							} elseif (qtranxf_getLanguage() == 'ua') {
								echo "ПОСЛУГИ";
							}   
						?>
					</h3>
				</div>
				<div class="serv-list">
					<ul>
						<?php
							$services = get_post_meta($post->ID, 'home_services', true);
							foreach($services as $service) {
								echo '
									<li class="se-list-el col-lg-4 col-xs-12 col-md-12">';
										if($service['data_url'] =='') {
											echo '<a href="'.$service['link'].'">';
										}
										echo '<div class="srv-border';
											if($service['data_url'] !='') {
												echo ' ms_booking';
											}
											echo'"';
											if($service['data_url'] !='') {
												echo 'data-url="'.$service['data_url'].'" onclick="ga("send", "event", "Click", "Open"); yaCounter35690605.reachGoal("yes")"';
											}
											echo '>';
											echo '<span class="srvTitle">
												'.$service['title'].'
											</span>
											<div class="col-lg-5 col-xs-5 col-md-5 img-serv-set">';
												if($service['image']) {
													echo '<img src="'.$service['image'].'">';
												}
											echo '</div>
											<p>'.$service['price'].'</p>
											<span class="top-border"></span>
											<span class="bottom-border"></span>
											<span class="left-border"></span>
											<span class="right-border"></span>';
											if($service['data_url'] =='') {
												echo '</a>';
											}
										echo'</div>
									</li>
								';
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div id="abonement_home" class="top-side col-lg-12 col-xs-12 col-md-12 padding-0 margin-top-75px">
			<div class="img-icon padding-0 col-lg-7 col-xs-12 col-md-12">
				<img src="<?= get_post_meta($post->ID, 'club_image', true); ?>">
			</div>
			<div class="img-desc padding-0 col-lg-3 col-xs-12 col-md-12 col-lg-offset-1">
					<h2>
						<?php
							if (qtranxf_getLanguage() == 'en') {
								echo "Club card";
							} elseif (qtranxf_getLanguage() == 'ru') {
								echo "Клубные карты";
							} elseif (qtranxf_getLanguage() == 'ua') {
								echo "Клубні карти";
							}   
						?>
					</h2>
				
				<?= get_post_meta($post->ID, 'club_desc', true); ?>
			</div>
		</div>
		<div id="barber" class="col-lg-10 col-lg-offset-1 hidden-xs hidden-md">
			<h4>
				<?php
					if (qtranxf_getLanguage() == 'en') {
						echo "Barbers";
					} elseif (qtranxf_getLanguage() == 'ru') {
						echo "Барберы";
					} elseif (qtranxf_getLanguage() == 'ua') {
						echo "Барбери";
					}   
				?>
			</h4>
			<ul class="bxslider-1">
				<?php
				$args = array(
				'order' => 'ASC',
				'cat' => 3
				);
				$properties = new WP_Query($args);
				?>
				<?php
				if ($properties->have_posts()) : $i = 0; // счетчик ?>
				<?php while($properties->have_posts()) : $properties->the_post(); ?>
				  <!-- открываем класс row для первых 4-х блоков -->
				  <?php if($i == 0){echo '<li>';} ?>
				  <div class="barber-list col-lg-4">
					  	<div class="barbers">
					  	<img <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?> src="<?php echo $image_url[0]; ?>">
					  	<div class="barber-desc">
							<div class="name"><?php the_title(); ?></div>
							<div class="desc"><?php the_content(); ?></div>
						</div>
					</div>
				  </div>
				<?php $i++; // увеличиваем счетчик здесь ?>
				<!-- если выведено 4 блока, закрывам класс row и обнуляем счетчик -->
				<?php if($i == 3){echo '</li>'; $i = 0;} ?>
				<?php endwhile?>
				<!-- если посты закончились и не кратны 4-ем, тогда закрываем класс row -->
				<?php if($i != 0) echo '</li>'; ?>
				<?php endif?>
			</ul>
		</div>
		<div id="photo-chart" class="col-lg-12 padding-0 margin-top-75px photo-prop">
			<div class="img-icon padding-0 col-lg-7">
				<img src="<?= get_post_meta($post->ID, 'photo_image', true); ?>">
			</div>
			<div class="img-desc padding-0 col-lg-5 col-xs-12 col-md-12">
			<?= get_post_meta($post->ID, 'photo_desc', true); ?>
				
			</div>
			<!-- <a class="all-photo hidden-xs hidden-md" href="/fotogalereya">
				<div class="btn-bg"></div>
				<span>Все фото</span>
			</a>
			<a class="all-photo-mobile hidden-lg col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1" href="/fotogalereya">
				<div class="btn-bg"></div>
				<span>Все фото</span>
			</a> -->
		</div>
		<!-- <div id="photo-galary" class="fr-photogalery padding-0 col-lg-12  hidden-xs hidden-md">
			<div class="title">
				<h2>Фотогалерея</h2>
			</div>
			<div class="month-side-fr col-lg-12">
				<ul>
					<?php// dynamic_sidebar( 'Фотогалерея Главная' ); ?>
				</ul>
			</div>
			<div class="col-lg-12">
				<a class="more-img" href="/fotogalereya">
					<div class="btn-bg"></div>
					<span>Все фото</span>
				</a>
			</div>
		</div> -->
		<!-- <div id="magazine" class="fr-magazine col-lg-12 col-xs-12 col-md-12">
			<div class="title">
				<h2>магазин</h2>
			</div>
			<div class="col-lg-12 col-xs-12 col-md-12 padding-0">
				<ul id="prod-list" class="col-lg-12 col-xs-12 col-md-12">
				<?php// query_posts( array( 'cat' => 21, 'posts_per_page' => 4 ) ); ?>
				<?php // if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<li class="col-lg-3 col-xs-12 col-md-12">
					<form method="post"  id="form_id<?php// echo get_the_ID();?>">
					<div class="prod-img-block">
						<a href="<?php// echo get_permalink($post->ID); ?>">
							<img class="prod-image" <?php// $image_url // = wp_get_attachment_image_src( get_post_thumbnail_id(),// 'full'); ?> src="<?php// echo $image_url[0]; ?>">
						</a>
						<input hidden type="text" name="Image"  value="<?php// echo $image_url[0]; ?>">
						<button type="submit" onclick="AjaxFormRequest('product-list', 'form_id<?php// echo get_the_ID();?>', '/wp-content/themes/LumberJack/form.php'); getProdActive(); return false;"  class="add-to-cart-hover" >Купить</button>
					</div>
					<div class="title">
						<h2><?php// the_title(); ?></h2>
						
						<input hidden type="text" name="Title"  value="<?php// the_title(); ?>">
					</div>
					<div class="price-block">
						<span class="price"><?php// echo (get_post_meta($post->ID, 'price', true)) ?></span><span>грн</span>
						<input hidden type="text" name="ID"  value="<?php// echo ($post->ID) ?>">
						<input hidden type="text" name="Price" value="<?php// echo (get_post_meta($post->ID, 'price', true)) ?>">
					</div>
				</form>
						
					</li>
				<//? endwhile; endif; wp_reset_query(); ?>
				</ul>
				<div class="col-lg-12 col-xs-12 col-md-12">
					<a class="more-prod hidden-md hidden-xs" href="/category/magazin/vse">
						<div class="btn-bg"></div>
						<span>Все товары</span>
					</a>
					<a class="more-prod-mob hidden-lg col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1" href="/category/magazin/vse">
						<div class="btn-bg"></div>
						<span>Все товары</span>
					</a>
				</div>
			</div>
		</div> -->
	</div>
</div>
<?php get_footer(); ?>

<script type="text/javascript">
    $(document).ready(function(){
	   $('.bxslider, .bxslider-1, .bx-slider-wiev').bxSlider({
	        auto: 'true',
	        controls: 'fade',
		  	autoHover: true
	     });	
   	});

   	$('.month-side-fr ul li img').removeAttr('height');
    var listPhotoEl = $('.month-side-fr ul li');
    listPhotoEl.wrapInner('<div class="li-wrap"></div>');
    listPhotoEl.each(function(){
    	var photoGalaryLink = $(this).find('.widget_sp_image-image-link').attr('href'),
    		imgUnWrap = $(this).find('.widget_sp_image-image-link img').unwrap();
    			$(this).find('.widget_sp_image-description p').after('<a class="more-photo" href="'+ photoGalaryLink +'"><div class="btn-bg-white"></div><span>Подробнее</span></a>');
    			$(this).find(".widget_sp_image-description h3, .wrap-cont-ph-min, .widget_sp_image-description p, .widget_sp_image-description a").wrapAll("<div class='desc-wr'></div>");	
    			$(this).find(".desc-wr p, .desc-wr a").wrapAll("<div class='desc-hidden'></div>");		
    });

       	$('a[href*=#]').bind("click", function(e){
        jQuery('.pole').removeClass("hidden");
        jQuery('.pole').addClass("visible");
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top
        }, 1000);
        e.preventDefault();
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var showSideOne = $('#lumber-jeck .img-desc'),
			showSideTwo = $('#best-side .img-desc'),
			showSideThree = $('#photo-chart .img-desc'),
			domHeight = $(".wrapper").height(),
			scrollSizeFirst = (domHeight / 10).toFixed(0);
			scrollSizeSecond = (domHeight / 7).toFixed(0);
			scrollSizeThree = (domHeight / 2).toFixed(0);

			showSideOne.addClass('view-block-hidden')
			showSideTwo.addClass('view-block-hidden')
			showSideThree.addClass('view-block-hidden')

		$(window).scroll(function(){

            if ( $(this).scrollTop() > scrollSizeFirst ) {
                showSideOne.addClass("view-block");
            }
            if ( $(this).scrollTop() > scrollSizeSecond ) {
            	showSideTwo.addClass("view-block");
            }
            if ( $(this).scrollTop() > scrollSizeThree ) {
            	showSideThree.addClass("view-block");
            }
        });
	});
	
</script>