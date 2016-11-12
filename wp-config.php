<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'ids_feria');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'tiburon');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', '127.0.0.1');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '(Y/$e<2[_:HP.mua`@8*lHl6+3E^F~uOYNxAc efbl;(z-=G]u^%_HS}x7:~2q+>');
define('SECURE_AUTH_KEY', '(F %^4^}v!:C[0+T< Ovyod8I:n3y^uuf{y 1Iufb>%KNqW*g<QI uPrXd6Ew3ar');
define('LOGGED_IN_KEY', '1>Y.wucITnd0_?Y2Lf~^z7,sK82}#6Ze3m@`_$;Bu-SMzRLDttTr*xM~qiw`](`+');
define('NONCE_KEY', ' _!&uebFnC+0K;Ha0mt;fPv,M4iSKOd5wy!%<NKl[J^j|]$p|,j4akW*9zRf_:S+');
define('AUTH_SALT', 'Vh(p=KJ7f(o4ItKRO{3=q6M_4A|CH![$]*o1ym9d9Bq}c5h?bdW~ej4Oh*4OBCR]');
define('SECURE_AUTH_SALT', 'tUd)f /)#g/zglY+:|0~|~va&5/kJ?7,1^>an+;SWn#H.%%m8-COk/IHfB_l2~rt');
define('LOGGED_IN_SALT', 'aDWO0)BuyhVBh{y<MYUhV-w-`45T#ie?W:n```WGeUds~--y%}W!QuUXZIrjsC^-');
define('NONCE_SALT', 'lsd55.2!#8=}VR,>P2VUzgnt*q6o_(TZ-IBCEu3)00nkiA%>z{e5(nGv}*M!LnM.');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

