<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );
function custom_meta_boxes() {

	$home_metabox = array(
    'id'        => 'home_metabox',
    'title'     => 'Контент страницы',
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
		  array(
			'id'          => 'home_desc',
			'label'       => __( 'Описание', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'home_gallery',
			'label'       => __( 'Галерея', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'gallery',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'home_gallery_desc',
			'label'       => __( 'Описание галереи', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'home_services',
			'label'       => __( 'Услуги', 'theme-text-domain' ),
			'desc'        => __( '', 'theme-text-domain' ),
			'std'         => '',
			'type'        => 'list-item',
			'section'     => 'option_types',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and',
			'settings'    => array( 
			  array(
				'id'          => 'image',
				'label'       => __( 'Изображение', 'theme-text-domain' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'upload',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			  array(
				'id'          => 'price',
				'label'       => __( 'Цена', 'theme-text-domain' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			  array(
				'id'          => 'data_url',
				'label'       => __( 'Data-URL', 'theme-text-domain' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			  array(
				'id'          => 'link',
				'label'       => __( 'Ссылка', 'theme-text-domain' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			)
		  ),
		  array(
			'id'          => 'club_image',
			'label'       => __( 'Клубные карты изображение', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'upload',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'club_desc',
			'label'       => __( 'Клубные карты', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photo_image',
			'label'       => __( 'Фото конкурс изображение', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'upload',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'photo_desc',
			'label'       => __( 'Фото конкурс', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		)
	);

	$abonement_metabox = array(
    'id'        => 'abonement_metabox',
    'title'     => 'Контент страницы',
    'desc'      => '',
    'pages'     => array( 'page' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
		  array(
			'id'          => 'card_image_bronze',
			'label'       => __( 'Изображение (Бронзовая)', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'upload',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'card_desc_bronze',
			'label'       => __( 'Описание (Бронзовая)', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'card_image_silver',
			'label'       => __( 'Изображение (Серебрянная)', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'upload',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'card_desc_silver',
			'label'       => __( 'Описание (Серебрянная)', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'card_image_gold',
			'label'       => __( 'Изображение (Золотая)', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'upload',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'card_desc_gold',
			'label'       => __( 'Описание (Золотая)', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		  array(
			'id'          => 'card_alert',
			'label'       => __( 'Дисклеймер', 'theme-text-domain' ),
			'desc'        => '',
			'std'         => '',
			'type'        => 'textarea',
			'post_type'   => '',
			'taxonomy'    => '',
			'min_max_step'=> '',
			'class'       => '',
			'condition'   => '',
			'operator'    => 'and'
		  ),
		)
	);
  
  
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	$template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
	if ($template_file == 'template-home.php') {
		ot_register_meta_box( $home_metabox );
	} elseif ($template_file == 'page-abonement.php') {
		ot_register_meta_box( $abonement_metabox );
	}
}