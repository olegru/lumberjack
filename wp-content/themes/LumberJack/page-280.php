<?php get_header(); ?>
<?php get_sidebar('sidebar'); ?>
<div class="col-lg-10 col-md-12 center clearfix">
	<div class="row">
			<style type="text/css">
	.footer .foo-content img {
		display: none;
	}
	.foo-abs-cont {
		display: none;
	}
	thead {
    display: none;
}
tr.cart_item {
    width: 995px;
    height: 185px;
    margin: 0 auto;
    display: table;
    background-color: rgba(31,31,31,0.7);
    position: relative;
}
.woocommerce a.remove {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #737171 ! important;
}
img.attachment-shop_thumbnail.size-shop_thumbnail.wp-post-image {
    height: 73%;
    width: auto;
}
td.product-remove {
    width: 1px;
}
</style>
<script>
var h_hght = 429; // высота шапки
var h_mrg = 0;    // отступ когда шапка уже не видна
                 
$(function(){
 
    var elem = $('.block-cart-fixed');
    var top = $(this).scrollTop();
     
    if(top > h_hght){
        elem.css('top', h_mrg);
    }           
     
    $(window).scroll(function(){
        top = $(this).scrollTop();
         
        if (top+h_mrg < h_hght) {
            elem.css('top', (h_hght-top));
        } else {
            elem.css('top', h_mrg);
        }
    });
 
});
</script>

	<div class="head-cart">

	</div>
	<div class="block-cart-fixed">
	</div>
						<div class="post-main clearfix">
						<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
						
						<div class="post">
							<div class="post-title">
								<!-- <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
							</div>
								<div class="post-thumbinal"><?php the_post_thumbnail(); ?>								
								</div>
								<div class="post-content">
									<h2>Ваш заказ</h2>
								<?php the_content(); ?>
								</div>

						</div>	
					<br clear="all" />
					<hr>
						<?php endwhile; ?>
						<br clear="all" />
						

						<?php endif; ?>
						
					</div>
	</div>
</div>
<?php get_footer(); ?>
