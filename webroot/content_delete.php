<?php
/**
 * This is a Origo pagecontroller to delete a page or a blog post.
 *
 * Contains reports of each section of the course OOPHP.
 */
include(__DIR__.'/config.php');

$db = new Database($origo['database']);
$content = new Content($db);

$id      = isset($_POST['id'])      ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
$delete  = isset($_POST['delete'])  ? true : false;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

is_numeric($id) or die('Check: Id must be numeric.');

$origo['title'] = "Uppdatera innehåll";
$origo['stylesheets'][] = 'css/form.css';
$origo['debug'] = $db->Dump();

// Header
$origo['main'] = <<<EOD
<h1>{$origo['title']}</h1>
EOD;

if (isset($acronym)) {
    $contentFromId = $content->selectContent(array($id));
    if (isset($contentFromId)) {
        $output = null;
        if ($delete) {
            $params = array(
                $contentFromId->title,
                $contentFromId->slug,
                $contentFromId->url,
                $contentFromId->data,
                $contentFromId->type,
                $contentFromId->filter,
                $contentFromId->author,
                $contentFromId->updated,
                $id
            );

            $output = $content->deleteContent($params);
        }

        // Clean up the data from the database before presentation of the web page
        $title  = htmlentities($contentFromId->title, null, 'UTF-8');
        $data   = htmlentities($contentFromId->data, null, 'UTF-8');
        $type   = htmlentities($contentFromId->type, null, 'UTF-8');
        $published = htmlentities($contentFromId->published, null, 'UTF-8');

        $origo['main'] .= <<<EOD
        <form method=post>
            <fieldset>
                <legend>{$origo['title']}</legend>
                <input type='hidden' name='id' value='{$id}'/>
                <p><label>Titel:<br/><input type='text' name='title' value="{$title}"/></label></p>
                <p><label>Text:<br/><textarea name='data'>{$data}</textarea></label></p>
                <p><label>Typ:<br/><input type='text' name='type' value="{$type}"/></label></p>
                <p><label>Publiseringsdatum:<br/><input type='Publiseringsdatum' name='published' value="{$published}"/></label></p>
                <p><input type='submit' name='delete' value='Ta bort'/></p>
                <output>{$output}</output>
            </fieldset>
        </form>
EOD;
    } else {
        $origo['main'] .= "Felaktigt id! Det finns inget innehåll med sådant id.";
    }
} else {
    $origo['main'] .= "Du måste vara inloggad för att kunna ta bort innehåll!";
}

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
