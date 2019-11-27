<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'admin' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'pwd' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>`lQS4bL4r-n|}c0tsJByjU2:+xVWJtmn/J8lYbF4n;CH>d`1in-(ll0)X p/me^' );
define( 'SECURE_AUTH_KEY',  'Z;!k#oq>=.sYFx_%o&fUU<1KO.lxc/^-I)`8U}n@)X_wb;u}So@8hW,Sc8-3OA|e' );
define( 'LOGGED_IN_KEY',    'S>NNHp:,OPMJTr!s.>.]LDXyaeV|L?7Uj0Qu<2,Z+]?NUK)|65]mV-%x,m+C~fKW' );
define( 'NONCE_KEY',        'W{&7o5.!;tO~()NRY?|]4fO7O(=tEo_lT5&Km[1JxWs=vEMvwX<f1wX9G;;lhuj(' );
define( 'AUTH_SALT',        '3|d:NR|SDh#? RH~?MuB&uuUd;%3xa]~)OV(3dUf6h?3F&W:F#9$@.=rnPz) &~?' );
define( 'SECURE_AUTH_SALT', 'qz(tQ~2R&.x2iZ>KFym~h<Ze=f|D(YqT|OVg]R 9MWR3C8AE/(`FgCYEM*eBoHHF' );
define( 'LOGGED_IN_SALT',   'JQ1Hb?dJXds4]xZ#_}BV F#XUE}AR6TGQ5<B(&GH&M%GXI(b0N{c=$OjC)51C@Lx' );
define( 'NONCE_SALT',       ' _LD`^y=p{sw@=0>cmBk.PhI-*Zer2}bps(}kN$zc&A*)Lzl9oD@wPtgG]/e4g57' );
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
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
