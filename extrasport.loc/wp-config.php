<?php
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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'extrasport' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'T/!dG`!Y_^Xi9a~LU OxvCgVcvWtlhUvmUUtL8U<h!tTeDJ&i|tQtL*}.D+E{{vj' );
define( 'SECURE_AUTH_KEY',  '`/{@bA[ILsKc0OOh9i5E,-VUrdgLo<,3|pq<pLbQ=AlkD`Mb?~4.vRpU.YF]_)nb' );
define( 'LOGGED_IN_KEY',    '4jUm{tEyml={_d]eEs4HP]ZRno)5.4qEt~F r7IvjR=KeRoOl};%(T!@E[FV,,V$' );
define( 'NONCE_KEY',        's H#|eHi3`~`d}:_])<EX]w[[XQ?*.:+}n!g!hdpOGc:y(P31$ygvf`%|Cltv[-(' );
define( 'AUTH_SALT',        'Uf6s7bQ@wwl#V!{9YDour*q~;|%0J(tniUf>EU<-WhLY; SHZ$mrl5Yoo[__mbz/' );
define( 'SECURE_AUTH_SALT', 'wi],_d3aK^0p`DaCX(s`.+3Nl)T:v@<Q7T`+yekq.M0w0}YxUX`3Xh_ALIa)B6DV' );
define( 'LOGGED_IN_SALT',   ']R%iGLMaY;i->EPe;*JsnPK(VSrSC,@-U?ibi/Q_!10HESA)w%0k`SL82%<3,8+C' );
define( 'NONCE_SALT',       'zDyD}U6XYNx.(RZgaJ^Oen?dM;M00:,L2x0Cj*l(O,;|~D0mAWBTc5jR}}EdjJV{' );
define( 'WPCF7_AUTOP', false );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
