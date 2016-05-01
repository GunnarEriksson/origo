<?php
/**
 * This is a Origo pagecontroller to show page content from database.
 *
 * Contains reports of each section of the course OOPHP.
 */
include(__DIR__.'/config.php');

// Get parameters
$url    = isset($_GET['url'])   ? strip_tags($_GET['url']) : null;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

$db = new Database($origo['database']);
$textFilter = new TextFilter();
$page = new Page($db, $acronym);
$webPage = $page->getPageFromUrl($url, $textFilter);

$origo['title'] = $page->getPageTitle();
$origo['debug'] = $db->Dump();

$origo['main'] = <<<EOD
{$webPage}
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
