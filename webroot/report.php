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
$origo['title'] = "Redovisning";

$origo['main'] = <<<EOD
<h1>{$origo['title']}</h1>
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
<h4>Är du bekant med databaser sedan tidigare? Vilka?</h4>
<p>Den enda kontakten med databaser är från den förra kursen htmlphp där jag arbetade med
databasen SQLite, som är en filbaserad databas. Nu när jag har bekantat mig med databasen
MySQL så tycker jag det var ett bra upplägg att man fick börja med SQLite, som är något
enklare att arbeta med, för att sedan följa upp med databasen MySQL.</p>

<h4>Hur känns det att jobba med MySQL och dess olika klienter, utvecklingsmiljö och BTH driftsmiljö?</h4>
<p>Det var kul att få testa på några olika klienter som alla har sina styrkor. MySQL CLU är snabb
och enkel att arbeta med om man kan SQL-syntaxen. Vill man arbeta grafiskt med databasen, verkar
PHPMyAdmin vara ett bra verktyg. Den kändes dock lite krångligare än SQLite Manager som jag använde
för att hantera databasen SQLite. Det verktyget som jag tyckte bäst om var MySQL Workbench. Ett verktyg
som jag kommer att använda i framtiden. Dess största styrka är att man kan bygga upp och testköra sin
databas på ett relativt enkelt sätt. Jag tror att det kommer förenkla arbetet, speciellt när databaserna
blir större. Något som också kommer hjälpa en, när databaserna blir större, är möjligheten att generera
en grafisk bild över databasen och dess vyer. En grafisk bild underlättar för att förstå databasens struktur.</p>

<p>Jag hade dock problem med att få MySQL Workbench att fungera på BTHs databas. Jag insåg tidigt att
problemet låg i själva verktyget, då jag kunde koppla upp mig mot BTHs databas med de andra klienterna. Svaret
hittade jag i forumet. Där rekommenderades man till att installera en tidigare version av verktyget som hade
ett alternativ i fliken ”Advanced”, vilket den senaste versionen saknar, och sedan klicka i den rutan. När
jag hade gjort det, gick det bra att koppla upp sig mot BTHs databas och köra några tester mot den
databasen.</p>

<h4>Hur gick SQL-övningen, något som var lite svårare i övningen, kändes den lagom?</h4>
<p>Det var en lagom stor övning. Jag tyckte att man gick igenom de saker som gör att man kan klara sig rätt
långt på. Det fanns mycket att välja på och jag kan redan ana att det blir nog inte alltid enkelt att få
ihop en kort och effektiv syntax för att göra det man vill, speciellt då databasen innehåller flera tabeller
som refererar till varandra. Vyer verkar vara ett kraftfullt instrument när det gäller databaser, men man kan
förlora överblicken om man inte hittar en bra struktur. Det kanske är tur att MySQL Workbench kan generera
fram en grafisk bild över databasen och dess vyer.</p>

<p>Jag har läst lite vad andra studenter tycker när det gäller manualen och jag håller nog med de som tycker
att manualen inte var den lättaste att bläddra i. Ofta googlade jag också för att få lite mer information
och exempel när det gäller förklaringar och syntax. Grundsyntaxen börjar sitta nu, speciellt de delar som
man arbetade med i den förra kursen. Övrig syntax kommer jag att behöva repetera, så jag kommer få stor nytta
att jag sparade övningens SQL-syntax i en textfil. Den kommer nog att användas flitigt i de övriga
kursmomenten.</p>

<h2>Kmom04</h2>
<h4>Hur kändes det att jobba med PHP PDO?</h4>
<p>Det känns bra. Jag arbetade lite med PHP PDO i kursen htmlphp, så det känns bekant. Det som jag tycker är
knepigt är när man arbetar med flera tabeller och måste använda sig av olika JOINs. Lägger man sedan till några
vyer, så är det lätt att man går vilse. Jag förstår nu bättre varför det är så viktigt att göra en grundlig analys
innan man börjar sätta upp sin databas. Får man inte till en bra struktur från början, kan det bli riktigt
svårt att arbeta mot den senare.</p>

