<?php

require ( get_template_directory() . '/custom-metaboxes.php' );

show_admin_bar(false);

add_theme_support( 'post-thumbnails' );

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );



function equip_2_widgets_init() {
  register_sidebar( array(
	'id' => 'equip_2',
    'name' => 'Фотогалерея Главная',
    'class' => 'fr-galary',
    'description' => 'Добавьте текущий и предыдущий месяц фотогалереи!',
    'before_widget' => '<li class="col-lg-6">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
  ) );
}
add_action( 'widgets_init', 'equip_2_widgets_init' );


function equip_3_widgets_init() {
  register_sidebar( array(
	'id' => 'equip_3',
    'name' => 'Сайдбар Фотогалерея',
    'class' => 'fr-galary',
    'description' => 'Вы можите добавить любое кол-во месяцов и добавленая информация появится на странице "Фотогалереи" кажого месяца в левом сайдбаре!',
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
  ) );
}
add_action( 'widgets_init', 'equip_3_widgets_init' );


function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404

  $show_current = 1; // 1 - показывать название текущей статьи/страницы/рубрики, 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_home_link = 0; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_title = 1; // 1 - показывать подсказку (title) для ссылок, 0 - не показывать
  $delimiter = ' > '; // разделить между "крошками"
  $before = '<span class="current">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_link = home_url('/');
  $link_before = '<span typeof="v:Breadcrumb">';
  $link_after = '</span>';
  $link_attr = ' rel="v:url" property="v:title"';
  $link = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
  $parent_id = $parent_id_2 = $post->post_parent;
  $frontpage_id = get_option('page_on_front');

  if (is_home() || is_front_page()) {

    if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';

  } else {

    echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
    if ($show_home_link == 1) {
      echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
      if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
    }

    if ( is_category() ) {
      $this_cat = get_category(get_query_var('cat'), false);
      if ($this_cat->parent != 0) {
        $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
        if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
        $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
        $cats = str_replace('</a>', '</a>' . $link_after, $cats);
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
        echo $cats;
      }
      if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

    } elseif ( is_search() ) {
      echo $before . sprintf($text['search'], get_search_query()) . $after;

    } elseif ( is_day() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $delimiter);
        if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
        $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
        $cats = str_replace('</a>', '</a>' . $link_after, $cats);
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
        echo $cats;
        if ($show_current == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $delimiter);
        $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
        $cats = str_replace('</a>', '</a>' . $link_after, $cats);
        if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $delimiter;
        }
      }
      if ($show_current == 1) {
        if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
        echo $before . get_the_title() . $after;
      }

    } elseif ( is_tag() ) {
      echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $before . sprintf($text['author'], $userdata->display_name) . $after;

    } elseif ( is_404() ) {
      echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      echo get_post_format_string( get_post_format() );
    }

    

    echo '</div><!-- .breadcrumbs -->';

  }
} // end dimox_breadcrumbs()


function true_russian_date_forms($the_date = '') {
  if ( substr_count($the_date , '---') > 0 ) {
    return str_replace('---', '', $the_date);
  }
  // массив замен для русской локализации движка и для английской
  $replacements = array(
    "Январь" => "января", // "Jan" => "января"
    "Февраль" => "февраля", // "Feb" => "февраля"
    "Март" => "марта", // "Mar" => "марта"
    "Апрель" => "апреля", // "Apr" => "апреля"
    "Май" => "мая", // "May" => "мая"
    "Июнь" => "июня", // "Jun" => "июня"
    "Июль" => "июля", // "Jul" => "июля"
    "Август" => "августа", // "Aug" => "августа"
    "Сентябрь" => "сентября", // "Sep" => "сентября"
    "Октябрь" => "октября", // "Oct" => "октября"
    "Ноябрь" => "ноября", // "Nov" => "ноября"
    "Декабрь" => "декабря" // "Dec" => "декабря"
  );
  return strtr($the_date, $replacements);
}
 
// если хотите, вы можете приминить только некоторые из фильтров
add_filter('the_time', 'true_russian_date_forms');
add_filter('get_the_time', 'true_russian_date_forms');
add_filter('the_date', 'true_russian_date_forms');
add_filter('get_the_date', 'true_russian_date_forms');
add_filter('the_modified_time', 'true_russian_date_forms');
add_filter('get_the_modified_date', 'true_russian_date_forms');
add_filter('get_post_time', 'true_russian_date_forms');
add_filter('get_comment_date', 'true_russian_date_forms');

/* Подсчет количества посещений страниц
---------------------------------------------------------- */


/* текст кнопки "добавить в корзину" */

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
 
function woo_custom_cart_button_text() {
 
        return __( 'в корзину', 'woocommerce' );
 
}

//  editM
add_action('woocommerce_before_shop_loop_item', 'remove_link', 1);
function remove_link() {
  remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
}

global $sitepress;
remove_action('wp_head', array($sitepress, 'head_langs'));

?>