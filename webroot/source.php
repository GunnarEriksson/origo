<?php
/**
 * This is a Origo pagecontroller of the source page.
 *
 * Makes it possible to see all code for this site.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php');

// Do it and store it all in variables in the Anax container.
$origo['title'] = "Källkod";

// Add style for csource
$origo['stylesheets'][] = 'css/source.css';

// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));

$origo['main'] = "<h1>{$origo['title']}</h1>\n" . $source->View();

// Finally, leave it all to the rendering phase of Anax.
include(ORIGO_THEME_PATH);
