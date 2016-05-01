<?php
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php');

$bbcodetest = <<<EOD
<p>
[b]Detta är exempel på BBCode[/b]<br/>
En text med ett [u]understruket[/u] ord och ett [i]kursivt[/i] ord.<br/>
Den här kursen ges av [url]https://www.bth.se/[/url].
</p>
EOD;
$filter = new TextFilter();
$bbcodetest = $filter->bbcode2html($bbcodetest);

$linktest = <<<EOD
<p>
<strong>Detta är ett exempel på make_clickable text</strong><br/>
Detta är en länk som kan vara klickbar https://www.bth.se/.
<p>
EOD;
$linktest = $filter->makeClickable($linktest);

$newlinetest = <<<EOD
<p><strong>Detta är ett exempel nl2br text</strong>
Smidigt att kunna använda radbrytning för ny rad
istället för att behöva lägga till taggen ny rad.
</p>
EOD;
$newlinetest = $filter->nl2br($newlinetest);

$markdowntest = <<<EOD
Detta är ett exempel markdown text
----------------------------------
### Detta är en underrubrik ###
Detta är en mening med ett ord i __fetstil__.
EOD;
$markdowntest = $filter->doFilter($markdowntest, "markdown");

$filtertest = <<<EOD
### Detta är ett exempel på markdown och url filter ###
Detta är en länk som kan vara klickbar https://www.bth.se/.
EOD;
$filtertest = $filter->doFilter($filtertest, "markdown, clickable");

$smartypantstest = <<<EOD
<p>
<strong>Detta är ett exempel på smarty pants typographer text</strong><br/>
I den här texten "testas" filtret 'smartypants'... för att få snyggare typografi.
</p>
EOD;
$smartypantstest = $filter->doFilter($smartypantstest, "smartypants");

$htmlpurifytest = <<<EOD
<h3>Detta är ett exempel på HTML purified text</h3>
<p>Här är en text med en <strong>refrerens </strong><a href='https://www.bth.se/'>BTH</a></p>
<p>En tag som som ser ut att vara till en bild: <img src="javascript:harmful();" onload="harmful();" />
</p>
EOD;
$htmlpurifytest = $filter->doFilter($htmlpurifytest, "htmlpurify");

$origo['title'] = "Textfilter";
$origo['main'] = "<h1>Test av textfilter</h1>";
$origo['main'] .= $bbcodetest;
$origo['main'] .= $linktest;
$origo['main'] .= $newlinetest;
$origo['main'] .= $markdowntest;
$origo['main'] .= $filtertest;
$origo['main'] .= $smartypantstest;
$origo['main'] .= $htmlpurifytest;


// Finally, leave it all to the rendering phase of Anax.
include(ORIGO_THEME_PATH);
