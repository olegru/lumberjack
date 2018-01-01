<?php get_header(); ?>
<div class="container-fluid padding-0">
	<?php get_sidebar('sidebar'); ?>
	<div class="content-pages col-lg-10">
		<div class="top-pages-icon margin-0 col-lg-12 hidden-xs hidden-md">
			<img src="<?php bloginfo('template_url'); ?>/img/page_top_icon.png">
		</div>
		<ul id="month-class" class="col-lg-12 col-xs-12 col-md-12">
			<?php
				 //  $categories = get_categories('child_of=4&orderby=id');
				 //  foreach ($categories as $category) {

					// $option = '<a href="/category/magazin/'.$category->category_nicename.'/">';
					// $option .= $category->cat_name;
					// $option .= ' ('.$category->category_count.')';
					// $option .= '</a>';
					// echo $option;
				 //  }



				  $args = array(
				 'parent' => 0,
				 'hide_empty' => 0,
				 'exclude' => '', // ID рубрики, которую нужно исключить
				 'number' => '0',
				 'orderby' => 'count',
				 'order' => 'DESC',
				 'taxonomy' => 'category', // таксономия, для которой нужны изображения
				 'pad_counts' => true
				);
				$catlist = get_categories('child_of=4&orderby=id'); // получаем список рубрик

				foreach($catlist as $categories_item){
				 
				 // получаем данные из плагина Taxonomy Images
				 $terms = apply_filters('taxonomy-images-get-terms', '', array(
				 'taxonomy' => 'category' // таксономия, для которой нужны изображения
				 ));
				 
				 if (!empty($terms)){
				 	foreach((array)$terms as $term){
				 		if ($term->term_id == $categories_item->term_id){
				 			// выводим изображение рубрики
				 			print '<li class="col-lg-3 col-xs-12 col-md-12"><div class="month-wrap"><a href="' . esc_url(get_term_link($term, $term->taxonomy)) . '" title="Нажмите, чтобы перейти в рубрику">' . wp_get_attachment_image($term->image_id, 'full');

				 		}
				 	}
				 }

				 // выводим название рубрики
					$option = '<div class="title"><span class="cat-name">'.$categories_item->cat_name.'</span></div></a>';
					echo $option;
					$second_row = '<div class="cat-desc-bottom">';
					// $second_row .= '<span class="view-mode"> Кол-во: ()</span>';
					$second_row .= '<span class="post-count">'.$categories_item->category_count.'</span>';
					$second_row .= '</div></div>';
					$second_row .= '</li>';
					print $second_row;
				 }

			?>
		</ul>
	</div>
</div>
<?php get_footer(); ?>
