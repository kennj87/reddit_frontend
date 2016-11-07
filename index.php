<?php include 'functions.php';include 'db.php';?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reddit - Statistics</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Reddit<strong> Statistics </strong>Analyzer
                </div>
            </div>
        </div>
    </header>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">

                    <img src="assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="glyphicon glyphicon-off" style="font-size: 25px;"></span></a>

                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php?page=front">Front</a></li>
                            <li><a class="menu-top" href="index.php?page=posts">Posts</a></li>
                            <li><a class="menu-top" href="index.php?page=reposts">Reposts</a></li>
                            <li><a class="menu-top" href="index.php?page=subreddits">Subreddits</a></li>
                            <li><a class="menu-top" href="index.php?page=users">Users</a></li>
                            <li><a class="menu-top" href="#">Image-Search</a></li>
                            <li><a class="menu-top" href="index.php?page=status">(Status)</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Page load -->

    <?php
    if (!empty($_GET["page"])){
        include $_GET["page"].".php";
    }else{
        include 'front.php';
    }

    ?>

    <!-- Page load -->
    <footer>
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    &copy; 2016 Kennj.com | For : Reddit. Everything on this site could be wrong, it most likely is'nt though. In case you wish to complain click here: <a href='http://41.media.tumblr.com/c67ae0323274472ce29d408466509108/tumblr_nffb143J2y1u0hki1o1_1280.jpg'>HERE</a>
                </div>

            </div>
        </div>
    </footer>
</body>
</html>