<h4>Gjorde du guiden med filmdatabasen, hur gick det?</h4>
<p>Ja, det gjorde jag. Min erfarenhet från tidigare kursmoment, visar att man vinner tid senare om man går igenom
guiderna grundligt. Jag använde min origo-mall (bara själva mallen) när jag gjorde övningarna. Den enda klassen
jag skapade under övningarna var databasklassen, övriga klasser väntade jag med till själva uppgiften. Jag anade
tidigare att jag skulle få nytta av MYSQL Workbench och det visade sig att jag hade rätt i den här övningen. Det
är smidigt att bygga upp databasen och testa olika SQL-kod innan man börjar med själva kodningen.</p>

<p>Övningen med CDatabase gjorde jag i mitt ramverk. Jag skapade en fil test.php som en fil bland de olika
sidokontrollerna och gjorde övningarna. Ett bra delmoment som gjorde att man fick repetera det man hade lärt sig
i den tidigare övningen.</p>

<p>Själva uppgiften gick smidigt tack vare jag lade ner tid på övningarna. Jag funderade lite om jag skulle göra
exekveringen av frågorna till databasen i klassen MovieSearch eller inte. Först ville jag inte låta klassen sköta
exekveringarna då jag gärna vill att modulerna ska utföra väl avgränsade uppgifter. Problemet var att det blev ganska
mycket kod i sidokontrollen, trots det bara bestod av anrop till klassfunktioner. I uppgiften stod det att klassen
skulle förbereda SQL-strängarna, så då tyckte jag att de kunde sköta själva exekveringen också. På så sätt blev
det mindre kod i sidokontrollen.</p>

<p>Uppgiften användare hantering gick ganska snabbt tack vare en bra guide och så hade jag gjort en användare
hantering tidigare i det sista momentet i kursen htmlphp.</p>

<p>När jag gjorde extra uppgiften, hade jag först tänkt utveckla de metoder jag hade tidigare för menyer. Men
det börjar bli ont om tid och jag vill inte komma efter, så jag tog exemplet som fanns i guiden och gick igenom
hur den fungerade istället. Efter lite anpassningar så har jag nu admin i menyn som döljer login, logout och
status. Det som återstår är en snyggare lösning när man kör sidan i en mobiltelefon.</p>

<h4>Du har nu byggt ut ditt Anax med ett par moduler i form av klasser, hur tycker du det konceptet fungerar
så här långt, fördelar, nackdelar?</h4>
<p>Konceptet känns bättre och bättre ju mer man arbetar med det. När det är väl på plats så slipper man mycket
onödig administration. Autoloadern tar hand om laddning av klasser, så man slipper göra include överallt. I
sidokontrollern kan man koncentrera sig på kärnan, så sköter ramverket allt runt om kring. Enkelt att lägga
till en css-fil till sidan och låta ramverket inkludera den och på så sätt dela upp css-filerna på ett smidigt
sätt. Jag hittade ett tips på att lägga till kod i konfigfilen som känner av om man ska koppla upp sig mot
min lokala server eller skolans server, beroende på var ifrån koden körs ifrån. Skönt att slippa tänka på det.</p>

<p>Jag har dock mycket att lära än, det lär nog dyka upp situationer där man funderar vart man ska lägga koden.
Utan strukturen hade det varit svårare att lägga till nya saker. Det hade nog blivit rörigt efter ett tag.</p>


<h2>Kmom05</h2>
<h4>Det blir en del moduler till ditt Anax nu, hur känns det?</h4>
<p>Det känns bra. Jag tycker det blir lättare att skriva renare kod när man arbetar med klasser. Klasserna gör
det möjligt att arbeta med objekt och då kan man hålla objektets parametrar och funktioner samlade på ett ställe.
Möjligheten att ge modulerna bra namn gör det lättare att få en överblick över logiken som klassen hanterar.</p>

