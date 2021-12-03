<?php
include 'constants/settings.php';
include 'constants/check-login.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}


    </style>
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
                                    <a class="dropdown-toggle nav-link" href="index.php">
                                        <span class="badge bg-danger badge-counter">3+</span>
                                        <i class="fas fa-home fa-fw" style="font-size: 24px"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" href="location.php">
                                        <i class="fas fa-map-marker-alt fa-fw active" style="font-size: 24px;color:#EF7F1A"></i>
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
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <i class="active far fa-question-circle fa-fw" style="font-size: 24px;"></i></a>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                        </ul>
                    </div>
                </nav>
                <div class="container">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Puntos de Recolecci&oacute;n</h3>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12" style="height: 95vh;margin: 0;padding: 0;">
                            <div id="map"></div>
                        </div>
                    </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script>

var lugares = [
              {lat:4.0859629, lng:-73.6603517},
              {lat:4.0707868, lng:-73.6750385},
              {lat:4.0707888, lng:-73.6750385}
          ];
function initMap() {
  const center = {lat:4.0859629, lng:-73.6603517};

  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: center,
  });

  for (i=0; i < lugares.length; i++){
    const image ="./assets/img/Ubication.png";
  const contentString =
    '<div id="content">' +
    '<div id="siteNotice">' +
    "</div>" +
    '<h1 id="firstHeading" class="firstHeading">Puntos Acullanos</h1>' +
    '<div id="bodyContent">' +
    "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
    "sandstone rock formation in the southern part of the " +
    "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
    "south west of the nearest large town, Alice Springs; 450&#160;km " +
    "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
    "features of the Uluru - Kata Tjuta National Park. Uluru is " +
    "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
    "Aboriginal people of the area. It has many springs, waterholes, " +
    "rock caves and ancient paintings. Uluru is listed as a World " +
    "Heritage Site.</p>" +
    '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
    "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
    "(last visited June 22, 2009).</p>" +
    "</div>" +
    "</div>";
        
  const infowindow = new google.maps.InfoWindow({
    content: contentString,
    maxWidth: 300,
  });

  const marker = new google.maps.Marker({
    position:lugares[i],
    map,
    title: "Punto Acullanos",
    icon: image,
  });

  marker.addListener("click", () => {
    infowindow.open({
      anchor: marker,
      map,
      shouldFocus: false,
    });
  });
  
};

}

    </script>
            <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpGj1jCS3BQSqZ1JdZ5Rvwx3M-dCPJUuA&callback=initMap&libraries=&v=weekly" defer  ></script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>