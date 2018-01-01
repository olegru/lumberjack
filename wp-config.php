<?php
define('WP_CACHE', true); // Added by WP Rocket
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'lumberjack_db');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'usbw');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bM.]88?]jMl]&/`-8`?_kq1|y0rD$.Q1TbhNU4br*jh}I5E|L^`X}_Te$IVk$[T6');
define('SECURE_AUTH_KEY',  'dz1!zVl@g{V0!l]Y!:G26J[rn98YI*PF`0%-JevFPU9nt+#o&xe+-+JB.!U62Xrk');
define('LOGGED_IN_KEY',    'NZ+;*r1gimMqMUgf74CGJP$W0ZC^gz.gR@kNfoIpCDwadq~*i+V<*|B?{X@BN+>3');
define('NONCE_KEY',        'u:l6ar=/86l7h L H(YmDEm7)uIVAOpswC To|3e8;ceyh<</,v#,:dEV|^yZij0');
define('AUTH_SALT',        '-[R#0TT(yDNB]`04g+v6>7|Got1CbOM/FezY{m(--`-Bu|8>jSH=`~K)%)CWKXn1');
define('SECURE_AUTH_SALT', ',C|BH.u|zd9US~>wr3H;{&J(^p|#.ufIs{i;m`?Gr4G/EgLL;Y[]9&/.1vm59x}Z');
define('LOGGED_IN_SALT',   'NG7_3OHKIwKsqO|_dGkCAImbF+R$/M2iP=9L3#W+qhtr}9^[(lK&|t1&ydYY;URa');
define('NONCE_SALT',       '#7+z(*wXB-1DH|ex dtfVFgKS.P2N$Rnlgk~~[zwiwB<q/6<I,3jsFWY08au5cu,');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
