<?php
/**
 * This is a Origo pagecontroller to show blog posts from database.
 *
 * Contains reports of each section of the course OOPHP.
 */
include(__DIR__.'/config.php');


// Get parameters
$slug   = isset($_GET['slug'])  ? $_GET['slug']  : null;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

$db = new Database($origo['database']);
$textFilter = new TextFilter();
$blog = new Blog($db, $acronym);
$blogs = $blog->getBlogPostsFromSlug($slug, $textFilter);

$title = $blog->getBlogTitle();
if (isset($title)) {
    $origo['title'] = $title;
} else {
    $origo['title'] = "Bloggen";
}
$origo['stylesheets'][] = 'css/blog.css';

$origo['debug'] = $db->Dump();

$origo['main'] = <<<EOD
{$blogs}
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
