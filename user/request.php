<?php
require '../constants/settings.php';
require 'constants/check-login.php';

$servidor = "localhost";
$usuario = "root";
$password = "";
$nombreBD = "acullanos";
$conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conexion->connect_error) {
    die("la conexión ha fallado: " . $conexion->connect_error);
}
if ($user_online == "true") {
    if ($myrole == "user") {
    } else {
        header("location:../");
    }
} else {
    header("location:../");
}

if (!isset($_POST['buscar'])) {
    $_POST['buscar'] = '';
}
if (!isset($_POST['buscafechadesde'])) {
    $_POST['buscafechadesde'] = '';
}
if (!isset($_POST['buscafechahasta'])) {
    $_POST['buscafechahasta'] = '';
}
if (!isset($_POST["orden"])) {
    $_POST["orden"] = '';
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "" || $page == "1") {
        $page1 = 0;
        $page = 1;
    } else {
        $page1 = $page * 5 - 5;
    }
} else {
    $page1 = 0;
    $page = 1;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Solicitud de Recolecci&oacute;n</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css" />
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css" />
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />

    <script src="../assets/js/jquery-3.4.1.js"></script>
    <script src="../assets/js/cargarmunicipios.js"></script>
    <script src="../assets/js/cargarmunicipios2.js"></script>
    <script src="../assets/js/cargarmunicipios3.js"></script>


</head>

<body id="page-top">
    <div id="wrapper">
        <nav
            class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Acullanos</span></div>
                </a>
                <hr class="sidebar-divider my-0" />
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-user"></i><span>Detalles de la
                                Empresa</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="request.php"><i class="fas fa-table"></i><span>Solicitudes de
                                Recolecci&oacute;n</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="harvest.php"><i class="fas fa-table"></i><span>Detalles de
                                Recolecci&oacute;n</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Login</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html"><i
                                class="fas fa-user-circle"></i><span>Register</span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline">
                    <button class="btn  border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="navbar-nav d-flex d-xxl-flex justify-content-center align-items-center flex-nowrap ms-auto justify-content-xxl-center align-items-xxl-center"
                            style="width: 100%;">
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" href="index.php">
                                        <span class="badge bg-danger badge-counter">3+</span>
                                        <i class="fas fa-home fa-fw" style="font-size: 24px;"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" href="location.php">
                                        <i class="fas fa-map-marker-alt fa-fw active" style="font-size: 24px;"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" href="login.php?p=user">
                                        <i class="fas fa-city fa-fw" style="font-size: 24px; color: #ef7f1a;"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" href="#"> <i
                                            class="active far fa-question-circle fa-fw"
                                            style="font-size: 24px;"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow ">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" href="../logout.php"> <i
                                            class="active far fas fa-user-times fa-fw" style="font-size: 24px;"></i></a>
                                </div>
                            </li>
                            <div class="d-none d-md-block topbar-divider"></div>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid mt-5">
                    <h3 class="text-dark mb-4">Solicitudes de recolecci&oacute;n</h3>
                    <?php require 'constants/check_reply.php'; ?>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">

                                        <form id="form2" name="form2" method="POST" action="request.php">
                                            <div class="col-12 row">

                                                <h4 class="card-title">Filtro de búsqueda</h4>
                                                <div class="col-md-3 my-2">
                                                    <a class="btn col-12 btn-secondary" data-bs-toggle="modal"
                                                        href="#request" role="button">Agregar solicitud</a>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row d-flex align-items-end">
                                                        <!----Bottom-Agregar-Solicitud--->

                                                        <!----Fin-Bottom---->

                                                        <div class="col-12 my-2  col-md-3">
                                                            <label class="my-2 ">Buscar por</label>
                                                            <input type="text" class="form-control" id="buscar"
                                                                name="buscar"
                                                                placeholder="Nombre, ciudad, teléfono, etc..."
                                                                value="<?php echo $_POST["buscar"]; ?>"
                                                                style="border: #bababa 1px solid; color:#000000;">
                                                        </div>
                                                        <div class="col-12 col-md-2  my-2 ">
                                                            <label> Fecha desde:</label>
                                                            <input type="date" id="buscafechadesde"
                                                                name="buscafechadesde" class="form-control mt-2"
                                                                value="<?php echo $_POST["buscafechadesde"]; ?>"
                                                                style="border: #bababa 1px solid; color:#000000;">
                                                        </div>
                                                        <div class="col-12 col-md-2  my-2 ">
                                                            <label> Fecha hasta:</label>
                                                            <input type="date" id="buscafechahasta"
                                                                name="buscafechahasta" class="form-control mt-2"
                                                                value="<?php echo $_POST["buscafechahasta"]; ?>"
                                                                style="border: #bababa 1px solid; color:#000000;">
                                                        </div>
                                                        <div class="col-12 col-md-3  my-2 ">
                                                            <label> Filtrar</label>
                                                            <select id="assigned-tutor-filter" id="orden" name="orden"
                                                                class="form-control mt-2"
                                                                style="border: #bababa 1px solid; color:#000000;">
                                                                <?php if ($_POST["orden"] != '') { ?>
                                                                <option value="<?php echo $_POST["orden"]; ?>">
                                                                    <?php
                                                                    if ($_POST["orden"] == '1') {
                                                                        echo 'Ordenar por nombre';
                                                                    }
                                                                    if ($_POST["orden"] == '2') {
                                                                        echo 'Ordenar por fecha de reciente';
                                                                    }
                                                                    if ($_POST["orden"] == '3') {
                                                                        echo 'Ordenar por fecha de antigua';
                                                                    }
                                                                    if ($_POST["orden"] == '4') {
                                                                        echo 'Ordenar por cantidad kg menor';
                                                                    }
                                                                    if ($_POST["orden"] == '5') {
                                                                        echo 'Ordenar por cantidad kg mayor';
                                                                    }
                                                                    ?>
                                                                </option>
                                                                <?php } ?>
                                                                <option value="">Seleccionar</option>
                                                                <option value="1">Ordenar por nombre</option>
                                                                <option value="2">Ordenar por fecha de reciente</option>
                                                                <option value="3">Ordenar por fecha de antigua
                                                                <option value="4">Ordenar por cantidad kg menor
                                                                <option value="5">Ordenar por cantidad kg mayor
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-2  my-2 ">
                                                            <input type="submit" class="col-12 btn btn-primary "
                                                                value="Buscar" style="color: white;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php
                                            /*FILTRO de busqueda////////////////////////////////////////////*/
                                            if ($_POST['buscar'] == '') {
                                                $_POST['buscar'] = ' ';
                                            }
                                            $aKeyword = explode(" ", $_POST['buscar']);

                                            if ($_POST["buscar"] == '' and $_POST['buscafechadesde'] == '' and $_POST['buscafechahasta'] == '') {
                                                $query = "SELECT * FROM tbl_request ";
                                            } else {
                                                $query = "SELECT * FROM tbl_request ";

                                                if ($_POST["buscar"] != '') {
                                                    $query .= "WHERE (name LIKE LOWER('%" . $aKeyword[0] . "%') OR phone LIKE LOWER('%" . $aKeyword[0] . "%') OR city LIKE LOWER('%" . $aKeyword[0] . "%'))  AND member_no = '$myid' ";

                                                    for ($i = 1; $i < count($aKeyword); $i++) {
                                                        if (!empty($aKeyword[$i])) {
                                                            $query .= " OR name LIKE '%" . $aKeyword[$i] . "%' OR phone LIKE '%" . $aKeyword[$i] . "%'  OR city LIKE '%" . $aKeyword[$i] . "%' AND member_no = '$myid'";
                                                        }
                                                    }
                                                }

                                                if ($_POST["buscafechadesde"] != '') {
                                                    $query .= "AND member_no = '$myid' AND recoleccion BETWEEN '" . $_POST["buscafechadesde"] . "' AND '" . $_POST["buscafechahasta"] . "' ";
                                                }

                                                if ($_POST["orden"] == '1') {
                                                    $query .= "AND member_no = '$myid' ORDER BY name ASC ";
                                                }

                                                if ($_POST["orden"] == '2') {
                                                    $query .= "AND member_no = '$myid' ORDER BY recoleccion ASC ";
                                                }

                                                if ($_POST["orden"] == '3') {
                                                    $query .= "AND member_no = '$myid' ORDER BY recoleccion DESC ";
                                                }

                                                if ($_POST["orden"] == '4') {
                                                    $query .= "AND member_no = '$myid' ORDER BY solicitudkg ASC ";
                                                }

                                                if ($_POST["orden"] == '5') {
                                                    $query .= " ORDER BY solicitudkg DESC ";
                                                }
                                            }

                                            $sql = $conexion->query($query);

                                            $numeroSql = mysqli_num_rows($sql);
                                            ?>
                                            <p class="my-5" style="font-weight: bold; color:#ef7f1a;"><i
                                                    class="mdi mdi-file-document"></i>
                                                <?php echo $numeroSql; ?> Resultados encontrados</p>
                                        </form>
                                        <!--Modal--Agregar--Solicitud---->
                                        <div class="modal fade" id="request" aria-hidden="true"
                                            aria-labelledby="request" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="request">Solicitud
                                                            sede
                                                            principal</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <form class="was-validated" action="app/add-request.php"
                                                                method="POST" autocomplete="off">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="company">
                                                                                <strong>Nombre o Razón
                                                                                    Social </strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="company"
                                                                                value="<?php echo "$mycompany"; ?>"
                                                                                placeholder="<?php echo "$mycompany"; ?>"
                                                                                name="company" readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="nit">
                                                                                <strong>Número de
                                                                                    identificación o NIT
                                                                                </strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="nit" value="<?php echo "$mynit"; ?>"
                                                                                placeholder="<?php echo "$mynit"; ?>"
                                                                                name="nit" readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="name"><strong>Nombre
                                                                                    completo de persona
                                                                                    de
                                                                                    contacto</strong></label>
                                                                            <input class="form-control" type="text"
                                                                                id="name"
                                                                                value="<?php echo "$myname"; ?>"
                                                                                placeholder="Ingrese el nombre"
                                                                                name="name" readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="phone"><strong>Teléfono
                                                                                    de
                                                                                    contacto</strong></label>
                                                                            <input class="form-control" type="text"
                                                                                id="phone"
                                                                                value="<?php echo "$myphone"; ?>"
                                                                                placeholder="Ingrese el número telefónico"
                                                                                name="phone" readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="email">
                                                                                <strong>Correo
                                                                                    electrónico</strong>
                                                                            </label>
                                                                            <input class="form-control" type="email"
                                                                                id="email"
                                                                                value="<?php echo "$myemail"; ?>"
                                                                                placeholder="<?php echo "$myemail"; ?>"
                                                                                name="email" readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="establishment">
                                                                                <strong>Tipo de
                                                                                    establecimiento
                                                                                </strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="establishment"
                                                                                value="<?php echo "$myestablishment"; ?>"
                                                                                placeholder="<?php echo "$myestablishment"; ?>"
                                                                                name="establishment"
                                                                                readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="street">
                                                                                <strong>Dirección</strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="street"
                                                                                value="<?php echo "$mystreet"; ?>"
                                                                                placeholder="Ingrese dirección del establecimiento"
                                                                                name="street" readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="departaments">
                                                                                <strong>Departamento</strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="departament"
                                                                                value="<?php echo "$mydepartament"; ?>"
                                                                                placeholder="<?php echo "$mydepartament"; ?>"
                                                                                name="departament" readonly="readonly">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="minucipios">
                                                                                <strong>Ciuidad</strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="city"
                                                                                value="<?php echo "$mycity"; ?>"
                                                                                placeholder="<?php echo "$mycity"; ?>"
                                                                                name="city" readonly="readonly">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="kg">
                                                                                <strong>Cantidad para
                                                                                    recoger en
                                                                                    kg</strong>
                                                                            </label>
                                                                            <input class="form-control " type="text"
                                                                                id="kg"
                                                                                placeholder="Ingrese la cantidad en número"
                                                                                name="solicitudkg" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="harvest">
                                                                                <strong>Fecha de
                                                                                    recolecci&oacute;n</strong>
                                                                            </label>
                                                                            <input class="form-control" type="date"
                                                                                name="recoleccion" id="date"
                                                                                min="<?php echo date("Y-m-d", strtotime(date("Y-m-d"))); ?>"
                                                                                required>
                                                                            <input type="datetime" name="radicado"
                                                                                value="<?php echo date("Y-m-d\TH-i"); ?>"
                                                                                style="visibility:hidden">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <button type="submit"
                                                                        class="col-12 btn btn-secondary">Enviar</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-md-center ">
                                                                <button class="col-12  col-md-4  btn btn-primary m-1"
                                                                    data-bs-target="#update"
                                                                    data-bs-toggle="modal">Actualizar
                                                                    Información</button>
                                                                <button class="col-12  col-md-4  btn btn-primary m-1"
                                                                    data-bs-target="#headquarters"
                                                                    data-bs-toggle="modal">Solicitud de
                                                                    otra sede</button>
                                                                <button type="button"
                                                                    class="col-12  col-md-2 m-1  btn btn-danger "
                                                                    data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="update" aria-hidden="true" aria-labelledby="update"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="update">Actualizar
                                                            datos
                                                            de la empresa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <form id="f1" name="f1" class="was-validated"
                                                                action="app/update-profile.php" method="POST"
                                                                autocomplete="off">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="company">
                                                                                <strong>Nombre o Razón
                                                                                    Social </strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="company"
                                                                                value="<?php echo "$mycompany"; ?>"
                                                                                placeholder="<?php echo "$mycompany"; ?>"
                                                                                name="company" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="nit">
                                                                                <strong>Número de
                                                                                    identificación o NIT
                                                                                </strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="nit" value="<?php echo "$mynit"; ?>"
                                                                                placeholder="<?php echo "$mynit"; ?>"
                                                                                name="nit" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="name"><strong>Nombre
                                                                                    completo de persona
                                                                                    de
                                                                                    contacto</strong></label>
                                                                            <input class="form-control" type="text"
                                                                                id="name"
                                                                                value="<?php echo "$myname"; ?>"
                                                                                placeholder="Ingrese el nombre"
                                                                                name="name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="phone"><strong>Teléfono
                                                                                    de
                                                                                    contacto</strong></label>
                                                                            <input class="form-control" type="text"
                                                                                id="phone"
                                                                                value="<?php echo "$myphone"; ?>"
                                                                                placeholder="Ingrese el número telefónico"
                                                                                name="phone" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="email">
                                                                                <strong>Correo
                                                                                    electrónico</strong>
                                                                            </label>
                                                                            <input class="form-control" type="email"
                                                                                id="email"
                                                                                value="<?php echo "$myemail"; ?>"
                                                                                placeholder="<?php echo "$myemail"; ?>"
                                                                                name="email" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="establishment">
                                                                                <strong>Tipo de
                                                                                    establecimiento
                                                                                </strong>
                                                                            </label>
                                                                            <select id="establishment"
                                                                                name="establishment" required
                                                                                class="form-control"
                                                                                data-live-search="true" required>
                                                                                <option value="0">
                                                                                    Seleccione...
                                                                                </option>
                                                                                <option <?php if ($myestablishment == "Comedor") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="Comedor">
                                                                                    Comedor</option>
                                                                                <option <?php if ($myestablishment == "Comidas Rápidas") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="Comidas Rápidas">Comidas
                                                                                    Rápidas
                                                                                </option>
                                                                                <option <?php if ($myestablishment == "Hotel") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="Hotel">
                                                                                    Hotel</option>
                                                                                <option <?php if ($myestablishment == "Restaurante") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="Restaurante">Restaurante
                                                                                </option>
                                                                                <option <?php if ($myestablishment == "Otro") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="Otro">Otro
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="street">
                                                                                <strong>Dirección</strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="street"
                                                                                value="<?php echo "$mystreet"; ?>"
                                                                                placeholder="Ingrese dirección del establecimiento"
                                                                                name="street" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="departaments">
                                                                                <strong>Departamento</strong>
                                                                            </label>
                                                                            <select name="departament"
                                                                                id="departamentos" required
                                                                                class="selectpicker show-tick form-control"
                                                                                data-live-search="true"
                                                                                onchange="cambia_departamento()"
                                                                                required>
                                                                                <option value="0">
                                                                                    Seleccione...
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "AMAZONAS") {
                                                                                                    print 'selected ';
                                                                                                } ?> value="AMAZONAS">
                                                                                    AMAZONAS</option>
                                                                                <option <?php if ($mydepartament == "ANTIOQUIA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="ANTIOQUIA">
                                                                                    ANTIOQUIA</option>
                                                                                <option <?php if ($mydepartament == "ARAUCA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="ARAUCA">
                                                                                    ARAUCA</option>
                                                                                <option <?php if ($mydepartament == "ATLÁNTICO") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="ATLÁNTICO">
                                                                                    ATLÁNTICO</option>
                                                                                <option <?php if ($mydepartament == "BOLÍVAR") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="BOLÍVAR">
                                                                                    BOLÍVAR</option>
                                                                                <option <?php if ($mydepartament == "BOYACÁ") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="BOYACÁ">
                                                                                    BOYACÁ</option>
                                                                                <option <?php if ($mydepartament == "CALDAS") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CALDAS">
                                                                                    CALDAS</option>
                                                                                <option <?php if ($mydepartament == "CAQUETÁ") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CAQUETÁ">
                                                                                    CAQUETÁ</option>
                                                                                <option <?php if ($mydepartament == "CASANARE") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CASANARE">
                                                                                    CASANARE</option>
                                                                                <option <?php if ($mydepartament == "CAUCA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CAUCA">
                                                                                    CAUCA</option>
                                                                                <option <?php if ($mydepartament == "CESAR") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CESAR">
                                                                                    CESAR</option>
                                                                                <option <?php if ($mydepartament == "CHOCÓ") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CHOCÓ">
                                                                                    CHOCÓ</option>
                                                                                <option <?php if ($mydepartament == "CÓRDOBA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CÓRDOBA">
                                                                                    CÓRDOBA</option>
                                                                                <option <?php if ($mydepartament == "CUNDINAMARCA") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="CUNDINAMARCA">CUNDINAMARCA
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "DISTRITO CAPITAL") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="DISTRITO CAPITAL">DISTRITO
                                                                                    CAPITAL
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "GUAINÍA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="GUAINÍA">
                                                                                    GUAINÍA</option>
                                                                                <option <?php if ($mydepartament == "GUAVIARE") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="GUAVIARE">
                                                                                    GUAVIARE</option>
                                                                                <option <?php if ($mydepartament == "HUILA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="HUILA">
                                                                                    HUILA</option>
                                                                                <option <?php if ($mydepartament == "LA GUAJIRA") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="LA GUAJIRA">LA GUAJIRA
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "MAGDALENA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="MAGDALENA">
                                                                                    MAGDALENA</option>
                                                                                <option <?php if ($mydepartament == "META") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="META">META
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "NARIÑO") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="NARIÑO">
                                                                                    NARIÑO</option>
                                                                                <option <?php if ($mydepartament == "NORTE DE SANTANDER") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="NORTE DE SANTANDER">NORTE DE
                                                                                    SANTANDER
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "PUTUMAYO") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="PUTUMAYO">
                                                                                    PUTUMAYO</option>
                                                                                <option <?php if ($mydepartament == "QUINDÍO") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="QUINDÍO">
                                                                                    QUINDÍO</option>
                                                                                <option <?php if ($mydepartament == "RISARALDA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="RISARALDA">
                                                                                    RISARALDA</option>
                                                                                <option <?php if ($mydepartament == "SAN ANDRÉS Y PROVIDENCIA") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="SAN ANDRÉS Y PROVIDENCIA">SAN
                                                                                    ANDRÉS Y
                                                                                    PROVIDENCIA</option>
                                                                                <option <?php if ($mydepartament == "SANTANDER") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="SANTANDER">
                                                                                    SANTANDER</option>
                                                                                <option <?php if ($mydepartament == "SUCRE") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="SUCRE">
                                                                                    SUCRE</option>
                                                                                <option <?php if ($mydepartament == "TOLIMA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="TOLIMA">
                                                                                    TOLIMA</option>
                                                                                <option <?php if ($mydepartament == "VALLE DEL CAUCA") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="VALLE DEL CAUCA">VALLE DEL
                                                                                    CAUCA
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "VAUPÉS") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="VAUPÉS">
                                                                                    VAUPÉS</option>
                                                                                <option <?php if ($mydepartament == "VICHADA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="VICHADA">
                                                                                    VICHADA</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="minucipios">
                                                                                <strong>Ciuidad</strong>
                                                                            </label>
                                                                            <select name="city" id="minucipios"
                                                                                class="form-control" required>
                                                                                <option <?php if ($mycity == "$mycity") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="<?php echo "$mycity"; ?>">
                                                                                    <?php echo "$mycity"; ?>
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="kg">
                                                                                <strong>Cantidad
                                                                                    generada promedio
                                                                                    Kg/mes</strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="kg" value="<?php echo "$mykg"; ?>"
                                                                                placeholder="Ingrese la cantidad en número"
                                                                                name="kg" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="harvest">
                                                                                <strong>Frecuencia de
                                                                                    recolección</strong>
                                                                            </label>
                                                                            <select name="harvest" id="harvest"
                                                                                class="form-control" required>
                                                                                <option value="0">
                                                                                    Seleccione...
                                                                                </option>
                                                                                <option <?php if ($myharvest == "Semanal") {
                                                                                                    print 'selected ';
                                                                                                } ?> value="Semanal">
                                                                                    Semanal</option>
                                                                                <option <?php if ($myharvest == "Quincenal") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="Quincenal">
                                                                                    Quincenal</option>
                                                                                <option <?php if ($myharvest == "Mensual") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="Mensual">
                                                                                    Mensual</option>
                                                                                <option <?php if ($myharvest == "A solicitud") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="A solicitud">A solicitud
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <button type="submit"
                                                                        class="col-12 btn btn-secondary">Actualizar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-md-center ">
                                                                <button class="col-12  col-md-4  btn btn-primary m-1"
                                                                    data-bs-target="#request"
                                                                    data-bs-toggle="modal">Solicitud
                                                                    sede principal</button>
                                                                <button class="col-12  col-md-4  btn btn-primary m-1"
                                                                    data-bs-target="#headquarters"
                                                                    data-bs-toggle="modal">Solicitud de
                                                                    otra sede</button>
                                                                <button type="button"
                                                                    class="col-12  col-md-2 m-1  btn btn-danger "
                                                                    data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="headquarters" aria-hidden="true"
                                            aria-labelledby="headquarters" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="headquarters">Otra
                                                            sede</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <form class="was-validated" id="f2" name="f2"
                                                                action="app/add-request.php" method="POST"
                                                                autocomplete="off">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="company">
                                                                                <strong>Nombre o Razón
                                                                                    Social </strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="company"
                                                                                value="<?php echo "$mycompany"; ?>"
                                                                                placeholder="<?php echo "$mycompany"; ?>"
                                                                                name="company" readonly="readonly"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="nit">
                                                                                <strong>Número de
                                                                                    identificación o NIT
                                                                                </strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="nit" value="<?php echo "$mynit"; ?>"
                                                                                placeholder="<?php echo "$mynit"; ?>"
                                                                                name="nit" readonly="readonly" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="name"><strong>Nombre
                                                                                    completo
                                                                                    de persona de
                                                                                    contacto</strong></label>
                                                                            <input class="form-control" type="text"
                                                                                id="name"
                                                                                value="<?php echo "$myname"; ?>"
                                                                                placeholder="Ingrese el nombre"
                                                                                name="name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="phone"><strong>Teléfono
                                                                                    de
                                                                                    contacto</strong></label>
                                                                            <input class="form-control" type="text"
                                                                                id="phone"
                                                                                value="<?php echo "$myphone"; ?>"
                                                                                placeholder="Ingrese el número telefónico"
                                                                                name="phone">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="email">
                                                                                <strong>Correo
                                                                                    electrónico</strong>
                                                                            </label>
                                                                            <input class="form-control" type="email"
                                                                                id="email"
                                                                                value="<?php echo "$myemail"; ?>"
                                                                                placeholder="<?php echo "$myemail"; ?>"
                                                                                name="email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="establishment">
                                                                                <strong>Tipo de
                                                                                    establecimiento
                                                                                </strong>
                                                                            </label>
                                                                            <select id="establishment"
                                                                                name="establishment" required
                                                                                class="form-control"
                                                                                data-live-search="true">
                                                                                <option value="0">
                                                                                    Seleccione...
                                                                                </option>
                                                                                <option <?php if ($myestablishment == "Comedor") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="Comedor">
                                                                                    Comedor</option>
                                                                                <option <?php if ($myestablishment == "Comidas Rápidas") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="Comidas Rápidas">Comidas
                                                                                    Rápidas
                                                                                </option>
                                                                                <option <?php if ($myestablishment == "Hotel") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="Hotel">
                                                                                    Hotel</option>
                                                                                <option <?php if ($myestablishment == "Restaurante") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="Restaurante">Restaurante
                                                                                </option>
                                                                                <option <?php if ($myestablishment == "Otro") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="Otro">Otro
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="street">
                                                                                <strong>Dirección</strong>
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                id="street"
                                                                                value="<?php echo "$mystreet"; ?>"
                                                                                placeholder="Ingrese dirección del establecimiento"
                                                                                name="street">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label"
                                                                                for="departaments">
                                                                                <strong>Departamento</strong>
                                                                            </label>
                                                                            <select name="departament"
                                                                                id="departamentos2" required
                                                                                class="selectpicker show-tick form-control"
                                                                                data-live-search="true"
                                                                                onchange="cambia_departamento2()">
                                                                                <option value="0">
                                                                                    Seleccione...
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "AMAZONAS") {
                                                                                                    print 'selected ';
                                                                                                } ?> value="AMAZONAS">
                                                                                    AMAZONAS</option>
                                                                                <option <?php if ($mydepartament == "ANTIOQUIA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="ANTIOQUIA">
                                                                                    ANTIOQUIA</option>
                                                                                <option <?php if ($mydepartament == "ARAUCA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="ARAUCA">
                                                                                    ARAUCA</option>
                                                                                <option <?php if ($mydepartament == "ATLÁNTICO") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="ATLÁNTICO">
                                                                                    ATLÁNTICO</option>
                                                                                <option <?php if ($mydepartament == "BOLÍVAR") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="BOLÍVAR">
                                                                                    BOLÍVAR</option>
                                                                                <option <?php if ($mydepartament == "BOYACÁ") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="BOYACÁ">
                                                                                    BOYACÁ</option>
                                                                                <option <?php if ($mydepartament == "CALDAS") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CALDAS">
                                                                                    CALDAS</option>
                                                                                <option <?php if ($mydepartament == "CAQUETÁ") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CAQUETÁ">
                                                                                    CAQUETÁ</option>
                                                                                <option <?php if ($mydepartament == "CASANARE") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CASANARE">
                                                                                    CASANARE</option>
                                                                                <option <?php if ($mydepartament == "CAUCA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CAUCA">
                                                                                    CAUCA</option>
                                                                                <option <?php if ($mydepartament == "CESAR") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CESAR">
                                                                                    CESAR</option>
                                                                                <option <?php if ($mydepartament == "CHOCÓ") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CHOCÓ">
                                                                                    CHOCÓ</option>
                                                                                <option <?php if ($mydepartament == "CÓRDOBA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="CÓRDOBA">
                                                                                    CÓRDOBA</option>
                                                                                <option <?php if ($mydepartament == "CUNDINAMARCA") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="CUNDINAMARCA">CUNDINAMARCA
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "DISTRITO CAPITAL") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="DISTRITO CAPITAL">DISTRITO
                                                                                    CAPITAL
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "GUAINÍA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="GUAINÍA">
                                                                                    GUAINÍA</option>
                                                                                <option <?php if ($mydepartament == "GUAVIARE") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="GUAVIARE">
                                                                                    GUAVIARE</option>
                                                                                <option <?php if ($mydepartament == "HUILA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="HUILA">
                                                                                    HUILA</option>
                                                                                <option <?php if ($mydepartament == "LA GUAJIRA") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="LA GUAJIRA">LA GUAJIRA
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "MAGDALENA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="MAGDALENA">
                                                                                    MAGDALENA</option>
                                                                                <option <?php if ($mydepartament == "META") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="META">META
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "NARIÑO") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="NARIÑO">
                                                                                    NARIÑO</option>
                                                                                <option <?php if ($mydepartament == "NORTE DE SANTANDER") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="NORTE DE SANTANDER">NORTE DE
                                                                                    SANTANDER
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "PUTUMAYO") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="PUTUMAYO">
                                                                                    PUTUMAYO</option>
                                                                                <option <?php if ($mydepartament == "QUINDÍO") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="QUINDÍO">
                                                                                    QUINDÍO</option>
                                                                                <option <?php if ($mydepartament == "RISARALDA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="RISARALDA">
                                                                                    RISARALDA</option>
                                                                                <option <?php if ($mydepartament == "SAN ANDRÉS Y PROVIDENCIA") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="SAN ANDRÉS Y PROVIDENCIA">SAN
                                                                                    ANDRÉS Y
                                                                                    PROVIDENCIA</option>
                                                                                <option <?php if ($mydepartament == "SANTANDER") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="SANTANDER">
                                                                                    SANTANDER</option>
                                                                                <option <?php if ($mydepartament == "SUCRE") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="SUCRE">
                                                                                    SUCRE</option>
                                                                                <option <?php if ($mydepartament == "TOLIMA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="TOLIMA">
                                                                                    TOLIMA</option>
                                                                                <option <?php if ($mydepartament == "VALLE DEL CAUCA") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="VALLE DEL CAUCA">VALLE DEL
                                                                                    CAUCA
                                                                                </option>
                                                                                <option <?php if ($mydepartament == "VAUPÉS") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="VAUPÉS">
                                                                                    VAUPÉS</option>
                                                                                <option <?php if ($mydepartament == "VICHADA") {
                                                                                                    print ' selected ';
                                                                                                } ?> value="VICHADA">
                                                                                    VICHADA</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="minucipios">
                                                                                <strong>Ciuidad</strong>
                                                                            </label>
                                                                            <select name="city" id="minucipios" required
                                                                                class="form-control">
                                                                                <option <?php if ($mycity == "$mycity") {
                                                                                                    print ' selected ';
                                                                                                } ?>
                                                                                    value="<?php echo "$mycity"; ?>">
                                                                                    <?php echo "$mycity"; ?>
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="kg">
                                                                                <strong>Cantidad para
                                                                                    recoger en
                                                                                    kg</strong>
                                                                            </label>
                                                                            <input class="form-control " type="text"
                                                                                id="kg"
                                                                                placeholder="Ingrese la cantidad en número"
                                                                                name="solicitudkg" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="harvest">
                                                                                <strong>Fecha de
                                                                                    recolecci&oacute;n</strong>
                                                                            </label>
                                                                            <input class="form-control" type="date"
                                                                                name="recoleccion" id="date"
                                                                                min="<?php echo date("Y-m-d", strtotime(date("Y-m-d"))); ?>"
                                                                                required>
                                                                            <input type="datetime" name="radicado"
                                                                                value="<?php echo date("Y-m-d\TH-i"); ?>"
                                                                                style="visibility:hidden">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <button type="submit"
                                                                        class="col-12 btn btn-secondary">Enviar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-md-center ">
                                                                <button class="col-12  col-md-4  btn btn-primary m-1"
                                                                    data-bs-target="#update"
                                                                    data-bs-toggle="modal">Actualizar
                                                                    Información</button>
                                                                <button class="col-12  col-md-4  btn btn-primary m-1"
                                                                    data-bs-target="#request"
                                                                    data-bs-toggle="modal">Solicitud
                                                                    sede principal</button>
                                                                <button type="button"
                                                                    class="col-12  col-md-2 m-1  btn btn-danger "
                                                                    data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Fin--Modal-Agregar-Solicitud--->


                                        <div>
                                            <table class="table_request">
                                                <thead>
                                                    <tr>
                                                        <th>Contacto</th>
                                                        <th>Número</th>
                                                        <th>Dirreci&oacute;n</th>
                                                        <th>Cantidad </th>
                                                        <th>Radicado</th>
                                                        <th>Solicitud</th>
                                                        <th>Modificar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($rowSql = $sql->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td class="table_request_text_center" data-label="Contacto">
                                                            <?php echo $rowSql['name'];?></td>
                                                        <td class="table_request_text_center" data-label="Número">
                                                            <?php echo $rowSql['phone'];?></td>
                                                        <td class="table_request_text_center" data-label="Dirección">
                                                            <?php echo $rowSql['street'];?>
                                                            <?php echo $rowSql['city'];?> -
                                                            <?php echo $rowSql['departament'];?></td>
                                                        <td class="table_request_text_center" data-label="Cantidad">
                                                            <?php echo $rowSql['solicitudkg'];?>
                                                            kg</td>
                                                        <td class="table_request_text_center"
                                                            data-label="Fecha de radicado">
                                                            <?php echo $rowSql['radicado'];?></td>
                                                        <td class="table_request_text_center"
                                                            data-label="Fecha de Solicitud">
                                                            <?php echo $rowSql['recoleccion'];?></td>

                                                        <td>
                                                            <div class="container-fluid">
                                                                <div class="row justify-content-evenly">
                                                                    <button type="button"
                                                                        class="btn btn-secondary col-5 my-4 col-md-12 my-md-1"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#edit<?php echo $rowSql['id']; ?>">
                                                                        Modificar
                                                                    </button>
                                                                    <a href="app/drop-request.php?id=<?php echo $rowSql['id']; ?>"
                                                                        onclick="return confirm('¿Está seguro de que desea eliminar su solicitud')"
                                                                        class="btn btn-danger col-5 my-4 col-md-12 my-md-1">Eliminar</a>
                                                                </div>

                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="edit<?php echo $rowSql['id']; ?>"
                                                                    aria-hidden="true"
                                                                    aria-labelledby="edit<?php echo $rowSql['id']; ?>"
                                                                    tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="edit<?php echo $rowSql['id']; ?>">
                                                                                    Modificar
                                                                                </h5>
                                                                                <button type=" button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="container-fluid">
                                                                                    <form class="was-validated" id="f3"
                                                                                        name="f3"
                                                                                        action="app/update-request.php"
                                                                                        method="POST"
                                                                                        autocomplete="off">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-12 col-md-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="company">
                                                                                                        <strong>Nombre o
                                                                                                            Razón
                                                                                                            Social
                                                                                                        </strong>
                                                                                                    </label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="text"
                                                                                                        id="company"
                                                                                                        value="<?php echo $rowSql["company"]; ?>"
                                                                                                        placeholder="<?php echo $rowSql["company"]; ?>"
                                                                                                        name="company"
                                                                                                        readonly="readonly"
                                                                                                        required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-md-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="nit">
                                                                                                        <strong>Número
                                                                                                            de
                                                                                                            identificación
                                                                                                            o NIT
                                                                                                        </strong>
                                                                                                    </label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="text"
                                                                                                        id="nit"
                                                                                                        value="<?php echo $rowSql["nit"]; ?>"
                                                                                                        placeholder="<?php echo $rowSql["nit"]; ?>"
                                                                                                        name="nit"
                                                                                                        readonly="readonly"
                                                                                                        required>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-12 col-sm-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="name"><strong>Nombre
                                                                                                            completo
                                                                                                            de persona
                                                                                                            de
                                                                                                            contacto</strong></label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="text"
                                                                                                        id="name"
                                                                                                        value="<?php echo $rowSql["name"]; ?>"
                                                                                                        placeholder="Ingrese el nombre"
                                                                                                        name="name">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-sm-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="phone"><strong>Teléfono
                                                                                                            de
                                                                                                            contacto</strong></label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="text"
                                                                                                        id="phone"
                                                                                                        value="<?php echo $rowSql["phone"]; ?>"
                                                                                                        placeholder="Ingrese el número telefónico"
                                                                                                        name="phone">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-12 col-sm-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="email">
                                                                                                        <strong>Correo
                                                                                                            electrónico</strong>
                                                                                                    </label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="email"
                                                                                                        id="email"
                                                                                                        value="<?php echo $rowSql["email"]; ?>"
                                                                                                        placeholder="<?php echo $rowSql["email"]; ?>"
                                                                                                        name="email">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-sm-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="establishment">
                                                                                                        <strong>Tipo de
                                                                                                            establecimiento
                                                                                                        </strong>
                                                                                                    </label>
                                                                                                    <select
                                                                                                        id="establishment"
                                                                                                        name="establishment"
                                                                                                        required
                                                                                                        class="form-control"
                                                                                                        data-live-search="true">
                                                                                                        <option
                                                                                                            value="0">
                                                                                                            Seleccione...
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["establishment"] == "Comedor") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="Comedor">
                                                                                                            Comedor
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["establishment"] == "Comidas Rápidas") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="Comidas Rápidas">
                                                                                                            Comidas
                                                                                                            Rápidas
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["establishment"] == "Hotel") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="Hotel">
                                                                                                            Hotel
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["establishment"] == "Restaurante") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="Restaurante">
                                                                                                            Restaurante
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["establishment"] == "Otro") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="Otro">
                                                                                                            Otro
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-12 col-sm-12">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="street">
                                                                                                        <strong>Dirección</strong>
                                                                                                    </label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="text"
                                                                                                        id="street"
                                                                                                        placeholder="Ingrese dirección del establecimiento"
                                                                                                        value="<?php echo $rowSql["street"]; ?>"
                                                                                                        name="street">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-12 col-sm-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="departaments">
                                                                                                        <strong>Departamento</strong>
                                                                                                    </label>
                                                                                                    <select
                                                                                                        name="departament"
                                                                                                        id="departamentos3"
                                                                                                        required
                                                                                                        class="selectpicker show-tick form-control"
                                                                                                        data-live-search="true"
                                                                                                        onchange="cambia_departamento3()">
                                                                                                        <option
                                                                                                            value="0">
                                                                                                            Seleccione...
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "AMAZONAS") {
                                                                                                                print 'selected ';
                                                                                                            } ?>
                                                                                                            value="AMAZONAS">
                                                                                                            AMAZONAS
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "ANTIOQUIA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="ANTIOQUIA">
                                                                                                            ANTIOQUIA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "ARAUCA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="ARAUCA">
                                                                                                            ARAUCA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "ATLÁNTICO") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="ATLÁNTICO">
                                                                                                            ATLÁNTICO
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "BOLÍVAR") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="BOLÍVAR">
                                                                                                            BOLÍVAR
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "BOYACÁ") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="BOYACÁ">
                                                                                                            BOYACÁ
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "CALDAS") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="CALDAS">
                                                                                                            CALDAS
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "CAQUETÁ") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="CAQUETÁ">
                                                                                                            CAQUETÁ
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "CASANARE") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="CASANARE">
                                                                                                            CASANARE
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "CAUCA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="CAUCA">
                                                                                                            CAUCA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "CESAR") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="CESAR">
                                                                                                            CESAR
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "CHOCÓ") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="CHOCÓ">
                                                                                                            CHOCÓ
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "CÓRDOBA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="CÓRDOBA">
                                                                                                            CÓRDOBA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "CUNDINAMARCA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="CUNDINAMARCA">
                                                                                                            CUNDINAMARCA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "DISTRITO CAPITAL") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="DISTRITO CAPITAL">
                                                                                                            DISTRITO
                                                                                                            CAPITAL
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "GUAINÍA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="GUAINÍA">
                                                                                                            GUAINÍA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "GUAVIARE") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="GUAVIARE">
                                                                                                            GUAVIARE
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "HUILA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="HUILA">
                                                                                                            HUILA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "LA GUAJIRA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="LA GUAJIRA">
                                                                                                            LA GUAJIRA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "MAGDALENA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="MAGDALENA">
                                                                                                            MAGDALENA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "META") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="META">
                                                                                                            META
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "NARIÑO") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="NARIÑO">
                                                                                                            NARIÑO
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "NORTE DE SANTANDER") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="NORTE DE SANTANDER">
                                                                                                            NORTE DE
                                                                                                            SANTANDER
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "PUTUMAYO") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="PUTUMAYO">
                                                                                                            PUTUMAYO
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "QUINDÍO") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="QUINDÍO">
                                                                                                            QUINDÍO
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "RISARALDA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="RISARALDA">
                                                                                                            RISARALDA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "SAN ANDRÉS Y PROVIDENCIA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="SAN ANDRÉS Y PROVIDENCIA">
                                                                                                            SAN ANDRÉS Y
                                                                                                            PROVIDENCIA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "SANTANDER") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="SANTANDER">
                                                                                                            SANTANDER
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "SUCRE") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="SUCRE">
                                                                                                            SUCRE
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "TOLIMA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="TOLIMA">
                                                                                                            TOLIMA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "VALLE DEL CAUCA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="VALLE DEL CAUCA">
                                                                                                            VALLE DEL
                                                                                                            CAUCA
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "VAUPÉS") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="VAUPÉS">
                                                                                                            VAUPÉS
                                                                                                        </option>
                                                                                                        <option <?php if ($rowSql["departament"] == "VICHADA") {
                                                                                                                print ' selected ';
                                                                                                            } ?>
                                                                                                            value="VICHADA">
                                                                                                            VICHADA
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-sm-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="minucipios">
                                                                                                        <strong>Ciuidad</strong>
                                                                                                    </label>
                                                                                                    <select name="city"
                                                                                                        id="minucipios"
                                                                                                        required
                                                                                                        class="form-control">
                                                                                                        <option
                                                                                                            <?php if ($rowSql["city"] == $rowSql["city"]) {
                                                                                                                print ' selected ';} ?>
                                                                                                            value="<?php echo $rowSql["city"]; ?>">
                                                                                                            <?php echo $rowSql["city"]; ?>
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-12 col-sm-6">
                                                                                                <div>
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="kg">
                                                                                                        <strong>Cantidad
                                                                                                            para
                                                                                                            recoger en
                                                                                                            kg</strong>
                                                                                                    </label>
                                                                                                    <input
                                                                                                        class="form-control "
                                                                                                        type="text"
                                                                                                        id="kg"
                                                                                                        placeholder="Ingrese la cantidad en número"
                                                                                                        value="<?php echo $rowSql["solicitudkg"]; ?>"
                                                                                                        name="solicitudkg"
                                                                                                        required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-sm-6">
                                                                                                <div>
                                                                                                    <label
                                                                                                        class="form-label"
                                                                                                        for="harvest">
                                                                                                        <strong>Fecha de
                                                                                                            recolecci&oacute;n</strong>
                                                                                                    </label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        type="date"
                                                                                                        name="recoleccion"
                                                                                                        id="date"
                                                                                                        value="<?php echo $rowSql['recoleccion']; ?>"
                                                                                                        min="<?php echo date("Y-m-d", strtotime(date("Y-m-d"))); ?>"
                                                                                                        required>
                                                                                                    <input
                                                                                                        type="datetime"
                                                                                                        name="radicado"
                                                                                                        value="<?php echo date("Y-m-d\TH-i"); ?>"
                                                                                                        style="visibility:hidden">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <input type="hidden"
                                                                                            name="recoleccionid"
                                                                                            value="<?php echo $rowSql['id']; ?>">
                                                                                        <div
                                                                                            class="row justify-content-around pb-2">
                                                                                            <button type="submit"
                                                                                                class="col-5 btn btn-secondary">Enviar</button>

                                                                                            <button type="button"
                                                                                                class="col-5 btn btn-danger "
                                                                                                data-bs-dismiss="modal">Cerrar</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Acullanos 2021</span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>



    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>