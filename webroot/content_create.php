<?php
/**
 * This is a Origo pagecontroller to create new content for pages and blog posts
 *
 * Contains reports of each section of the course OOPHP.
 */
include(__DIR__.'/config.php');

/**
 * Add new page or blog post to database.
 *
 * Creates an new database object and content object and sends a request
 * to update the database with a new page or blog post.
 *
 * @param [] $params the parameters for the new page or blog post.
 *
 * @return string the result to add a new page or blog post to database.
 */
function addNewContentToDb($db, $params)
{
    $content = new Content($db);
    $output = $content->createContent($params);

    return $output;
}

$db = new Database($origo['database']);

// Get parameters
$title  = isset($_POST['title']) ? $_POST['title'] : null;
$url    = isset($_POST['url'])   ? strip_tags($_POST['url']) : null;
$data   = isset($_POST['data'])  ? $_POST['data'] : null;
$type   = isset($_POST['type'])  ? $_POST['type'] : null;
$filter = isset($_POST['filter']) ? $_POST['filter'] : null;
$published = isset($_POST['published'])  ? strip_tags($_POST['published']) : null;
$save   = isset($_POST['save'])  ? true : false;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

$origo['title'] = "Skapa ny sida eller blogg post";
$origo['stylesheets'][] = 'css/form.css';
$origo['debug'] = $db->Dump();

// Header
$origo['main'] = <<<EOD
<h1>{$origo['title']}</h1>
EOD;

if (isset($acronym)) {
    $output = null;
    if ($save) {
        $url = empty($url) ? null : $url;
        $slug = null; // Will be set in content via title.
        $user = new User($db);
        $author = $user->getName();
        $params = array($title, $slug, $url, $data, $type, $filter, $author, $published);
        $output = addNewContentToDb($db, $params);
    }

    $origo['main'] .= <<<EOD
    <form method=post>
        <fieldset>
            <legend>{$origo['title']}</legend>
            <p><label>Titel:<br/><input type='text' name='title' value=''/></label></p>
            <p><label>Url:<br/><input type='text' name='url' value=''/></label></p>
            <p><label>Text:<br/><textarea name='data'></textarea></label></p>
            <p><label>Typ: <select name='type' size='1'>
                <option value='page' selected='selected'>Sida</option>
                <option value='post'>Blogg</option>
            </select></p>
            <p><label>Filter:<br/><input type='text' name='filter' value=''/></label></p>
            <p><label>Publiseringsdatum:<br/><input type='Publiseringsdatum' name='published' value=''/></label></p>
            <p><input type='submit' name='save' value='Spara'/></p>
            <output>{$output}</output>
        </fieldset>
    </form>
EOD;
} else {
    $origo['main'] .= "Du måste vara inloggad för att kunna skapa nytt innehåll!";
}

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
