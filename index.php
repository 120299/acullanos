<?php
include 'constants/settings.php';
include 'constants/check-login.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <ul class="navbar-nav d-flex d-xxl-flex justify-content-center align-items-center flex-nowrap ms-auto justify-content-xxl-center align-items-xxl-center" style="width: 100%;">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="nav-link" href="index.php">
                                        <span class="badge bg-danger badge-counter">3+</span>
                                        <i class="fas fa-home fa-fw" style="font-size: 24px;color:#EF7F1A"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="nav-link" href="location.php">
                                        <i class="fas fa-map-marker-alt fa-fw" style="font-size: 24px;"></i>
                                    </a>
                                </div>
                            </li>
                            <?php if ($user_online == true) {
                                    print '
                                    <li class="nav-item dropdown no-arrow mx-1">
                                        <div class="nav-item dropdown no-arrow">
                                            <a class="nav-link" href="'.$myrole.'">
                                                <i class="fas fa-city fa-fw" aria-hidden="true" style="font-size: 24px;color:#54AF3A"></i>
                                            </a>
                                        </div>
                                    </li>     

                                    <li class="nav-item dropdown no-arrow ">
                                        <div class="nav-item dropdown no-arrow">
                                            <a class="dropdown-toggle nav-link" href="logout.php"> 
                                                <i class="active far fas fa-user-times fa-fw" style="font-size: 24px;"></i>
                                            </a>
                                        </div>
                                    </li>';
                                     } else {
                                    print '
                                    <li class="nav-item dropdown no-arrow mx-1">
                                        <div class="nav-item dropdown no-arrow">
                                            <a class="nav-link" href="login.php?p=user">
                                                <i class="fas fa-city fa-fw" style="font-size: 24px;"></i>
                                            </a>
                                        </div>
                                    </li>';
                            } ?>

                            <li class=" nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="nav-link"  href="#">
                                        <i class="active far fa-question-circle fa-fw" style="font-size: 24px;"></i></a>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                        </ul>
                    </div>
                </nav>
                <div class="container">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Noticias</h3>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1>Aqui iran los post</h1>
                        </div>
                    </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Acullanos 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>