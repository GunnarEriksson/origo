<?php
/**
 * Blog, handles the blog posts stored in the database.
 *
 */
class Blog
{
    private $db;
    private $acronym;
    private $blogTitle;

    /**
     * Constructor
     *
     * @param Database $db the database object.
     * @param string $acronym the acronym of the user, default null.
     */
    public function __construct($db, $acronym=null)
    {
        $this->db = $db;
        $this->acronym = $acronym;
        $this->blogTitle = null;
    }

    /**
     * Get blog post from slug.
     *
     * Returns the blog post defined by the slug. If no slug is defined, all
     * available blog posts is returned.
     *
     * @param  string $slug the slug that points out the blog post.
     * @param  Textfilter $textFilter the textfilter obect for text filtering.
     *
     * @return html the blog post or all blog posts, if no slug is defined.
     */
    public function getBlogPostsFromSlug($slug, $textFilter)
    {
        $sql = $this->prepareSqlQury($slug);
        try {
            $blogs = $this->getBlogsFromDb($sql, $slug);
            $html = $this->createBlogPosts($slug, $blogs, $textFilter);
        } catch (UnexpectedValueException $exception) {
            $html = $this->createErrorMessagePage($exception->getMessage());
        }

        return $html;
    }

    /**
     * Helper funktion to prepare the SQL query.
     *
     * Prepares the SQL query to get all blog posts or one blog post, if a slug
     * is defined.
     *
     * @param  string $slug the slug to point out a specific blog post.
     *
     * @return SQL string the string to find blog post or all blog posts.
     */
    private function prepareSqlQury($slug)
    {
        $slugSql = $slug ? 'slug = ?' : '1';
        $sql = "
            SELECT *
            FROM Content
            WHERE
                type = 'post' AND
                $slugSql AND
                published <= NOW()
            ORDER BY updated DESC;
        ";

        return $sql;
    }

    /**
     * Helper function to get blog post(s) from database.
     *
     * Sends a query to get all blog post or one specfic blog post, if a slug
     * is defined.
     *
     * @param  SQL string $sql the string to search for blog post(s).
     * @param  string $slug the slug to point out a specific blog post.
     *
     * @return [] array which includes information about the blog post(s).
     */
    private function getBlogsFromDb($sql, $slug)
    {
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($slug));

        if (isset($res[0])) {
            return $res;
        } else {
            if ($slug) {
                throw new UnexpectedValueException('Det fanns inte en sådan bloggpost!');
            } else {
                throw new UnexpectedValueException('Det fanns inga bloggposter!');
            }
        }
    }

    /**
     * Helper function to create the blog post(s).
     *
     * Creates an HTML section wich presents all the blog posts or one specific
     * blog post if a slug is defined.
     *
     * @param  string $slug the slug to point out a specific blog post.
     * @param  [] $blogs array of blog post(s) information
     * @param  Textfilter $textFilter the textfilter obect for text filtering.
     *
     * @return html the section with blog post(s) information.
     */
    private function createBlogPosts($slug, $blogs, $textFilter)
    {
        $html = "<section><h1>Blogg</h1>";
        foreach($blogs as $blog) {
            $title  = htmlentities($blog->title, null, 'UTF-8');
            $author = htmlentities($blog->author, null, 'UTF-8');
            if (empty($author)) {
                $author = "Anonym";
            }

            $published = htmlentities($blog->published, null, 'UTF-8');
            $data   = $textFilter->doFilter(htmlentities($blog->data, null, 'UTF-8'), $blog->filter);

            // Set blog title if it is only one blog
            if ($slug) {
                $this->blogTitle = $title;
            }

            $editLink = $this->acronym ? "<a href='content_edit.php?id={$blog->id}'>Uppdatera posten</a>" : null;

            $html .= <<<EOD
                <article class="blogpost">
                    <header>
                        <h2><a href='content_blog.php?slug={$blog->slug}'>{$title}</a></h2>
                    </header>
                    <p class="font-small-italic">Av {$author}</p>
                    <p class="font-small-italic">{$published}</p>
                    <p>{$data}</p>
                    <footer>
                        <p>{$editLink}<p>
                    </footer>
                </article>
EOD;
        }

        $html .= "</section>";

        return $html;
    }

    /**
     * Helper function to create an error message page.
     *
     * Creats an HTML arcticle to inform than an error has occured.
     *
     * @param  string $errorMessage the error message to be displayed at the page.
     *
     * @return html the article presenting the error.
     */
    private function createErrorMessagePage($errorMessage)
    {
        $html = <<<EOD
        <article>
            <header>
                <h1>Fel har uppstått</h1>
                </header>
                <p>{$errorMessage}</p>
        </article>
EOD;

        return $html;
    }

    public function getBlogTitle()
    {
        return $this->blogTitle;
    }
}
