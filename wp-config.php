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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_site' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '$?^>f.J=ce>vyNschasod-2FTN9|z$6xEz6]YkPiXkW=.(3D)OWk2Ut5v(V:tkU$' );
define( 'SECURE_AUTH_KEY',  'wj8wg*7JsnWG)8}Ud*)gZ>cueJb. gA{|nJ6]&w`BPLWjyK[_@46r^SBFKwhPj9h' );
define( 'LOGGED_IN_KEY',    '{p8Nh`i&~A[Bp7tM0zv0b!@9RBmsV8>cAV~y<oKL5*(RoF.>%^+1EfP57L!*GEL#' );
define( 'NONCE_KEY',        '>dvZ~t!}Ty5ey=<zy6+^5S;gFn9[P7cAuTf%[.VfSS9^F. k@66#8aI[vbsvG(4x' );
define( 'AUTH_SALT',        '08eitS;<<LCL^V4><v5@v&;[yjRXfh!t{JyMdt0)is>igYTCZyx{?Gx6%fDk}T$n' );
define( 'SECURE_AUTH_SALT', 'c{}x<=]+i|W@`a)~fzyfHwt=(:eamuQyIZ[dL1}K|,7+,~bfuQ t|?4w_VC~OwW]' );
define( 'LOGGED_IN_SALT',   'tXV H@ F[RVc*w.w36*lj-6`AA!!dBo(t6}5oq3|Ij^(L1t5+V+Z5xh@ R;ese6`' );
define( 'NONCE_SALT',       '$xrJl9z9bH7{DR]t1I<o0rH>Z5iY)f%8ayv|<Ke;3  <[T_$f^/>0z`HQ> o(}}K' );

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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
