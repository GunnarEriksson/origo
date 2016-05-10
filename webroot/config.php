<?php
/**
 * Config-file for Origo. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Define Origo paths.
 *
 */
define('ORIGO_INSTALL_PATH', __DIR__ . '/..');
define('ORIGO_THEME_PATH', ORIGO_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(ORIGO_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();


/**
 * Create the Origo variable.
 *
 */
$origo = array();

/**
 * Theme related settings.
 *
 */
$origo['stylesheets'][] = 'css/style.css';
$origo['favicon']    = 'favicon.ico';

/**
 * Site wide settings.
 *
 */
$origo['lang']         = 'sv';
$origo['title_append'] = ' | oophp';

/**
 * The header for the website.
 */
$origo['header'] = <<<EOD
<img class='sitelogo' src='img/origo.png' alt='Origo Logo'/>
<span class='sitetitle'>Origo webbmall</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

/**
 * The webpages for this website. Used by the navigation bar.
 *
 */
$menu = array(
    // Use for styling the menu
    'class' => 'navbar',

    // Here comes the menu structure
    'items' => array(
        // This is a menu item
        'me'  => array(
            'text'  =>'Hem',
            'url'   =>'me.php',
            'title' => 'Min me-sida'
        ),

        // This is a menu item
        'dice'  => array(
            'text'  =>'Tärningsspel',
            'url'   =>'dice.php',
            'title' => 'Tärningsspel'
        ),

        // This is a menu item
        'calendar'  => array(
            'text'  =>'Kalender',
            'url'   =>'calendar.php',
            'title' => 'Kalender'
        ),

        // This is a menu item
        'movie'  => array(
            'text'  =>'Film',
            'url'   =>'movie.php',
            'title' => 'Film'
        ),

        // This is a menu item
        'content'  => array(
            'text'  =>'Sidor/Blogg',
            'url'   =>'',
            'title' => '',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => array(

                'items' => array(
                    // This is a menu item of the submenu
                    'item 1'  => array(
                        'text'  => 'Allt innehåll',
                        'url'   => 'content_view.php',
                        'title' => 'Allt innehåll'
                    ),

                    // This is a menu item of the submenu
                    'item 2'  => array(
                        'text'  => 'Blogg',
                        'url'   => 'content_blog.php',
                        'title' => 'Blogg',
                    ),

                    // This is a menu item of the submenu
                    'item 3'  => array(
                        'text'  => 'Nytt innehåll',
                        'url'   => 'content_create.php',
                        'title' => 'Nytt innehåll',
                    ),

                    // This is a menu item of the submenu
                    'item 4'  => array(
                        'text'  => 'Återställ DB',
                        'url'   => 'content_reset.php',
                        'title' => 'Återställ DB',
                    ),
                ),
            ),
        ),

        // This is a menu item
        'textfilter'  => array(
            'text'  =>'Textfilter',
            'url'   =>'textfilter.php',
            'title' => 'Textfilter'
        ),

        // This is a menu item
        'gallery'  => array(
            'text'  =>'Galleri',
            'url'   =>'gallery.php',
            'title' => 'Galleri'
        ),

        // This is a menu item
        'report'  => array(
            'text'  =>'Redovisning',
            'url'   =>'report.php',
            'title' => 'Redovisning'
        ),

        // This is a menu item
        'admin'  => array(
            'text'  =>'Admin',
            'url'   =>'',
            'title' => '',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => array(

                'items' => array(
                    // This is a menu item of the submenu
                    'item 1'  => array(
                        'text'  => 'Login',
                        'url'   => 'login.php',
                        'title' => 'Login'
                    ),

                    // This is a menu item of the submenu
                    'item 2'  => array(
                        'text'  => 'Logout',
                        'url'   => 'logout.php',
                        'title' => 'Logout',
                    ),

                    // This is a menu item of the submenu
                    'item 3'  => array(
                        'text'  => 'Status',
                        'url'   => 'status.php',
                        'title' => 'Inloggningstatus',
                    ),
                ),
            ),
        ),

        // This is a menu item
        'source' => array(
            'text'  =>'Källkod',
            'url'   =>'source.php',
            'title' => 'Källkod | oophp'
        ),
    ),

    // This is the callback tracing the current selected menu item base on scriptname
    'callback' => function($url) {
        if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
            return true;
        }
    }
);

 /**
 * Settings for the database.
 *
 */
if (isset($_SERVER['REMOTE_ADDR'])) {
    if($_SERVER['REMOTE_ADDR'] == '::1') {
        $origo['database']['dsn']            = 'mysql:host=localhost;dbname=Movie;';
        $origo['database']['username']       = 'root';
        $origo['database']['password']       = '';
        $origo['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
    } else {
        define('DB_PASSWORD', 'uiJ7A6:g');
        $origo['database']['dsn']            = 'mysql:host=blu-ray.student.bth.se;dbname=guer16;';
        $origo['database']['username']       = 'guer16';
        $origo['database']['password']       = DB_PASSWORD;
        $origo['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
    }
}

/**
 * The footer for the webpages.
 */
$origo['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Gunnar Eriksson | <a href='https://github.com/GunnarEriksson/origo'>Origo på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;
