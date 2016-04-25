<?php
/**
 * Movie seach, provides a form for searching movies and preparing data base requests.
 *
 */
class MovieSearch
{
    private $db;
    private $parameters;
    private $sqlOrig;
    private $groupby;
    private $sort;
    private $limit;
    private $numOfRows;


    /**
     * Constructor creating a movie seach form object.
     *
     * @param [] $parameters Array of parameters such as title, hits, page, year1,
     *                       year2, orderby and order.
     */
    public function __construct($db, $parameters)
    {
        $this->db = $db;
        $default = $this->createDefaultParameters();
        $this->parameters = array_merge($default, $parameters);
        $this->sqlOrig = $this->createOriginalSqlQuery();
        $this->groupby = ' GROUP BY M.id';
        $orderby = $this->parameters['orderby'];
        $order = $this->parameters['order'];
        $this->sort = " ORDER BY $orderby $order";
        $this->limit = null;
        $this->numOfRows = null;
    }

    /**
     * Helper function to create an array of default parameters.
     *
     * Creates an array of default values for the arguments to the class.
     * Is used to replace values of missing parameters.
     *
     * @return [] the array of default values for argument parameters.
     */
    private function createDefaultParameters()
    {
        $default = array(
            'title' => null,
            'hits' => null,
            'page' => null,
            'year1' => null,
            'year2' => null,
            'orderby' => null,
            'order' => null,
        );

        return $default;
    }

    /**
     * Helper function to create the original SQL string.
     *
     * Creats the original SQL string than can be modified if necessary.
     *
     * @return SQL the original SQL string.
     */
    private function createOriginalSqlQuery()
    {
        $sqlOrig = '
          SELECT
            M.*,
            GROUP_CONCAT(G.name) AS genre
          FROM Movie AS M
            LEFT OUTER JOIN Movie2Genre AS M2G
              ON M.id = M2G.idMovie
            INNER JOIN Genre AS G
              ON M2G.idGenre = G.id
        ';

        return $sqlOrig;
    }

    /**
     * Creates the movie search form.
     *
     * Creates the movie search form. Parameters that can be uses for searching
     * for films is title, from year and to year. The form has also the possiblity
     * to show all films in the database.
     *
     * @return html the movie search form.
     */
    public function getMovieSearchForm()
    {
        $html = '<form>';
        $html .= '<fieldset>';
        $html .= '<legend>Sök</legend>';
        $html .= '<input type=hidden name=hits value="' . htmlentities($this->parameters['hits']) . '"/>';
        $html .= '<input type=hidden name=page value="1"/>';
        $html .= '<p><label>Titel: <input type="search" name="title" value="' . htmlentities($this->parameters['title']) . '"/> (delsträng, använd % som *)</label></p>';
        $html .= '<p><label>Årtal: <input type="text" name="year1" value="'. htmlentities($this->parameters['year1']) . '"/></label>';
        $html .= ' - ';
        $html .= '<label><input type="text" name="year2" value="'. htmlentities($this->parameters['year2']) . '"/></label></p>';
        $html .= '<p><input type="submit" name="submit" value="Sök"/></p>';
        $html .= '<p><a href="?">Visa alla filmer</a></p>';
        $html .= '</fieldset>';
        $html .= '</form>';

        return $html;
    }

    /**
     * Search in database for films.
     *
     * Searches in the database for films. Makes a second request to get the
     * number of hits(number of rows). The value can be fetch with the function
     * getNumberOfRows().
     *
     * @return [] the result set from the database containing information about
     *            the movies, such as row, id, link to image, title, year and genre.
     */
    public function searchMovie()
    {
        $query = $this->prepareSearchMovieQuery();
        $movieSearchRes = $this->db->ExecuteSelectQueryAndFetchAll($query['sql'], $query['params']);

        $query = $this->prepareNumberOfRowsQuery();
        $res = $this->db->ExecuteSelectQueryAndFetchAll($query['sql'], $query['params']);
        $this->numOfRows = $res[0]->rows;

        return $movieSearchRes;
    }

    /**
     * Helper function to prepare an SQL string to search for movies in database.
     *
     * Prepares an SQL string for searching in the database for movies. Includes
     * the possiblity to group, sort and limit the result. The SQL string is a
     * combination of an original SQL string and a optional where statement.
     *
     * @return [] the array containing the SQL string and parameters, if included.
     */
    private function prepareSearchMovieQuery()
    {
        $sqlOrig = $this->sqlOrig;
        $query = $this->prepareQueryAndParams();
        $where = $query['where'];
        $where = $where ? " WHERE 1 {$where}" : null;
        $sql = $sqlOrig . $where . $this->groupby . $this->sort . $this->limit;

        return array('sql' => $sql, 'params' => $query['params']);
    }

    /**
     * Helper function to prepare an SQL where statement.
     *
     * Prepares an SQL where statement depending of the purpose of the search.
     * Supports multiple searches and parameters.
     *
     * @return [] the array with where statements and parameters, if included.
     */
    private function prepareQueryAndParams()
    {
        $where = null;
        $sqlParameters = array();

        // Select by title
        if($this->parameters['title']) {
          $where .= ' AND title LIKE ?';
          $sqlParameters[] = $this->parameters['title'];
        }

        // Select by year
        if($this->parameters['year1']) {
          $where .= ' AND year >= ?';
          $sqlParameters[] = $this->parameters['year1'];
        }

        if($this->parameters['year2']) {
          $where .= ' AND year <= ?';
          $sqlParameters[] = $this->parameters['year2'];
        }

        // Pagination
        if($this->parameters['hits'] && $this->parameters['page']) {
          $this->limit = " LIMIT {$this->parameters['hits']} OFFSET " . (($this->parameters['page'] - 1) * $this->parameters['hits']);
        }

        if (empty($sqlParameters)) {
            $query = array('where' => $where, 'params' => null);
        } else {
            $query = array('where' => $where, 'params' => $sqlParameters);
        }

        return $query;
    }

    /**
     * Helper method to prepare number of rows query.
     *
     * Prepares the SQL string to get the number of rows(hits) for the movie
     * search in the database.
     *
     * @return [] the array containing the SQL string and parameters, if included,
     *            to get number of rows(hits).
     */
    private function prepareNumberOfRowsQuery()
    {
        $query = $this->prepareQueryAndParams();
        $where = $query['where'];

        $sql = "
          SELECT
            COUNT(id) AS rows
          FROM
          (
            $this->sqlOrig $where $this->groupby
          ) AS Movie
        ";

        return array('sql' => $sql, 'params' => $query['params']);
    }

    /**
     * Get the number of rows for the movie search.
     *
     * Returns the number of rows(hits) for the movie search.
     *
     * @return integer the number of rows(hits) for the movie search.
     */
    public function getNumberOfRows()
    {
        return $this->numOfRows;
    }

    /**
     * Gets the maximum number of pages.
     *
     * Returns the maximum number of pages depending how many rows that should
     * be shown in the table. Is used for paging.
     *
     * @return integer the maximum number of pages depending how many rows
     *                 that should be shown in the movie table.
     */
    public function getMaxNumPages()
    {
        return ceil($this->numOfRows / $this->parameters['hits']);
    }
}
