<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class='col-md-12'>
                <h4 class="page-head-line">Controller - Time: <?php echo date("H:i:s d-m-y");?></h4>
            </div>
            <div class="col-md-12">
                <div class="notice-board">
                    <div class="panel panel-default">
                        <div class='table-responsive'>
                            <table class='table table-striped table-bordered table-hover'>
                                <thead>
                                <td><b>Function</b></td>
                                <td><b>Update time</b></td>
                                <td><b>Next run</b></td>
                                <td><b>Runtime</b></td>
                                </thead>
                                <tbody>
                                <?php echo get_controller_status($pdo); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr /><br>
            </div>
        </div>
    </div>