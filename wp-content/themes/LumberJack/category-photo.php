<?php get_header(); ?>
<div class="container-fluid padding-0">
	<?php get_sidebar('sidebar'); ?>
	<div class="content-pages col-lg-10 col-xs-12 col-md-12">
		<div class="top-pages-icon margin-0 col-lg-12">
			<img class="hidden-md hidden-xs" src="<?php bloginfo('template_url'); ?>/img/page_top_icon.png">
			<div class="breadcrumbs">
				<span><a href="/fotogalereya/">Фотогалерея</a></span> > <span class="current"><?php single_cat_title(); ?></span>
			</div>
		</div>
		<ul id="photo-list" class="col-lg-9 col-xs-12 col-md-12" style="z-index:999999999;">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<div class="title">
					<?php the_title(); ?>
				</div>
				<img class="lumb-image" <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?> src="<?php echo $image_url[0]; ?>">
				<div class="post-desc col-lg-12 col-xs-12 col-md-12">
					<div class="date col-lg-2 col-xs-12 col-md-12">
						<?php the_time('j F, Y'); ?>
					</div>
					<div class="social-buttons col-lg-10 col-xs-12 col-md-12">
						<div class="fb-like" data-href="<?php echo get_permalink($value['id']); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false" data-ref="none"></div>
						<div id="vk_like_<?php echo get_the_ID(); ?>" class="vk_widget_lumber"></div>
						<script type="text/javascript">
						    VK.Widgets.Like("vk_like_<?php echo get_the_ID(); ?>", {type: "mini", height: 24, pageUrl: "<?php echo get_permalink($value['id']); ?>"});
						</script>
					</div>
				</div>
			</li>
		<? endwhile; endif; ?>
		</ul>
		<div class="col-lg-3 hidden-xs hidden-md" style="padding:0 0 0 30px;">
			<div class="sidebar-galery col-lg-12 padding-0">
				<ul>
					<?php dynamic_sidebar( 'Сайдбар Фотогалерея' ); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.sidebar-galery ul li img').removeAttr('width').removeAttr('height');
	});
</script>
<script>
(function(){
var a = document.querySelector('.sidebar-galery'), b = null, P = 0;  // если ноль заменить на число, то блок будет прилипать до того, как верхний край окна браузера дойдёт до верхнего края элемента. Может быть отрицательным числом
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
      R = Math.round(Ra.top + b.getBoundingClientRect().height - document.querySelector('.footer').getBoundingClientRect().top + 450);  // селектор блока, при достижении верхнего края которого нужно открепить прилипающий элемент;  Math.round() только для IE; если ноль заменить на число, то блок будет прилипать до того, как нижний край элемента дойдёт до футера
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