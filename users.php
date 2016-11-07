<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class='col-md-12'>
                <h4 class="page-head-line">Posts</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Posts (Time Zone is GMT +0)
                        </div>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                <tr><td><b>Found</b></td>
                                    <td><b>Name</b></td>
                                    <td><b>Posts</b></td>
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                include 'db.php';
                                try {

// Find out how many items are in the table
                                    $total = $pdo->query('
SELECT
COUNT(*)
FROM
users
')->fetchColumn();

// How many items to list per page
                                    $limit = 50;

// How many pages will there be
                                    $pages = ceil($total / $limit);

// What page are we currently on?
                                    $page = min($pages, filter_input(INPUT_GET, 'pag', FILTER_VALIDATE_INT, array(
                                        'options' => array(
                                            'default'   => 1,
                                            'min_range' => 1,
                                        ),
                                    )));

// Calculate the offset for the query
                                    $offset = ($page - 1)  * $limit;

// Some information to display to the user
                                    $start = $offset + 1;
                                    $end = min(($offset + $limit), $total);


// Prepare the paged query
                                    $stmt = $pdo->prepare('
                                    SELECT
                                    ID,name,posts,created
                                    FROM
                                    users
                                    ORDER BY
                                    posts
                                    DESC
                                    LIMIT
                                    :limit
                                    OFFSET
                                    :offset
                                    ');

// Bind the query params
                                    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                                    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                                    $stmt->execute();

// Do we have any results?
                                    if ($stmt->rowCount() > 0) {
// Define how we want to fetch the results
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        $iterator = new IteratorIterator($stmt);

// Display the results
                                        foreach ($iterator as $row) {
                                            $timestamp = $row['created'];
                                            echo "
                    <tr><td>" . gmdate("H:i:s d-m-y", $timestamp) . "</td>
                    <td>" . $row['name'] . "</td>
                    <td style='text-align:center'>" . $row['posts'] . "</td>";
                                        }
                                    } else {
                                        echo '<p>No results could be displayed.</p>';
                                    }

                                } catch (Exception $e) {
                                    echo '<p>', $e->getMessage(), '</p>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
        <?php
        // The "back" link
        $prevlink = ($page > 1) ? '<a href="?page=posts&pag=1" title="First page">&laquo;</a> <a href="?page=posts&pag=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

        // The "forward" link
        $nextlink = ($page < $pages) ? '<a href="?page=posts&pag=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=posts&pag=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

        // Display the paging information
        echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, '</li></ul> </p></div>';
        ?>
    </div>
</div>
