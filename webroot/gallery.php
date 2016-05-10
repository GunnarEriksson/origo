<?php
/**
 * This is a origo pagecontroller gallery.
 *
 * Presents a gallery or an item with information.
 */

// Include the essential config-file which also creates the $origo variable with its defaults.
include(__DIR__.'/config.php');

// Define the basedir for the gallery
define('GALLERY_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img');
define('GALLERY_BASEURL', '');

// Get incoming parameters
$path = isset($_GET['path']) ? $_GET['path'] : null;

// Create a gallery object and get the gallery and breadcrumb.
$gallery = new Gallery(GALLERY_BASEURL, GALLERY_PATH, $path);
$imageGallery = $gallery->createGallery();
$breadcrumb = $gallery->createBreadcrumb();

$origo['title'] = "Ett galleri";
$origo['stylesheets'][] = 'css/figure.css';
$origo['stylesheets'][] = 'css/gallery.css';
$origo['stylesheets'][] = 'css/breadcrumb.css';

$origo['main'] = <<<EOD
    <h1>{$origo['title']}</h1>

    $breadcrumb

    $imageGallery

EOD;

// Finally, leave it all to the rendering phase of origo.
include(ORIGO_THEME_PATH);
