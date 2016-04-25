<?php
/**
 * This is a test page for the exercise Övningar med CDatabase
 * (Database) in Kmom04. Not included on the webpage.
 */
include(__DIR__.'/config.php');

// 1.
$db = new Database($origo['database']);

// 2.1: En sql-sträng, en array med parametrar som kan användas av sql-strängen och en flagga
//      om man vill skriva ut sql-strängen, hur många rader resultatet har, antal ackumulerade
//      frågor och parametrarna som man skickde till databasen.
// 2.2: Sql-strängen måste vara med. Parametrar och debug-flagga är optionella.
// 2.3: Funktionen returnerar resultatet av frågan till databasen i form av en array.

// 3.
$qry = "SELECT * FROM Movie;";

// 4.
$res = $db->executeSelectQueryAndFetchAll($qry);

// 5.
dump($res);

// 5.1: 5 stycken filmer.
// 5.2: Id 4

// 6.
foreach ($res as $key => $row) {
    dump($row->title);
}

// 7: Returnerar hur många rader som påverkades av anrop till databas med INSERT, UPDATE
//    och DELETE eller hur många rader som returnerades efter ett SELECT anrop.

// 8.
dump($db->rowCount());

// 8.1: Siffran 5.
// 8.2: Att det returnerades en array som innehåller fem dataobjekt (filmer).

// 9.1 : En sql-sträng, en array med parametrar som kan användas av sql-strängen och en
//       debug-flagga om man vill skriva ut sql-strängen och eventuella fel, ackumulerade
//       antal frågor och eventuella parametrar.
// 9.2: Sql-strängen måste vara med. Parametrar och debug-flagga är optionella
// 9.3: En flagga, true om det gick bra annars returneras värdet false.

// 10.
$qry = 'INSERT INTO Movie (title, YEAR) VALUES (?, ?)';

// 11.
$params = array('Das Boot', 1981);

// 12.
$res = $db->executeQuery($qry, $params);

// 13.
dump($res);
var_dump($res);

// 13.1: 1 och bool(true).
// 13.2: Att förfrågan (INSERT) gick bra och en film är tillagd.

// 14: Det senaste tillagda id i tabellen.

// 15.
dump($db->lastInsertId());

// 15.1: Id nummer 6.

// 16.
$qry = 'DELETE FROM Movie WHERE YEAR == ?;';
$params = array(1981);
$res = $db->executeQuery($qry, $params);
dump($res);
var_dump($res);

// 17.1: bool(false)
// 17.2: Att det inte gick att radera sist tillagda film.

// 18: Returnerar felkod respektive information om den senaste misslyckade
//     frågan till databasen.

// 19.
dump($db->errorCode());
dump($db->errorInfo());

// 19.1: Felkod 42000;
// 19.2: Server Error parse error.
// 19.3: Att det är ett syntax fel (dubbla '=');

// 20:
$qry = 'DELETE FROM Movie WHERE YEAR = ?;';
$params = array(1981);
$res = $db->executeQuery($qry, $params);
dump($res);
var_dump($res);

// 20.1: Tog bort ett '=' och då fungerade det vilket beror på att jag kör
//       på en Windows-maskin. För att det ska fungera på en Linux-maskin, ändrade
//       jag från movie till Movie.

// 21: GetNumQueries() returnerar antal förfrågningar som har gjorts mot databasen.
//     GetQueries() returnerar alla förfrågningar som har gjorts mot databas.

// 22.
dump($db->getNumQueries());
dump($db->getQueries());

// 22.1: Visar siffran 4. Det är antalet förfrågningar mot databasen.
// 22.2: Visar förfrågningarna samt felet när man försökte ta bort en rad i tabellen
//       Movie då det fanns ett syntaxfel i frågan.

// 23: Skriver ut alla förfrågningar mot databasen som HTML-kod.

// 24.
dump($db->dump());

// 24.1: Skiver ut vad som returneras i metoden GetQueries() fast i HTML-kod.

// 25: Den sparar ner debuginformation till sessionen.

// 26.
$db->saveDebug();
dump($_SESSION);

// 26.1: Antal förfrågningar till databas, förfrågningar och svar och parametrar
//       som har använts i förfrågningarna
// 26.2: Nyckeln är Database
// 26.3: Data finns kvar i sessionen. Kommenterar man bort SaveDebug så sparas ingen
//       data i sessionen och arrayen är tom.
