<?php
/**
 * This is a Origo pagecontroller for the report page.
 *
 * Contains reports of each section of the course OOPHP.
 *
 */
// Include the essential config-file which also creates the $origo variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Origo container.
$origo['title'] = "Redovisning | oophp";

$origo['main'] = <<<EOD
<h1>Redovisning</h1>
<h2>Kmom01</h2>
<h4>Vilken utvecklingsmiljö använder du?</h4>
<p>Jag använder samma miljö som i kursen "htmlphp", där jag använder operativsystemet
Windows 7 med cygwin som terminal för git och dbwebb-kommandon.
<br/>Jag använder Atom som editor, där jag numera har installerat ett antal plug-ins som
gör den lätt att arbeta med. Jag har mappat snabbkommandona så att Atom mycket liknar
Eclipse, så jag blir det lättare när jag sedan använder Eclipse som java-editor.
<br/>För att se resultatet, använder jag mig av webbläsarna Firefox med Firebug och
Google Chrome. Jag brukar också testa utseendet på min Ipad och Android-telefon.
<br/>Lokalt kör jag på en XAMPP-installation.</p>

<h4>Berätta hur det gick att jobba igenom guiden “20 steg för att komma igång PHP”,
var något nytt eller kan du det?</h4>
<p>Då jag nyligen har avslutat kursen "htmlphp", så behövde jag endast repetera
den grundläggande syntaxen, både när det gäller PHP-sidan och böckerna. Jag tycker
PHP-sidan sammanfattar den grundläggande PHP-syntaxen på ett bra sätt, så numera
använder jag om jag behöver uppdatera minnet med något från sidan.</p>

<h4>Vad döpte du din webbmall Anax till?</h4>
<p>Det var inte lätt att komma på något fyndigt, men som inte heller var för långt.
Det var inte så länge sedan som jag repeterade matematik inför högskoleprovet och
då förekom origo, ganska ofta. På Wikipedia står det att origo kommer ifrån latinets
origo som betyder ursprung. Jag tyckte det var lämpligt, så det fick bli origo.</p>

<h4>Vad anser du om strukturen i Anax, gjorde du några egna förbättringar eller
något du hoppade över?</h4>
<p>Det tog ett tag innan man fick en överblick över strukturen. När jag gjorde
övningen, kändes det som filerna aldrig skulle ta slut. Det blev också ganska
mycket letande när man ville lägga till eller uppdatera något. Det börjar dock
kännas bättre nu när strukturen börjar sätta sig. Jag vet också från arbetslivet att
det är skillnad på små och stora strukturer. Att det kan kännas lite väl mycket, när
kodmängden är liten, men utan bra struktur när koden växer kan bli en mardröm.
<br/>Jag höll mig till största delen till strukturen som den som fanns i övningen.
Jag kände att jag inte ville avika allt förmycket, då det kanske ställer till det
i kommande övningar. Jag flyttade dock initeringen av huvudet och footer till
config-filen, så jag inte behövde upprepa koden i alla sidokontroll-filer. Jag använde
också en annan variant för att markera vilken sida jag är på i menyn, där jag
använder mig av miljövariablen server.</p>

<h4>Gick det bra att inkludera source.php? Gjorde du det som en modul i ditt Anax?</h4>
<p>Ja, det gick bra. Jag gjorde som det stod i beskrivningen och allt gick bra.
Den finns nu som en modul i Orion.</p>

<h4>Gjorde du extrauppgiften med GitHub?</h4>
<p>Ja, det gjorde jag. Jag har arbetat med Git en hel del och jag tycker det är ett
smidigt verktyg att arbeta med. Skulle ens dator krascha, så är det bra att koden
finns sparad, speciellt om man arbetar med slutprojektet. Förra projektet i kursen
"htmlphp" så sparade jag flitigt på studentservern istället. Verktyget är också bra
om man behöver gå tillbaka till en tidigare revision om något har blivit fel eller
man vill byta strategi.</p>

<h2>Kmom02</h2>
<p>Är ännu inte redovisad.</p>

<h2>Kmom03</h2>
<p>Är ännu inte redovisad.</p>

<h2>Kmom04</h2>
<p>Är ännu inte redovisad.</p>

<h2>Kmom05</h2>
<p>Är ännu inte redovisad.</p>

<h2>Kmom06</h2>
<p>Är ännu inte redovisad.</p>

<h2>Kmom07 - 10</h2>
<p>Är ännu inte redovisad.</p>
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);