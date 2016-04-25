<?php
/**
 * Provides HTML tables and functions for returning number of hits, arrows to
 * be able to sort columns in ascending or descending order and support for
 * paging.
 */
class HTMLTable
{
    /**
     * Generate movie table.
     *
     * Generates a movie table with the columns 'Rad', 'Id', 'Bild', 'Titel',
     * 'År' and 'Genre'. Id, Titel and År have arrows so the movies can be
     * sorted in ascending or descending order in those columns.
     *
     * @param  [] $res the result set from the database.
     * @return html the movie table.
     */
    public function generateMovieTable($res)
    {
        $table = "<table>";
        $table .= "<tr>";
        $table .= "<th>Rad</th>";
        $table .= "<th>Id" . $this->orderby('id') . "</th>";
        $table .= "<th>Bild</th>";
        $table .= "<th>Titel" . $this->orderby('title') . "</th>";
        $table .= "<th>År" . $this->orderby('year') . "</th>";
        $table .= "<th>Genre</th>";
        $table .= "</tr>";
        foreach ($res as $key => $row) {
            $table .= "<tr>";
            $table .= "<td>" . htmlentities($key) . "</td>";
            $table .= "<td>" . htmlentities($row->id) . "</td>";
            $table .= "<td><img src='" . htmlentities($row->image) . "' alt='" . htmlentities($row->title) . "'/></td>";
            $table .= "<td>" . htmlentities($row->title) . "</td>";
            $table .= "<td>" . htmlentities($row->YEAR) . "</td>";
            $table .= "<td>" . htmlentities($row->genre) . "</td>";
            $table .= "</tr>\n";
        }
        $table .= "</table>";

        return $table;
    }

    /**
     * Function to create links for sorting
     *
     * @param string $column the name of the database column to sort by
     * @return string with links to order by column.
     */
    private function orderby($column)
    {
        $nav  = "<a href='" . $this->getQueryString(array('orderby'=>$column, 'order'=>'asc')) . "'>&darr;</a>";
        $nav .= "<a href='" . $this->getQueryString(array('orderby'=>$column, 'order'=>'desc')) . "'>&uarr;</a>";

        return "<span class='orderby'>" . $nav . "</span>";
    }

    /**
     * Use the current querystring as base, modify it according to $options and return the modified query string.
     *
     * @param array $options to set/change.
     * @param string $prepend this to the resulting query string
     * @return string with an updated query string.
     */
    public function getQueryString($options=array(), $prepend='?')
    {
        // parse query string into array
        $query = array();
        parse_str($_SERVER['QUERY_STRING'], $query);

        // Modify the existing query string with new options
        $query = array_merge($query, $options);

        // Return the modified querystring
        return $prepend . htmlentities(http_build_query($query));
    }

    /**
     * Create links for hits per page.
     *
     * @param array $hits a list of hits-options to display.
     * @param array $current value.
     * @return string as a link to this page.
     */
    public function getHitsPerPage($hits, $current=null)
    {
        $nav = "Träffar per sida: ";
        foreach($hits AS $val) {
            if($current == $val) {
                $nav .= "$val ";
            }
            else {
                $nav .= "<a href='" . $this->getQueryString(array('hits' => $val)) . "'>$val</a> ";
            }
        }

        return $nav;
    }

    /**
     * Create navigation among pages.
     *
     * @param integer $hits per page.
     * @param integer $page current page.
     * @param integer $max number of pages.
     * @param integer $min is the first page number, usually 0 or 1.
     * @return string as a link to this page.
     */
    public function getPageNavigation($hits, $page, $max, $min=1)
    {
        $nav  = ($page != $min) ? "<a href='" . $this->getQueryString(array('page' => $min)) . "'>&lt;&lt;</a> " : '&lt;&lt; ';
        $nav .= ($page > $min) ? "<a href='" . $this->getQueryString(array('page' => ($page > $min ? $page - 1 : $min) )) . "'>&lt;</a> " : '&lt; ';

        for($i=$min; $i<=$max; $i++) {
            if($page == $i) {
                $nav .= "$i ";
            }
            else {
              $nav .= "<a href='" . $this->getQueryString(array('page' => $i)) . "'>$i</a> ";
          }
        }

        $nav .= ($page < $max) ? "<a href='" . $this->getQueryString(array('page' => ($page < $max ? $page + 1 : $max) )) . "'>&gt;</a> " : '&gt; ';
        $nav .= ($page != $max) ? "<a href='" . $this->getQueryString(array('page' => $max)) . "'>&gt;&gt;</a> " : '&gt;&gt; ';

        return $nav;
    }
}
