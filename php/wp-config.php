<?php
function env($k, $default = null) {
    $v = getenv($k);
    return ($v !== false && $v !== '') ? $v : $default;
}

if (!function_exists('define_if_missing')) {
    function define_if_missing($k, $v) { if (!defined($k) && $v !== null && $v !== '') define($k, $v); }
}

define_if_missing('DB_NAME',     env('WORDPRESS_DB_NAME',     'wordpress'));
define_if_missing('DB_USER',     env('WORDPRESS_DB_USER',     'wordpress'));
define_if_missing('DB_PASSWORD', env('WORDPRESS_DB_PASSWORD', 'password'));
define_if_missing('DB_HOST',     env('WORDPRESS_DB_HOST',     'database:3306'));
define_if_missing('DB_CHARSET', 'utf8mb4');
define_if_missing('DB_COLLATE', '');

$table_prefix = env('WORDPRESS_TABLE_PREFIX', 'wp_');

/** Performance/Production */
define_if_missing('WP_CACHE', true);
define_if_missing('WP_POST_REVISIONS', 5);
define_if_missing('WP_MEMORY_LIMIT', '1024M');
define_if_missing('WP_MAX_MEMORY_LIMIT', '1024M');
@set_time_limit(300);
define_if_missing('DISABLE_WP_CRON', true);
define_if_missing('FS_METHOD', 'direct');

define_if_missing('WP_DEBUG', false);
define_if_missing('WP_DEBUG_LOG', false);
define_if_missing('WP_DEBUG_DISPLAY', false);
define_if_missing('AUTOMATIC_UPDATER_DISABLED', true);
define_if_missing('WP_AUTO_UPDATE_CORE', 'minor');

/** Redis Object Cache */
define_if_missing('WP_REDIS_HOST', env('WORDPRESS_REDIS_HOST', 'redis'));
define_if_missing('WP_REDIS_PORT', env('WORDPRESS_REDIS_PORT', '6379'));
define_if_missing('WP_REDIS_TIMEOUT', 1.0);
define_if_missing('WP_REDIS_READ_TIMEOUT', 1.0);

/** Authentication-Keys and -Salts.
  - Generate values once, e.g. via: https://api.wordpress.org/secret-key/1.1/salt/
  - Insert them here. On rotation, all users will be logged out.
*/
define_if_missing('AUTH_KEY',         'H[v ;-E;A72h3Jf$[O+Rci#S=GZinVw j6>xJ9opIG,*{33OnS:4CvR1RQCR/,&h');
define_if_missing('SECURE_AUTH_KEY',  '0Lk|:+Di~H8wReXfsGz>LMz=@@.RzCsAPFWW)I+n9:V4h6}Db;{aoIKhKQDW||z{');
define_if_missing('LOGGED_IN_KEY',    'u^E+|C=*S?kQ,a>^7{c&z9|+}A=JwFe&K4,SM&8F20Yu5o].|+ZT|ON~@YQX<2.N');
define_if_missing('NONCE_KEY',        '3-%:eH%MC1s8!L:UjF?3z-R.r-In)f`7*ef>39h -QkZRje-{$yX+A=32|>np%!}');
define_if_missing('AUTH_SALT',        'gB4[~(by2nIuN&Dbk3t?87yswe_vZ8d;gXXHLl}!aC.SYBI[10c,p1W^|QXM=Hec');
define_if_missing('SECURE_AUTH_SALT', '7-! -KMf1YDAz649M+LXpY=5|Zn%JyNtf#TJ9*tJoTq$b@PTY%=<(L})@ <IdLhf');
define_if_missing('LOGGED_IN_SALT',   '4Ih#m(+7Ny{fp-2vQ.S-B)pMjLA-#^Z/VfcO0!<O+.IS2?Vi$MWjw6E`XGg!Z_}?');
define_if_missing('NONCE_SALT',       '0h6+,m,17t^bP-ojI+{6Z<97`(*1cjDd664o^R|ns6]>z{PKEC?jJV<V^}2+&!TA');

/** Absoluter Pfad zum WordPress-Verzeichnis. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** WordPress-Variablen und inkludierte Dateien einbinden. */
require_once ABSPATH . 'wp-settings.php';
?>