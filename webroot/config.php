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
$origo['title_append'] = ' | Origo en webbtemplate';

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
   'me'  => array('text'=>'Hem',  'url'=>'me.php'),
   'source'  => array('text'=>'Källkod',  'url'=>'source.php'),
   'report' => array('text'=>'Redovisning', 'url'=>'report.php'),
 );

/**
 * Generates the menu.
 *
 * Generates the menu and sets the class of the selected webpage to 'selected'.
 *
 * @param [] $items the items in the navigation bar.
 * @param string $class the class for the navigation bar. Makes it possible to
 *                      style the navigation bar.
 */
function GenerateMenu($items, $class) {
    $html = "<nav class='$class'>\n";
    foreach($items as $item) {
        $selected = selectedPage($item['url']);
        $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
    }
    $html .= "</nav>\n";

    return $html;
  }


/**
 * Checks if web page is active
 *
 * Checks the file name against the file which was given in order
 * to access this page. If it is, the function returns the string
 * selected. If not, the function returns an emtpy string.
 *
 * @param string $fileName - the file name to compare.
 * @return string - the string 'selected' if the file name is equal
 *                  to the file which was given in order to access
 *                  this page. If not, an empty string is returned.
 */
function selectedPage($fileName)
{
    return strtok(basename($_SERVER['PHP_SELF']), '?') === $fileName
        ? 'selected'
        : '';
}

/**
 * The footer for the webpages.
 */
$origo['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Gunnar Eriksson | <a href='https://github.com/GunnarEriksson/origo'>Origo på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;
