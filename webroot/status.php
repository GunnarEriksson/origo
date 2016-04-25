<?php
/**
 * This is a Origo pagecontroller for the status page
 *
 * Contains information if an user has logged in or not.
 */
include(__DIR__.'/config.php');

$db = new Database($origo['database']);
$user = new User($db);

$output = $user->getUserLoginStatus();

$origo['title'] = "Status för inloggning";

$origo['main'] = <<<EOD
<h1>{$origo['title']}</h1>
<p>{$output}</p>

EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
