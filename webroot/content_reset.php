<?php
/**
 * This is a Origo pagecontroller to reset the content for pages and blog posts
 *
 * Contains reports of each section of the course OOPHP.
 */
include(__DIR__.'/config.php');

/**
 * Creates a reset database form.
 *
 * Creates a form to reset the database. The form contains a reset button
 * and a message area if reset of database was successful or not.
 *
 * @param string $title the title in the frame of the form.
 * @param string $message the message if the reset of the database was successful
 *                        or not.
 *
 * @return html the form to reset the database.
 */
function createResetDbForm($title, $message)
{
    $resetForm = <<<EOD
    <form method=post>
        <fieldset>
            <legend>$title</legend>
            <p>Vill du återställa databasen till dess grundvärden?<p>
            <p>All övrig data vill bli förlorad!<p>
            <p><input type='submit' name='reset' value='Återställ'/></p>
            <output>{$message}</output>
        </fieldset>
    </form>
EOD;

    return $resetForm;
}

/**
 * Resets the database.
 *
 * Sends a request to recreate the table Content and set the content in the
 * table to default values.
 *
 * @param database $db the object of the class Database.
 *
 * @return string the message if the reset of the database was successful or not.
 */
function resetContentDb($db)
{
    $content = new Content($db);
    $res = $content->resetContent();
    if ($res) {
        $message = "Databas återställd till dess grundvärden";
    } else {
        $message = "Kunde ej återställa databasen till dess grundvärden";
    }

    return $message;
}

$reset = isset($_POST['reset']) ? true : false;
$db = new Database($origo['database']);
$user = new User($db);

$origo['title'] = "Återställ databasen";
$origo['stylesheets'][] = 'css/form.css';
$origo['debug'] = $db->Dump();

if ($user->isAuthenticated()) {
    $message = null;
    if ($reset) {
        $message = resetContentDb($db);
    }

    $output = createResetDbForm($origo['title'], $message);

} else {
    $output = "Du måste vara inloggad för att kunna sätta databasen till dess grundvärden!";
}

$origo['main'] = <<<EOD
<h1>{$origo['title']}</h1>
{$output}
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
