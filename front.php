<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class='col-md-12'>
                <h4 class="page-head-line">Quick Statistics</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bk-clr-one">
                    <h5>Total posts tracked:</h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h5><?php echo single_query("SELECT COUNT(ID) as q FROM post_info",$pdo);?></h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bk-clr-two">
                    <h5>Posts that are directly reposted</h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h5><?php echo single_query("SELECT COUNT(url) as q FROM post_reposts",$pdo);?></h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bk-clr-three">
                    <h5>Subreddits tracked</h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h5><?php echo single_query("SELECT COUNT(posts) as q FROM subreddit",$pdo);?></h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bk-clr-four">
                    <h5>Users tracked</h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h5><?php echo single_query("SELECT COUNT(posts) as q FROM users",$pdo);?></h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New in the last 10 min
                        </div>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <tbody>
                                <tr><td>Posts      </td><td><?php echo last_10min_posts($pdo);?></td>
                                <tr><td>Subreddits </td><td><?php echo last_10min_subreddits($pdo);?></td>
                                <tr><td>Users      </td><td><?php echo last_10min_users($pdo);?></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="col-md-4">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New in the last hour
                        </div>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <tbody>
                                <tr><td>Posts      </td><td><?php echo last_hour_posts($pdo);?></td>
                                <tr><td>Subreddits </td><td><?php echo last_hour_subreddits($pdo);?></td>
                                <tr><td>Users      </td><td><?php echo last_hour_users($pdo);?></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="col-md-4">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New in the last 24 hours
                        </div>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <tbody>
                                <tr><td>Posts      </td><td><?php echo last_24hour_posts($pdo);?></td>
                                <tr><td>Subreddits </td><td><?php echo last_24hour_subreddits($pdo);?></td>
                                <tr><td>Users      </td><td><?php echo last_24hour_users($pdo);?></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="col-md-12">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            10 most reposted links
                        </div>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                <tr><td><b>Nr.</b></td><td><b>First poster</b></td><td><b>Repost URL</b></td><td><b>Amount of reposts</b></td></tr>
                                </thead>
                                <tbody>
                                <?php reposted_links_front("SELECT post_id,author,url,repost_count from post_reposts ORDER BY repost_count DESC LIMIT 10",$pdo); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="col-md-12">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            10 most active posting subreddits
                        </div>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                <tr><td><b>Nr.</b></td><td><b>Subreddit</b></td><td><b>Most active poster</b></td><td><b>Total posts in subreddit</b></td></tr>
                                </thead>
                                <tbody>
                                <?php subreddits_posts_front("SELECT subreddit,posts,most_active_user from subreddit ORDER BY posts DESC LIMIT 10",$pdo); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <div class="col-md-12">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            10 most posting users (Most likely all bots)
                        </div>
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                <tr><td><b>Nr.</b></td><td><b>Username</b></td><td><b>Amount of posts</b></td></tr>
                                </thead>
                                <tbody>
                                <?php user_posts_front("SELECT name,posts from users ORDER BY posts DESC LIMIT 10",$pdo); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>