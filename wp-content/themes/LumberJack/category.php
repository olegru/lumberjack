<?php

$post = $wp_query->post;

if ( in_category('20') || in_category('25') || in_category('21') || in_category('22') || in_category('25') || in_category('24') || in_category('23') || in_category('26') ) {

	include(TEMPLATEPATH . '/category-sale.php');

} else if ( in_category('4') || in_category('8') || in_category('15') || in_category('11') || in_category('19') || in_category('14') || in_category('13') || in_category('12') || in_category('10') || in_category('18') || in_category('17') || in_category('16') ) {

	include(TEMPLATEPATH . '/category-photo.php');

}

?>