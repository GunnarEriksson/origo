<?php
/**
 * This is a Origo pagecontroller for the me page.
 *
 * Contains a short presentation of the author of this page.
 *
 */

// Include the essential config-file which also creates the $origo variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Origo container.
$origo['title'] = "Min me-sida | oophp";

$origo['main'] = <<<EOD
<h1>Om Mig Själv</h1>
<img class="me-picture" src="img/gunnar.jpg" alt="Bild på Gunnar Eriksson" />
<p>Jag heter Gunnar Eriksson och bor i Karlskrona även om jag vistas under
längre perioder i Södra Sandby utanför Lund.</p>
<p>Jag har arbetat länge som teamledare, teknisk koordinator, systemutvecklare
i Java och C++. Jag läser för nuvarande Databaser, HTML, CSS, Javascript och
PHP 30hp på halvfart på Blekinge Tekniska Högskola.</p>

<p>Jag har tidigare gjort några hemsidor i HTML och CSS, men kände att jag
ville lära mig mer. Speciellt på serversidan. BTH har gott anseende när
det gäller programmeringsutbildningarna, så jag tror att de har satt ihop
ett bra kurspaket. Sen är det förstås ingen nackdel att kunna få med
utbildningen i sitt CV. Jag har läst distansutbildningar tidigare på olika
högskolor och universitet. Det är en utbildningsform som passar mig utmärkt.
Man kan läsa när man har tid och de enda tiderna man har att passa är när
det är tid att lämna in laborationer.</p>

<p>På fritiden är det golf, landskapsfotografering och lite arbete med
olika hemsidor. När det gäller golfen, så har mitt handicap stabiliserat
sig runt 10. Skulle jag försöka få ner det ytterligare, så är det nog till
att börja träna. Då jag heller tycker om att spela, är jag fullt nöjd med
mitt handicap. Landskapsfotograferingen är bara skön avkoppling. Att få
vistas ute i naturen och känns stillheten. Sitta ned och ta fram lite fika
och bara njuta. Några bilder har jag sålt under åren när någon har frågat.</p>

<p>Förutom det, så gillar jag att umgås med mina vänner, som finns både
i Skåne och i Blekinge.</p>
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
