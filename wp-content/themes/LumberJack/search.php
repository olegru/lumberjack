<?php get_header(); ?>
<div class="container-fluid padding-0">
	<?php get_sidebar('sidebar'); ?>
	<div class="content-pages col-lg-10">
		<div class="top-pages-icon col-lg-12">
			<div class="head-title col-lg-5">
				<h1>
					<div class="seach-side"><?php $search =& new WP_Query("s=$s&showposts=-1"); ?> <?php printf( __( 'Поиск: &quot;%s&quot;', 'twentyfourteen' ), get_search_query() ); ?></div> 
					<? echo $query_strin; ?>
					<?php $posts=query_posts($query_string.'&posts_per_page=10'); ?>
				</h1>
			</div>
			<div class="head-search-cart col-lg-7">
				<div class="cart-wrap">
					<div id="cart">
						<span id="cart-count" class="cart-count"><? echo count($_SESSION["Mass"]);?></span>
					</div>
				</div>
				<div class="search-side"><?php get_search_form(); ?></div>
			</div>
		</div>
		<div class="col-lg-9">
			<ul id="prod-list" class="col-lg-12">
				<?php 
					$paged = (get_query_var('paged')) ? get_query_var('paged'): 1;
					query_posts("&cat=21,22,23,24,25,26&paged=$paged&s=".$_GET['s']);
				?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<li class="col-lg-4">
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
			<? endwhile; endif; wp_reset_query(); ?>
			</ul>
		</div>
		<div class="prod-nv col-lg-3 padding-0">
			<div class="col-lg-12">
			<ul id="magazine-list" class="start-to-fix">
				<?php
				  $categories = get_categories('child_of=20&orderby=id');
				  foreach ($categories as $category) {
					$option = '<li><a href="/category/magazin/'.$category->category_nicename.'/">';
					$option .= $category->cat_name;
					$option .= ' ('.$category->category_count.')';
					$option .= '</a></li>';
					echo $option;
				  }
				?>
			</ul>
			
			<div id="product-cart" class="col-lg-12 padding-0">
			<?
				for($i=0;$i<count($_SESSION["Mass"]);$i++)
{
		$a=intval($_SESSION["Mass"][$i]["kolichestvo"]);
  $b=intval($_SESSION["Mass"][$i]["Price"]);
  $summa+=$a*$b;
  
}
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
				<div id="product-list" class="col-lg-12 padding-0" >
					<ul>';
					if(isset($_SESSION["Mass"])) {

						
						for($i=0;$i<count($_SESSION["Mass"]);$i++) {
						
						
							$mass=$_SESSION["Mass"][$i];
						echo '<li class="col-lg-12 padding-0">';
							echo '<form method="post"  id="form_id'.$mass["ID"].'">';
								echo '<input hidden name="ID" value="'.$mass["ID"].'">
							<div class="col-lg-4 cart-left-full">';
								echo '<button onclick="AjaxFormRequest(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/clearTovar.php\');return false;" class="remove-product">' .'</button>

								
								<img src="'.$mass["Image"].'">
							</div>
							<div class="prod-desc-cart col-lg-8">
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
			</div>
		</div>
		<div class="stop-scroll"></div>
	</div>
</div>
<?php get_footer(); ?>
<script>
(function(){
var a = document.querySelector('.start-to-fix'), b = null, P = 160;  // если ноль заменить на число, то блок будет прилипать до того, как верхний край окна браузера дойдёт до верхнего края элемента. Может быть отрицательным числом
window.addEventListener('scroll', Ascroll, false);
document.body.addEventListener('scroll', Ascroll, false);
function Ascroll() {
  if (b == null) {
    var Sa = getComputedStyle(a, ''), s = '';
    for (var i = 0; i < Sa.length; i++) {
      if (Sa[i].indexOf('overflow') == 0 || Sa[i].indexOf('padding') == 0 || Sa[i].indexOf('border') == 0 || Sa[i].indexOf('outline') == 0 || Sa[i].indexOf('box-shadow') == 0 || Sa[i].indexOf('background') == 0) {
        s += Sa[i] + ': ' +Sa.getPropertyValue(Sa[i]) + '; '
      }
    }
    b = document.createElement('div');
    b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
    a.insertBefore(b, a.firstChild);
    var l = a.childNodes.length;
    for (var i = 1; i < l; i++) {
      b.appendChild(a.childNodes[1]);
    }
    a.style.height = b.getBoundingClientRect().height + 'px';
    a.style.padding = '0';
    a.style.border = '0';
  }
  var Ra = a.getBoundingClientRect(),
      R = Math.round(Ra.top + b.getBoundingClientRect().height - document.querySelector('.footer').getBoundingClientRect().top + 25);  // селектор блока, при достижении верхнего края которого нужно открепить прилипающий элемент;  Math.round() только для IE; если ноль заменить на число, то блок будет прилипать до того, как нижний край элемента дойдёт до футера
  if ((Ra.top - P) <= 0) {
    if ((Ra.top - P) <= R) {
      b.className = 'stop';
      b.style.top = - R +'px';
    } else {
      b.className = 'sticky';
      b.style.top = P + 'px';
    }
  } else {
    b.className = '';
    b.style.top = '';
  }
  window.addEventListener('resize', function() {
    a.children[0].style.width = getComputedStyle(a, '').width
  }, false);
}
})()
</script>
<script type="text/javascript">
    $(document).ready(function(){

    	var liProduct = $('#product-list ul li'),
    		BtnPlus = $('.plus-cart'),
     		thisBtnMinus = $('.minus-cart');

     		liProduct.each(function(){
     			var startCount = $(this).find('.count-cart').val();
     			$(this).find('.count-php').text(startCount);
     		});

        thisBtnMinus.click(function(event){
        	event.preventDefault();
        	var thisValue = $(this).parent().parent().find('.count-cart').val();
            thisValue--;        
            if( thisValue < 1 ){
              thisValue = 1;
            }
            $(this).parent().parent().find(".count-cart").val(thisValue);
            $(this).parent().parent().find('.count-php').text(thisValue);
        });
		BtnPlus.click(function(event){
			var thisValue = $(this).parent().parent().find('.count-cart').val();
            event.preventDefault();
            thisValue++;
            $(this).parent().parent().find(".count-cart").val(thisValue);
            $(this).parent().parent().find('.count-php').text(thisValue);
        });

    });
 </script>

<script type="text/javascript">
	$(document).ready(function(){
		var cartBtn = $("#cart"),
			menuUl = $("#magazine-list"),
			cartDiv = $("#product-cart"),
			closeBtn = $(".close-cart");

			function slowOpenCart(){
				$("#product-list").slideToggle( "slow" );
			}

			function slowCloseCart(){
				cartDiv.removeClass('show');
				menuUl.removeClass('hide-ul');
			}

			cartBtn.click(function(){
				if(cartDiv.hasClass('show')){
					$("#product-list").slideToggle("slow" );
					setTimeout(slowCloseCart, 1000);
					
					
				} else {
					menuUl.addClass('hide-ul');
					cartDiv.addClass('show');
					setTimeout(slowOpenCart, 1000);
				}
			});

			closeBtn.click(function(){
				$("#product-list").slideToggle("slow" );
				setTimeout(slowCloseCart, 1000);
			});

				
	});
</script>
