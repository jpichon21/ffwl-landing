<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp_ffwl' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Cacao' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0E2eVEaLdS}uh{Z#@7aC:#aE2tAr;M_QX)zLaE/!_EdwdE$E11)5xh?s-t/?oF</' );
define( 'SECURE_AUTH_KEY',  'S>`:0E_Fbrh`dJ-u6GCf@[.(!~~{O;0xwR71C|C01wPupDrz-0|vi0?!+t+_LS60' );
define( 'LOGGED_IN_KEY',    'sBD/k(>Lt>Lw^c[O~^^|7/RIL8DjUZ93p%+O:5>;dP8`g.7S+4S[l03ld/leDAlN' );
define( 'NONCE_KEY',        '|)8X*j::1xDUlHGy:q7;dV=?(9KAm<3d7:!V?`l2Q4%q#-@;_4K_n>f.FD}T?5n`' );
define( 'AUTH_SALT',        'D%2N73345?*7O)QFZKd+PtBc^uY{Kj!l}A!Acd3n`20jxw CM_c. 4Nih{3_@zYb' );
define( 'SECURE_AUTH_SALT', ')y2)N4v)5<~HG$3vb>mHP7FlVQv+,NEUpH@bj*5@>1Y88#RG37u<RiUKWa[P>I$@' );
define( 'LOGGED_IN_SALT',   '/snbD%YjQf)qUszJ#:wjM+QK[d#f&5AJ)>BJ5f0;m>::Q=H$&s]hBs!Y^A>EpyB ' );
define( 'NONCE_SALT',       'E@[3Yf86[`8Qo>v6s!RA)Vo(Yf#(s:0Z<Ow3(5a>-YR6MT6W`2zJwL4-+*M/xvpg' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

  define('FS_METHOD', "direct");

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
