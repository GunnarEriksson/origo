<?php
/**
 * This is a Origo pagecontroller for the movie page.
 *
 * Contains reports of each section of the course OOPHP.
 */
 include(__DIR__.'/config.php');

 // Get parameters
 $title    = isset($_GET['title']) ? $_GET['title'] : null;
 $hits     = isset($_GET['hits'])  ? $_GET['hits']  : 8;
 $page     = isset($_GET['page'])  ? $_GET['page']  : 1;
 $year1    = isset($_GET['year1']) && !empty($_GET['year1']) ? $_GET['year1'] : null;
 $year2    = isset($_GET['year2']) && !empty($_GET['year2']) ? $_GET['year2'] : null;
 $orderby  = isset($_GET['orderby']) ? strtolower($_GET['orderby']) : 'id';
 $order    = isset($_GET['order'])   ? strtolower($_GET['order'])   : 'asc';


 // Check that incoming parameters are valid
 is_numeric($hits) or die('Check: Hits must be numeric.');
 is_numeric($page) or die('Check: Page must be numeric.');
 is_numeric($year1) || !isset($year1)  or die('Check: Year must be numeric or not set.');
 is_numeric($year2) || !isset($year2)  or die('Check: Year must be numeric or not set.');

 $parameters = array(
     'title' => $title,
     'hits' => $hits,
     'page' => $page,
     'year1' => $year1,
     'year2' => $year2,
     'orderby' => $orderby,
     'order' => $order,
 );

$db = new Database($origo['database']);
$movieSearch = new MovieSearch($db, $parameters);
$movieSearchForm = $movieSearch->getMovieSearchForm();

$res = $movieSearch->searchMovie();
$htmlTable = new HTMLTable();
$movieTable = $htmlTable->generateMovieTable($res);

$hitsPerPage = $htmlTable->getHitsPerPage(array(2, 4, 8), $hits);
$navigatePage = $htmlTable->getPageNavigation($hits, $page, $movieSearch->getMaxNumPages());
$row = $movieSearch->getNumberOfRows();
$sqlDebug = $db->Dump();


 // Do it and store it all in variables in the Origo container.
$origo['title'] = "Film";
$origo['stylesheets'][] = 'css/film.css';

$origo['main'] = <<<EOD
<h1>{$origo['title']}</h1>
{$movieSearchForm}
 <div class='movie-table'>
   <div class='table-hits'>{$row} träffar. {$hitsPerPage}</div>
   {$movieTable}
   <div class='movie-pages'>{$navigatePage}</div>
 </div>
EOD;

// Finally, leave it all to the rendering phase of Origo.
include(ORIGO_THEME_PATH);
