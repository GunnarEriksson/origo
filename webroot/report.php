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
<br/>Jag använder Atom som editor, där jag numera har installerat ett antal plug-in som
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
Jag kände att jag inte ville avvika allt förmycket, då det kanske ställer till det
i kommande övningar. Jag flyttade dock initieringen av huvudet och footer till
config-filen, så jag inte behövde upprepa koden i alla sidokontroll-filer. Jag använde
också en annan variant för att markera vilken sida jag är på i menyn, där jag
använder mig av miljövariabeln server.</p>

<h4>Gick det bra att inkludera source.php? Gjorde du det som en modul i ditt Anax?</h4>
<p>Ja, det gick bra. Jag följde bara beskrivningen och allt gick bra. Den finns nu som
en modul i Orion. Jag gjorde bara en liten ändring i CSS-filen, så även den sidan kan
visas i mindre enheter.</p>

<h4>Gjorde du extrauppgiften med GitHub?</h4>
<p>Ja, det gjorde jag. Jag har arbetat med Git en hel del i mitt arbete och jag tycker
det är ett smidigt verktyg att arbeta med. Genom att checka in kod ofta, så kan man få
bra kontroll över koden. Speciellt om det är någon del av koden som har slutat att
fungera, så kan man lättare leta upp vilken ändring som gör att det går fel. Att lägga
upp koden på GitHub är ett sätt att spara sin kod som en extra säkerhet om ens dator
skulle krascha. Jag funderade hur många som sparade sin kod på ett säkert sätt när man
gjorde slutprojektet i htmlphp-kursen? Om man inte gjorde det, så hade det inte varit
kul om datorn hade kraschat när man har arbetat med koden under en längre tid.
<br/>Git är också vanligt förekommande ute i arbetslivet, så det är bra att lära sig
att använda Git eller hålla kunskaperna uppdaterade.
</p>

<h2>Kmom02</h2>
<h4>Hur väl känner du till objektorienterade koncept och programmeringssätt?</h4>
<p>Jag har arbetat med både C++ och Java i många år, så koncepten är bekanta. Jag valde
dock att hålla allt enkelt så jag implementerade inga avancerade designmönster för att
göra kopplingarna mellan klasserna lösare.</p>

<h4>Jobbade du igenom oophp20-guiden eller skumläste du den?</h4>
<p>Jag jobbade igenom guiden grundligt då era guider ger en bra start i programspråket
PHP och tar upp det man behöver för stunden. Jag behöver dessutom nöta in PHP-syntaxen.
Problemet för mig när det gäller PHP-syntaxen är skillnaderna mot Java-syntaxen. I PHP
behöver man inte deklarera typen för en variabel, men det tar Java igen senare genom
att syntaxen är enklare. Jag vet inte hur många gånger jag glömde this-pekaren, ett
dollartecken efter piloperatorn eller self-ordet före en konstant. Det kan bli knepigt
ibland när det inte blir ett syntaxfel utan att PHP-kompilatorn tror att man tilldelar
en lokal variabel istället för en instansvariabel. Jag har dock lärt mig känna igen
felen nu.</p>

<h4>Berätta om hur du löste uppgiften med tärningsspelet 100, hur tänkte du och hur gjorde
du, hur organiserade du din kod?</h4>
<p>Jag använde mig av strukturen från övningen. Jag har en Dice-klass som skapar tärningen
och slumpar fram ett värde tärningen ska visa. DiceImage-klassen ärver Dice-klassen och gör
att man kan visa en tärning på ett smidigt sätt via en bild och CSS.</p>

<p>Klassen DiceLogic är motorn i spelet och fungerar också som ett gränssnitt mellan
sidokontrollern och tärningen. Logiken sköter anropen från sidokontrollen och anropar i sin
tur DiceImage. Logiken håller också redan på poängen, när poäng som inte har sparats förloras
och när en spelare har vunnit.</p>

<p>Sidokontrollern dice.php innehåller det mesta av HTML-koden och har tre knappar som anropar
sidan med GET. DiceLogic-objektet sparas i sessionen om den inte redan finns där för att man
ska kunna gå tillbaka och spela vidare. Vill man spela ett nytt spel, rensas sessionen från
DiceLogic-objektet så ett nytt objekt kan skapas igen.</p>

<p>I min version av spelet kan man bara spela mot sig själv, eftersom jag valde att göra
kalendern också. Skulle jag ha utökat spelet så fler spelare (även datorn), så hade jag skapat
en Player-klass också. Sedan hade logiken fått spara spelarna i en array och arbetat mot den
klassen i stället för DiceImage-klassen.</p>

<h4>Berätta om hur du löste uppgiften med Månadens Babe, hur tänkte du och hur gjorde du, hur
organiserade du din kod?</h4>
<p>Jag har delat upp kalendern i flera klasser. Längst ned finns klassen CalendarDay som
hanterar en dag och innehåller information om vilket datum dagen har och om det finns någon
övrig information. I mitt fall använder jag den till att spara om klassen tillhör en annan
månad än den som visas.</p>

<p>Nästa klass är CalendarWeek. Den klassen ansvarar för en vecka och innehåller uppgifter
om veckonummer och en array som innehåller sju CalendarDay objekt som klassen skapar. Sedan
finns det också funktioner som gör att man kan hämta ut veckonummer och arrayen med
CalendarDay-objekten.</p>

<p>Nästa klass är CalendarMonth. Den klassen ansvarar för den månad som visas i kalendern.
Den innehåller uppgifter som år (behövs i kalenderhanteringen), månad (både som siffra och
det svenska namnet på månaden) och en array av CalendarWeek objekt som den har skapat. Jag
har funktioner som räknar ut om det finns dagar från föregående månad, antal dagar i den
aktuella månaden och om det finns dagar från nästa månad i kalendern. För att det skulle
bli renare kod, lade jag först in alla dagarna i en array. Delade upp arrayen så varje
del-array innehåller sju dagar så att jag kunde skicka dessa del-arrayer till
CalendarWeek-konstruktorn för att skapa en vecka. CalendarWeek läser sedan arrayen med sju
dagar för att skapa en vecka. I konstruktorn skickar jag också med veckonumret som jag
räknar ut för veckans första dag.</p>

<p>Klassen CalendarLogic fungerar som ett gränssnitt mellan sidokontrollern och CalendarMonth.</p>

<p>Sidokontrollern calendar.php innehåller HTML-koden och anropar funktioner i CalendarLogic.
CalendarLogic-objektet sparas i sessionen och rensas och skapas igen varje gång man kommer
till sidan. För att komma till föregående eller nästa månad använder jag GET med information
om vilken månad man önskar ska visas.</p>

<p>Jag uppdaterade också autoloadern så att jag inte behöver lägga varje klass i ett eget
bibliotek. Autoloadern söker igenom src-katalogen efter underkataloger och går sedan in i
dessa och letar efter filer. Jag har bara gjort så att autoloadern klarar en nivå av
underkataloger. Man ska inte göra mer än vad man behöver. Behöver man utöka i framtiden
gör man det då.</p>

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
