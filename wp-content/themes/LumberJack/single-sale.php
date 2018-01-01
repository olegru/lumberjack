<?php get_header(); ?>
<div class="container-fluid padding-0">
	<?php get_sidebar('sidebar'); ?>
	<div class="content-pages col-lg-10 col-xs-12 col-md-12">
		<div class="top-pages-icon col-lg-12 col-xs-12 col-md-12">
			<div class="head-title col-lg-5 col-xs-12 col-md-12">
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>
			<div class="head-search-cart col-lg-7 col-xs-12 col-md-12">
				<div class="cart-wrap">
					<div id="cart">
						<span id="cart-count" class="cart-count"><? 
	 if(count($_SESSION["Mass"])!=0)
 {


	for($i=0;$i<count($_SESSION["Mass"]);$i++)
{
		$a=intval($_SESSION["Mass"][$i]["kolichestvo"]);
  
  $countGoods+=$a;
}
$countGoods;
						echo $countGoods;
						}
						else{
							echo "0";
						} ?></span>
					</div>
				</div>
				<div class="search-side hidden-xs hidden-md"><?php get_search_form(); ?></div>
			</div>
		</div>
		<div class="sing-padd-desc col-lg-12 col-xs-12 col-md-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<form method="post"  id="form_id<?php echo get_the_ID();?>">
			<div class="single-left col-lg-5 col-xs-12 col-md-12">
				<div class="border-div">
					<img class="prod-image" <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?> src="<?php echo $image_url[0]; ?>">
					<input hidden type="text" name="Image"  value="<?php echo $image_url[0]; ?>">
				</div>
			</div>
			<div class="single-right col-lg-6 col-lg-offset-1 col-xs-12 col-md-12">
				<div class="title">
					<h1><?php the_title(); ?></h1>
					<input hidden type="text" name="Title"  value="<?php the_title(); ?>">
				</div>
				<div class="single-price">
					<span class="price"><?php echo (get_post_meta($post->ID, 'price', true)) ?></span><span>грн</span>
					<input hidden type="text" name="ID"  value="<?php echo ($post->ID) ?>">
						<input hidden type="text" name="Price" value="<?php echo (get_post_meta($post->ID, 'price', true)) ?>">
				</div>
				<div class="product-desc">
					<?php the_content(); ?>
				</div>
				<div id="event-btns">
					<div class="prod-singl-count col-lg-8 col-xs-12 col-md-12">
						<div class="text">Количество</div>
						<div id="single-count">
						<? echo '
						<input name="kolichestvo" id="count"  type="text"  class="count-cart" value="1">
									';	?>
						
							<div class="btns-side">
								<button id="plus"></button>
								<span class="btns-line"></span>
								<button id="minus"></button>
							</div>
						</div>
					</div>
					<div class="to-cart col-lg-4 col-xs-12 col-md-12">
						<input id="add-to-cart" type="submit" onclick="AjaxFormRequest('product-list', 'form_id<?php echo get_the_ID();?>', '/wp-content/themes/LumberJack/add_single.php'); getProdActive(); return false;"  value="В корзину">
					</div>
				</div>
			</div>
				</form>
			<? endwhile; endif; ?>

		</div>
					<div id="product-cart" class="col-lg-3 col-xs-12 col-md-12 padding-0">
						<?
						
			$summa;
			$td1_style = "border: 1px solid #000; max-width: 140px; padding: 5px 10px; font-weight: bold; background-color: #e8e8e8;";
				$td2_style = "border: 1px solid #000; max-width: 460px; min-width: 300px; padding: 5px 10px;";
				if(empty($summa))
				{
					
			$result=0;
				}
				else{
					
			$result=$summa;
				}
				echo '
			<div class="title">
								<span>Корзина</span>
								<i class="close-cart"></i>
							</div>
				<div id="product-list" class="col-lg-12 col-xs-12 col-md-12 padding-0" >
					<ul>';
					if(isset($_SESSION["Mass"])) {

						
						for($i=0;$i<count($_SESSION["Mass"]);$i++) {
						
						
							$mass=$_SESSION["Mass"][$i];
						echo '<li class="col-lg-12 col-xs-12 col-md-12 padding-0">';
							echo '<form method="post"  id="form_id'.$mass["ID"].'">';
								echo '<input hidden name="ID" value="'.$mass["ID"].'">
							<div class="col-lg-4 col-xs-12 col-md-12 cart-left-full">';
								echo '<button onclick="AjaxFormRequest(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/clearTovar.php\');return false;" class="remove-product">' .'</button>

								<img src="'.$mass["Image"].'">
							</div>
							<div class="prod-desc-cart col-lg-8 col-xs-12 col-md-12">
								<div class="title-prod">
									<span>'.$mass["Title"].'</span>
								</div>
								<div class="cart-count">
									<span class="text-cnt">Кол-во:</span>	
									<div class="select-count">
										<input name="kolichestvo" type="text" onchange="AjaxChange(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/Change.php\', this.value ); return false;" class="count-cart" value="'.$mass["kolichestvo"].'">
											
								<input hidden name="kolichestvo" value="'.$mass["kolichestvo"].'">
										<span class="count-php" style="display:none;"></span>
										<div class="btns-full-cart">
											<span class="btns-cart-line"></span>
											<button  name="plus" class="plus-cart" onclick="AjaxFormRequest(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/form.php\'); return false;" ></button>
											<button name="minus" class="minus-cart" onclick="AjaxFormRequest(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/Minus.php\'); return false;" ></button>
										</div>
									</div>
								</div>
							</div>
							</form>
						</li>';
								$msg_tovar.="
					<tr>
						<td style=\"$td2_style\">".$_SESSION["Mass"][$i]["Title"]."</td>
						<td style=\"$td2_style\">".$_SESSION["Mass"][$i]["kolichestvo"]."</td>						
						<td style=\"$td2_style\">".($_SESSION["Mass"][$i]["Price"]*$_SESSION["Mass"][$i]["kolichestvo"])." грн</td>
					</tr>";
						}	
	$msg_top = "
				<table style=\"border-collapse: collapse;\">
					<tr>
						<td style=\"$td1_style\">Название товара</td>
						<td style=\"$td1_style\">Количество</td>
						<td style=\"$td1_style\">Цена</td>
						
					</tr>";

					$message=$msg_top.$msg_tovar;
					echo '	
					</ul>
					<div id="for-order">
						<span class="info-text-left">Всего к оплате:</span>
						<span id="pay-sum">'.$result.' грн</span>
					</div>
					<div id="to-order">
						<div class="order-title">Контакты получателя</div>
						<div id="do-order">
						<div role="form" class="wpcf7" id="wpcf7-f110-o1" lang="ru-RU" dir="ltr">
<div class="screen-reader-response"></div>
<form method="post" id="sendMessage" class="wpcf7-form" novalidate="novalidate">

<p><span class="wpcf7-form-control-wrap text-830"><input type="text" name="text-830" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Ф.И.О"></span><br>
<span class="wpcf7-form-control-wrap tel-787"><input type="tel" name="tel-787" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Номер телефона"></span><br>
<span class="wpcf7-form-control-wrap email-410"><input type="email" name="email-410" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Ваш e-mail"></span><br>
<span class="wpcf7-form-control-wrap text-831" style="display:none"><input type="text" name="text-831" hidden value=\'"'.$message.'"\' size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required hidden_input" id="order-list" aria-required="true" aria-invalid="false"></span><br>
<span class="wpcf7-form-control-wrap text-832"><input type="text" name="text-832" hidden value="'.$result.'" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required hidden_input" id="last-price" aria-required="true" aria-invalid="false"></span><br>
<input type="submit" onclick="AjaxFormRequest(\'send-status\', \'sendMessage\', \'/wp-content/themes/LumberJack/send.php\'); return false;"  value="Отправить" class="wpcf7-form-control wpcf7-submit" id="send-order-btn"><img class="ajax-loader" src="http://lumber-jack.crystal-arts.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Отправка..." style="visibility: hidden;"></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>'; ?>
							<?php //echo do_shortcode('[contact-form-7 id="110" title="Trade"]'); 
						echo '</div>
						<div id="send-status"></div>
					</div>
				</div>
				';
					}?>
			</div>
		<div class="related-products col-lg-12 col-xs-12 col-md-12">
			<div class="title">
				<h2>Похожие товары</h2>
			</div>
			<?php
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				$args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'showposts' => '4',
					'orderby' => 'rand',
					'ignore_sticky_posts' => '1');
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {
					echo '<ul id="prod-list" class="col-lg-12 col-xs-12 col-md-12">';
					while ($my_query->have_posts()) {
						$my_query->the_post();
						?>
						<li class="col-lg-3 col-xs-12 col-md-12">
							<form method="post"  id="form_id<?php echo get_the_ID();?>">
								<div class="prod-img-block">
									<a href="<?php echo get_permalink($post->ID); ?>">
										<img class="prod-image" <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?> src="<?php echo $image_url[0]; ?>">
									</a>
									<input hidden type="text" name="Image"  value="<?php echo $image_url[0]; ?>">
									<button type="submit" onclick="AjaxFormRequest('product-list', 'form_id<?php echo get_the_ID();?>', '/wp-content/themes/LumberJack/form.php'); return false;"  class="add-to-cart-hover" >Купить</button>
								</div>
								<div class="title">
									<h2><?php the_title(); ?></h2>
									
									<input hidden type="text" name="Title"  value="<?php the_title(); ?>">
								</div>
								<div class="price-block">
									<span class="price"><?php echo (get_post_meta($post->ID, 'price', true)) ?></span><span>грн</span>
									<input hidden type="text" name="ID"  value="<?php echo ($post->ID) ?>">
									<input hidden type="text" name="Price" value="<?php echo (get_post_meta($post->ID, 'price', true)) ?>">
								</div>
							</form>
						</li>
						<?php
					}
					echo '</ul>';
				}
				wp_reset_query();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
