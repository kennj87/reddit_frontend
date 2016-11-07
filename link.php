<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class='col-md-12'>
                <h4 class="page-head-line">Link</h4>
            </div>
            <div class="col-md-12">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo get_link_from_id($pdo,$_GET['id']); ?>
                        </div>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                <td><b>Created</b></td>
                                <td><b>User</b></td>
                                <td><b>Subreddit</b></td>
                                <td><b>Link to post</b></td>
                                </thead>
                                <tbody>
                                <?php echo get_link_page_info($pdo,$_GET['id']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr /><br>
            </div>
        </div>
    </div>