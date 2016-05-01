<?php
/**
 * This is a Origo pagecontroller to show all content (pages and blog posts).
 *
 * Contains reports of each section of the course OOPHP.
 */
include(__DIR__.'/config.php');

$db = new Database($origo['database']);
$content = new Content($db);

$origo['title'] = "Visa allt innehåll";
$anax['debug'] = $db->Dump();
$contentListPage = $content->getContentListPage($origo['title']);

$origo['main'] = <<<EOD
{$contentListPage}
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