<script type="text/javascript">
    $(document).ready(function(){
        var minus = $('#minus'),
        plus = $('#plus'),
        valIn = $('#count').val();

        minus.click(function(event){
        	event.preventDefault();
            valIn--;        
            if( valIn < 1 ){
              valIn = 1;
            }
            $(this).parents("#single-count").find("#count").val(valIn);
        });
		plus.click(function(event){
            event.preventDefault();
            valIn++;
            $(this).parents("#single-count").find("#count").val(valIn);
        });
    });
 </script>

 <script type="text/javascript">
	$(document).ready(function(){
		var cartBtn = $("#cart"),
			menuUl = $("#magazine-list"),
			cartDiv = $("#product-cart"),
			closeBtn = $(".close-cart"),
			wrapperWidth = $('.wrapper').width();

			if( wrapperWidth < 1000){
				$('body').removeClass('fix-normal');
				$('body').addClass('fix-mobile');
			} else {
				$('body').removeClass('fix-mobile');
				$('body').addClass('fix-normal');
			}

			function slowOpenCart(){
				$("#product-list").slideToggle( "slow" );
			}

			function slowCloseCart(){
				cartDiv.removeClass('show1');
				menuUl.removeClass('hide-ul');
			}

			cartBtn.click(function(){
				if(cartDiv.hasClass('show1')){
					$('.fix-mobile .prod-nv').css("display", "none");
					$("#product-list").slideToggle("slow" );
					setTimeout(slowCloseCart, 1000);
					
					
				} else {
					$('.fix-mobile .prod-nv').css("display", "block");
					menuUl.addClass('hide-ul');
					cartDiv.addClass('show1');
					setTimeout(slowOpenCart, 1000);
				}
			});

			closeBtn.click(function(){
				$('.fix-mobile .prod-nv').css("display", "none");
				$("#product-list").slideToggle("slow");
				setTimeout(slowCloseCart, 1000);
			});

				
	});
</script>