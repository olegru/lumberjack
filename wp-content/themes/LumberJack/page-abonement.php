<?php 
/*
Template Name: Abonement
*/ 
 ?>
<?php get_header(); ?>
<div class="container-fluid padding-0">
	<?php get_sidebar('sidebar'); ?>
	<div class="content abonement_page col-lg-10 col-xs-12 col-md-12">
		<div id="bronze_cart" class="top-side col-lg-12 col-xs-12 col-md-12 padding-40 margin-top-75px">
			<div class="img-icon padding-0 col-lg-4 col-xs-12 col-md-12">
				<img src="<?= get_post_meta($post->ID, 'card_image_bronze', true); ?>">
			</div>
			<div class="img-desc padding-0 col-lg-7 col-xs-12 col-md-12 col-lg-offset-1">
				<?= get_post_meta($post->ID, 'card_desc_bronze', true); ?>
			</div>
		</div>
		<div id="silver_cart" class="top-side col-lg-12 col-xs-12 col-md-12 padding-40 margin-top-55px">
			<div class="img-icon padding-0 col-lg-4 col-xs-12 col-md-12 col-lg-offset-1" style="float:right;">
				<img src="<?= get_post_meta($post->ID, 'card_image_silver', true); ?>">
			</div>
			<div class="img-desc padding-0 col-lg-7">
				<?= get_post_meta($post->ID, 'card_desc_silver', true); ?>
			</div>
		</div>
		<div id="gold_cart" class="top-side col-lg-12 col-xs-12 col-md-12 padding-40 margin-top-75px">
			<div class="img-icon padding-0 col-lg-4 col-xs-12 col-md-12">
				<img src="<?= get_post_meta($post->ID, 'card_image_gold', true); ?>">
			</div>
			<div class="img-desc padding-0 col-lg-7 col-xs-12 col-md-12 col-lg-offset-1">
				<?= get_post_meta($post->ID, 'card_desc_gold', true); ?>		
			</div>
		</div>
		<div class="top-side col-lg-12 col-xs-12 col-md-12 padding-40 margin-top-75px">
			<?= get_post_meta($post->ID, 'card_alert', true); ?>
		</div>
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


