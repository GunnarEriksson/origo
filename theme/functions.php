<?php
/**
 * Theme related functions.
 *
 */

/**
 * Get title for the webpage by concatenating page specific title with site-wide title.
 *
 * @param string $title for this page.
 * @return string/null wether the favicon is defined or not.
 */
function getTitle($title)
{
  global $origo;
  return $title . (isset($origo['title_append']) ? $origo['title_append'] : null);
}

/**
 * Generates the menu.
 *
 * Generates the menu and sets the class of the selected webpage to 'selected'.
 *
 * @param [] $items the items in the navigation bar.
 * @param string $class the class for the navigation bar. Makes it possible to
 *                      style the navigation bar.
 */
function generateMenu($items, $class)
{
    $html = "<nav class='$class'>\n";
    foreach($items as $item) {
        $selected = selectedPage($item['url']);
        $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
    }
    $html .= "</nav>\n";

    return $html;
}


/**
 * Checks if web page is active
 *
 * Checks the file name against the file which was given in order
 * to access this page. If it is, the function returns the string
 * selected. If not, the function returns an emtpy string.
 *
 * @param string $fileName - the file name to compare.
 * @return string - the string 'selected' if the file name is equal
 *                  to the file which was given in order to access
 *                  this page. If not, an empty string is returned.
 */
function selectedPage($fileName)
{
    return strtok(basename($_SERVER['PHP_SELF']), '?') === $fileName
        ? 'selected'
        : '';
}
