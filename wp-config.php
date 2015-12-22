<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 * 
 * Ce fichier contient les configurations suivantes :
 * 
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php 
 * 
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cegequip');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/56mUh|s` l@dNY|8;etT<Ze<bA6 *|?rBwv~h?+Jqx-:f:6|?dXIzyS.TC`u3}H');
define('SECURE_AUTH_KEY',  '(a8B=y6F/X~4QyL]fX}7X&d?<TzTaB;MHK|@0!+M+G>{!D(&yH1m:ZMRr&Ny H&k');
define('LOGGED_IN_KEY',    'l9=miAVz,ZiX#wQM+ex<|b!M/?|8h|+~2/%}-m<l/:}Gzb@ml.9WD#uJ,&glw53B');
define('NONCE_KEY',        '&4RC+ |>0gvc-VpQ6/XdgV~BENa,$g%1W6L^|i/|y3Hm&(U/&jhM|?o~bJQzl:9x');
define('AUTH_SALT',        '7cm8Am 40SC|jKO7Z H-8!Wf%W^v#vwT)D`TM|{w[POz(&S9exuJ6U-B:Yz_ Dj/');
define('SECURE_AUTH_SALT', 'iM^jO9~EDKuRukdEN(1)qN7xd:EPTa>#}+yM9A3mQ[De_s7ot*ljxCX6n2b&rX~ ');
define('LOGGED_IN_SALT',   'sK?#yZUVV,n/y!6D4=+2YkzJsxs7b]2r+t*A<xu822u[|:FZ~#}cehsl|$Hr2~N-');
define('NONCE_SALT',       '3TW](uu3c)AWh7P9GGO*.Zr%NY_2uD3r2OzSawYxbh9~e#$#vnncK5h]{E+g)hfB');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'ja_';

/** 
 * Pour les développeurs : le mode déboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 * 
 * Pour obtenir plus d'information sur les constantes 
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');