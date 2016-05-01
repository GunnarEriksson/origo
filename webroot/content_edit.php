<?php
/**
 * This is a Origo pagecontroller to edit content for pages and blog posts
 *
 * Contains reports of each section of the course OOPHP.
 */
include(__DIR__.'/config.php');

$db = new Database($origo['database']);
$content = new Content($db);

// Get parameters
$id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
$title  = isset($_POST['title']) ? $_POST['title'] : null;
$slug   = isset($_POST['slug'])  ? $_POST['slug']  : null;
$url    = isset($_POST['url'])   ? strip_tags($_POST['url']) : null;
$data   = isset($_POST['data'])  ? $_POST['data'] : null;
$type   = isset($_POST['type'])  ? $_POST['type'] : null;
$filter = isset($_POST['filter']) ? $_POST['filter'] : null;
$author = isset($_POST['author']) ? $_POST['author'] : null;
$published = isset($_POST['published'])  ? strip_tags($_POST['published']) : null;
$save   = isset($_POST['save'])  ? true : false;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

// Check that incoming parameters are valid
is_numeric($id) or die('Check: Id must be numeric.');


$origo['title'] = "Uppdatera innehåll";
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
        $slug = empty($slug) ? null : $slug;
        $params = array($title, $slug, $url, $data, $type, $filter, $author, $published, $id);
        $output = $content->updateContent($params);
    }

    $contentFromId = $content->selectContent(array($id));

    if (isset($contentFromId)) {
        // Clean up the data from the database before presentation of the web page
        $title  = htmlentities($contentFromId->title, null, 'UTF-8');
        $slug   = htmlentities($contentFromId->slug, null, 'UTF-8');
        $url    = htmlentities($contentFromId->url, null, 'UTF-8');
        $data   = htmlentities($contentFromId->data, null, 'UTF-8');
        $type   = htmlentities($contentFromId->type, null, 'UTF-8');
        $filter = htmlentities($contentFromId->filter, null, 'UTF-8');
        $author = htmlentities($contentFromId->author, null, 'UTF-8');
        $published = htmlentities($contentFromId->published, null, 'UTF-8');

        $origo['main'] .= <<<EOD
        <form method=post>
            <fieldset>
                <legend>{$origo['title']}</legend>
                <input type='hidden' name='id' value='{$id}'/>
                <p><label>Titel:<br/><input type='text' name='title' value="{$title}"/></label></p>
                <p><label>Slug:<br/><input type='text' name='slug' value="{$slug}"/></label></p>
                <p><label>Url:<br/><input type='text' name='url' value="{$url}"/></label></p>
                <p><label>Text:<br/><textarea name='data'>{$data}</textarea></label></p>
                <p><label>Typ:<br/><input type='text' name='type' value="{$type}"/></label></p>
                <p><label>Filter:<br/><input type='text' name='filter' value="{$filter}"/></label></p>
                <input type='hidden' name='author' value="{$author}"/>
                <p><label>Publiseringsdatum:<br/><input type='Publiseringsdatum' name='published' value="{$published}"/></label></p>
                <p><input type='submit' name='save' value='Spara'/></p>
                <output>{$output}</output>
            </fieldset>
        </form>
EOD;
    } else {
        $origo['main'] .= "Felaktigt id! Det finns inget innehåll med sådant id.";
    }
} else {
    $origo['main'] .= "Du måste vara inloggad för att kunna ändra innehåll!";
}

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
