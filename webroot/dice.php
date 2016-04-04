<?php
/**
 * This is a Origo pagecontroller for the dice game page.
 *
 * Contains reports of each section of the course OOPHP.
 */
// Include the essential config-file which also creates the $origo variable with its defaults.
include(__DIR__.'/config.php');

if(isset($_GET['newGame'])) {
  // Unset all of the session variables.
  $_SESSION = array();

  // If it's desired to kill the session, also delete the session cookie.
  // Note: This will destroy the session, and not just the session data!
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }

  // Finally, destroy the session.
  session_destroy();
}

// Create the object or get it from the session
if(isset($_SESSION['diceLogic'])) {
  $diceLogic = $_SESSION['diceLogic'];
}
else {
  $diceLogic = new DiceLogic();
  $_SESSION['diceLogic'] = $diceLogic;
  $score = 0;
  $savedScore = 0;
}

$rollDice = isset($_GET['rollDice']) ? true : false ;
if ($rollDice) {
    $diceLogic->roll();

}

$shouldSaveScore = isset($_GET['savePoints']) ? true : false ;
if ($shouldSaveScore) {
    $diceLogic->saveScore();
}

// Do it and store it all in variables in the Origo container.
$origo['title'] = "Tärningsspel | oophp";
// Add style for csource
$origo['stylesheets'][] = 'css/dice.css';

$origo['main'] = <<<EOD
<h1>Tärningsspelet 100</h1>
<h2>Regler</h2>
<p>I tärningsspelet 100 gäller det att samla ihop poäng för att komma först till 100.
Du kastar i varje omgång en tärning tills du väljer att stanna och spara poängen eller
det dyker upp en etta och du förlorar alla poäng som du inte har sparat i rundan.</p>
<p>{$diceLogic->getDice()}</p>
<p>Poäng: {$diceLogic->getAccumulatedScore()}</p>
<p>Sparade poäng: {$diceLogic->getSavedScore()}</p>
<ul class="button">
    <li><a href="?newGame">Nytt spel</a></li>
    <li><a href="?savePoints">Spara poäng</a></li>
    <li><a href="?rollDice">Kasta tärning</a></li>
</ul>
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