<h4>Berätta hur du tänkte när du löste uppgifterna, hur tänkte du när du strukturerade klasserna och sidkontrollerna?</h4>
<p>Jag gjorde övningarna utan att blanda in moduler för att få en känsla för vad koden gör. När väl koden är på
plats så tycker jag att det är lättare att se hur strukturen ska bli. Jag brukar ofta arbeta enligt den metoden.
Först lite ”fulkod” och sedan förbättra strukturen. Jag brukar alltid nöja med mig vad som fungerar för stunden.
Det är ingen idé att sitta och gissa vad som behövs i framtiden och bygga en stor och komplex struktur som
kanske aldrig kommer att användas.</p>

<p>Min struktur är enkel. Jag har sidokontroller för administration (skapa nytt, ändra, ta bort och återställa).
Sedan har jag sidokontroller för visa allt, blogg och sidor. Varje sidokontroll ska ha ett väl definierat ansvar
och innehålla så lite kod som möjligt. Koden i sidokontrollerna hanterar inkommande parametrar och skapandet av
objekt och anrop av dess klasser. Jag fördrar att hantera parametrarna i sidokontrollen för då tycker jag att
jag får en bra överblick vilken data som sidokontrollern hanterar.</p>

<p>Jag har sedan modulerna Content, Blog och Page som ansvar för administration, blogg och sidor. Modulerna är
fristående till varandra. Visserligen administrerar Content Blog och Page, men de har inte så mycket gemensam
kod att det är värt besväret att göra en arvsstruktur. Det har inte heller uppstått en situation där jag
behöver hantera Blog och Page som en enhet, t ex att de ska sparas i en lista. Det skulle dock vara tänkbart
att det är bara är Content som pratar med databasen och Blog och Page bara ansvar för att visa respektive
innehåll. Det skulle dock göra att klassen Content blir större.</p>

<p>Ett annat alternativ är att skapa en ny abstrakt klass som Blog och Page ärver. Det skulle spara en del
kod, speciellt för att skriva ut att ett fel har uppstått. Idag är den funktionen samma i Blog och Page.
För tillfället får det se ut som det gör och uppstår det ett behov så är det bara att ändra strukturen.</p>

<h4>Börjar du få en känsla för hur du kan strukturera din kod i klasser och moduler, eller kanske inte?</h4>
<p>Det börjar falla på plats, även om det är mycket att hålla reda på just nu. Det jag främst saknar är
erfarenheten hur man brukar dela upp olika ansvarsområden när det gäller webbprogrammering. I det här
momentet, ska Content sköta all hantering mot databasen och Blog och Page bara ansvarar för att visa
innehållet? Det kanske inte finns någon tumregel utan var och en gör vad den tycker är bäst.</p>

<h4>Snart har du grunderna klara i ditt Anax, grunderna som kan skapa många webbplatser, är det något du
saknar så här långt, kanske några moduler som du känner som viktiga i ditt Anax?</h4>
<p>Det jag saknar är vad som kommer beröras i nästa moment, nämligen bildhantering. Jag gillar
naturfotografering och har en egen hemsida där jag lägger ut mina bilder. Idag använder jag mig av
ett bildhanteringsprogram som jag har laddad ner från nätet, men har ännu inte hittat något program
som visar bilderna på det sätt jag vill. Jag vet dock en professionell naturfotograf som har en
bildvisning exakt som jag vill och den sidan är skriven i PHP. Kanske kan jag skaffa mig så mycket
kunskap så jag själv kan göra en sådan sida i framtiden. Jag hoppas att nästa moment är ett första
steg på vägen.</p>

<h2>Kmom06</h2>
<p>Är ännu inte redovisad.</p>

<h2>Kmom07 - 10</h2>
<p>Är ännu inte redovisad.</p>
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
