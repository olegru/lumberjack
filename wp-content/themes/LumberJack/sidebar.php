<div class="header">
	<div class="logo">
		<a href=" <?php echo 'http://lumberjack.style/'; ?> ">
			<img src="<?php bloginfo('template_url'); ?>/img/icon_logo.svg">
		</a>
	</div>
	<?php
		wp_nav_menu(array('menu_class' => 'mainmenu'));
		//wp_nav_menu('menu=menu-menu-en');      
	?>
<a class="enrol-btn ms_booking <?php echo "enClass"; ?>" href="#" onclick="ga('send', 'event', 'Click', 'Open');">
		<div class="btn-bg"></div>
		<span>
			<?php
				if (qtranxf_getLanguage() == 'en') {
					echo "Enroll online";
				} elseif (qtranxf_getLanguage() == 'ru') {
					echo "Записаться";
				} elseif (qtranxf_getLanguage() == 'ua') {
					echo "Записатись";
				}   
			?>
		</span>
	</a>
	<ul id="social-sidebar">
		<li><a rel="nofollow" class="fb" href="https://www.facebook.com/lumberjack.barberhouse" target="_blank"></a></li>
		<li><a rel="nofollow" class="inst" href="https://www.instagram.com/lumberjack.barberhouse" target="_blank"></a></li>
		<li><a rel="nofollow" class="youtube" href="https://www.youtube.com/channel/UC2EAtSCyCN_S4vne_K947mg" target="_blank"></a></li>
            <li><a rel="nofollow" class="googlePlus" href="https://plus.google.com/u/0/112931325223792076947" target="_blank"></a></li>
	</ul>
	<div class="selectLang">
		<?php
			echo qtranxf_generateLanguageSelectCode('text');
		?>
		<script>jQuery(document).ready(function(){ jQuery('.lang-en a span').html('EN'); jQuery('.lang-ua a span').html('UA');  jQuery('.lang-ru a span').html('RU'); })</script>
	</div>
</div>