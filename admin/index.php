<?php
require '../constants/db_config.php';
require '../constants/settings.php';
require 'constants/check-login.php';

if ($user_online == "true") {
    if ($myrole == "admin") {
    } else {
        header("location:../");
    }
} else {
    header("location:../");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Datos de la empresa</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">

    <script src="../assets/js/jquery-3.4.1.js"></script>
    <script src="../assets/js/cargarmunicipios.js"></script>

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
                        <a class="nav-link active" href="index.php"><i class="fas fa-user"></i><span>Detalles de la
                                Empresa</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="request.php"><i class="fas fa-table"></i><span>Solicitud de
                                Recolecci&oacute;n</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="harvest.php"><i class="fas fa-table"></i><span>Detalles de
                                recoleeci&oacute;n</span></a>
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
                            <div class="d-none d-sm-block topbar-divider"></div>
                        </ul>
                    </div>
                </nav>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Datos de la empresa</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <?php if ($myavatar == null) {
                                        print '<center><img class="rounded-circle mb-3 mt-4" src="../images/default.jpg" title="' . $myname . '" alt="image" width="160px" height="160px"></center>';
                                    } else {
                                        echo '<center><img class="rounded-circle mb-3 mt-4" alt="image" title="' . $myname . '"  src="data:image/jpeg;base64,' . base64_encode($myavatar) . '"width="160" height="160" ></center>';
                                    } ?>
                                    <form action="app/new-dp.php" method="POST" enctype="multipart/form-data">
                                        <div class="row gap-20">
                                            <div class="col-12">

                                                <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                    <label>Foto de perfil</label>
                                                    <input accept="image/*" type="file" name="image" style="width:100%"
                                                        required>
                                                </div>

                                            </div>



                                            <div class="col-12 mt-10">
                                                <button type="submit" class="btn btn-secondary">Actualizar</button>
                                                <?php if ($myavatar == null) {} else { ?><a
                                                    onclick="return confirm('??Est??s seguro de que quieres eliminar su foto de perfil?')"
                                                    class="btn btn-primary btn-inverse"
                                                    href="app/drop-dp.php">Eliminar</a> <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Cambiar contrase??a</h6>
                                </div>

                                <div class="card-body">
                                    <form name="frm" class="post-form-wrapper" action="app/new-pass.php" method="POST">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="passwprd">
                                                        <strong>Contrase??a nueva</strong>
                                                    </label>
                                                    <input class="form-control" type="password" id="password"
                                                        placeholder="Ingrese contrase??a" name="password" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="confirmpassword">
                                                        <strong>Confirmar contrase??a</strong>
                                                    </label>
                                                    <input class="form-control" type="password" id="confirmpassword"
                                                        placeholder="Confirmar contrase??a" name="confirmpassword"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" onclick="return check_passwords();"
                                                class="btn btn-secondary">Actualizar</button>
                                            <button type="reset" class="btn btn-primary btn-inverse">Cancelar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Informaci&oacute;n del administrador</p>
                                        </div>
                                        <?php require 'constants/check_reply.php'; ?>
                                        <div class="card-body">
                                            <form  action="app/add-profile.php" method="POST"
                                                autocomplete="off">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="name"><strong>Nombre del
                                                                    administrador</strong></label>
                                                            <input class="form-control" type="text" id="name"
                                                                value="<?php echo "$myname"; ?>"
                                                                placeholder="Ingrese el nombre" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="phone"><strong>Tel??fono del
                                                                    adminstrador</strong></label>
                                                            <input class="form-control" type="text" id="phone"
                                                                value="<?php echo "$myphone"; ?>"
                                                                placeholder="Ingrese el n??mero telef??nico" name="phone">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="email">
                                                                <strong>Correo electr??nico</strong>
                                                            </label>
                                                            <input class="form-control" type="email" id="email"
                                                                value="<?php echo "$myemail"; ?>"
                                                                placeholder="<?php echo "$myemail"; ?>" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit"
                                                        class="col-12 btn btn-secondary">Actualizar</button>
                                                </div>
                                            </form>
                                        </div>
                                        </dsiv>
                                    </div>
                                </div>
                            </div>

                            <!------tbl_company----------->
                            <?php
                            
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                                
                            $stmt = $conn->prepare("SELECT * FROM tbl_company");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            
                            
                                foreach($result as $row)
                                {
                                $compname = $row['company'];
                                $compnit = $row['nit'];
                                $compphone = $row['phone'];
                                $compemail = $row['email'];
                                $compstreet= $row['street'];
                                $compdepartament = $row['departament'];
                                $compcity = $row['city'];
                            }
                            
                            ?>
                            <!------tbl_company----------->

                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Informaci&oacute;n de la empresa</p>
                                        </div>
                                        <?php require 'constants/check_reply.php'; ?>
                                        <div class="card-body">
                                            <form id="f1" name="f1" action="app/update-company.php" method="POST"
                                                autocomplete="off">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="company">
                                                                <strong>Nombre o Raz??n Social </strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="company"
                                                                value="<?php echo "$compname";?>"
                                                                placeholder="<?php echo "$compname";?>" name="company">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nit">
                                                                <strong>N??mero de identificaci??n o NIT </strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="nit"
                                                                value="<?php echo "$compnit"; ?>"
                                                                placeholder="<?php echo "$compnit"; ?>" name="nit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="name"><strong>Nombre completo
                                                                    del adminstrador actual</strong></label>
                                                            <input class="form-control" type="text" id="name"
                                                                value="<?php echo "$myname"; ?>"
                                                                placeholder="Ingrese el nombre" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="phone">
                                                                <strong>
                                                                    Tel??fono de la empresa
                                                                </strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="phone"
                                                                value="<?php echo "$compphone"; ?>"
                                                                placeholder="Ingrese el n??mero telef??nico" name="phone">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="email">
                                                                <strong>Correo electr??nico</strong>
                                                            </label>
                                                            <input class="form-control" type="email" id="email"
                                                                value="<?php echo "$compemail"; ?>"
                                                                placeholder="<?php echo "$compemail"; ?>" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="street">
                                                                <strong>Direcci??n</strong>
                                                            </label>
                                                            <input class="form-control" type="text" id="street"
                                                                value="<?php echo "$compstreet"; ?>"
                                                                placeholder="Ingrese direcci??n del establecimiento"
                                                                name="street">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="departaments">
                                                                <strong>Departamento</strong>
                                                            </label>
                                                            <select name="departament" id="departamentos" required
                                                                class="selectpicker show-tick form-control"
                                                                data-live-search="true"
                                                                onchange="cambia_departamento()">
                                                                <option value="0">Seleccione...</option>
                                                                <option <?php if ($compdepartament == "AMAZONAS") {
                                                                        print 'selected ';
                                                                    } ?> value="AMAZONAS">AMAZONAS</option>
                                                                <option <?php if ($compdepartament == "ANTIOQUIA") {
                                                                        print ' selected ';
                                                                    } ?> value="ANTIOQUIA">ANTIOQUIA</option>
                                                                <option <?php if ($compdepartament == "ARAUCA") {
                                                                        print ' selected ';
                                                                    } ?> value="ARAUCA">ARAUCA</option>
                                                                <option <?php if ($compdepartament == "ATL??NTICO") {
                                                                        print ' selected ';
                                                                    } ?> value="ATL??NTICO">ATL??NTICO</option>
                                                                <option <?php if ($compdepartament == "BOL??VAR") {
                                                                        print ' selected ';
                                                                    } ?> value="BOL??VAR">BOL??VAR</option>
                                                                <option <?php if ($compdepartament == "BOYAC??") {
                                                                        print ' selected ';
                                                                    } ?> value="BOYAC??">BOYAC??</option>
                                                                <option <?php if ($compdepartament == "CALDAS") {
                                                                        print ' selected ';
                                                                    } ?> value="CALDAS">CALDAS</option>
                                                                <option <?php if ($compdepartament == "CAQUET??") {
                                                                        print ' selected ';
                                                                    } ?> value="CAQUET??">CAQUET??</option>
                                                                <option <?php if ($compdepartament == "CASANARE") {
                                                                        print ' selected ';
                                                                    } ?> value="CASANARE">CASANARE</option>
                                                                <option <?php if ($compdepartament == "CAUCA") {
                                                                        print ' selected ';
                                                                    } ?> value="CAUCA">CAUCA</option>
                                                                <option <?php if ($compdepartament == "CESAR") {
                                                                        print ' selected ';
                                                                    } ?> value="CESAR">CESAR</option>
                                                                <option <?php if ($compdepartament == "CHOC??") {
                                                                        print ' selected ';
                                                                    } ?> value="CHOC??">CHOC??</option>
                                                                <option <?php if ($compdepartament == "C??RDOBA") {
                                                                        print ' selected ';
                                                                    } ?> value="C??RDOBA">C??RDOBA</option>
                                                                <option <?php if ($compdepartament == "CUNDINAMARCA") {
                                                                        print ' selected ';
                                                                    } ?> value="CUNDINAMARCA">CUNDINAMARCA</option>
                                                                <option <?php if ($compdepartament == "DISTRITO CAPITAL") {
                                                                        print ' selected ';
                                                                    } ?> value="DISTRITO CAPITAL">DISTRITO CAPITAL
                                                                </option>
                                                                <option <?php if ($compdepartament == "GUAIN??A") {
                                                                        print ' selected ';
                                                                    } ?> value="GUAIN??A">GUAIN??A</option>
                                                                <option <?php if ($compdepartament == "GUAVIARE") {
                                                                        print ' selected ';
                                                                    } ?> value="GUAVIARE">GUAVIARE</option>
                                                                <option <?php if ($compdepartament == "HUILA") {
                                                                        print ' selected ';
                                                                    } ?> value="HUILA">HUILA</option>
                                                                <option <?php if ($compdepartament == "LA GUAJIRA") {
                                                                        print ' selected ';
                                                                    } ?> value="LA GUAJIRA">LA GUAJIRA</option>
                                                                <option <?php if ($compdepartament == "MAGDALENA") {
                                                                        print ' selected ';
                                                                    } ?> value="MAGDALENA">MAGDALENA</option>
                                                                <option <?php if ($compdepartament == "META") {
                                                                        print ' selected ';
                                                                    } ?> value="META">META</option>
                                                                <option <?php if ($compdepartament == "NARI??O") {
                                                                        print ' selected ';
                                                                    } ?> value="NARI??O">NARI??O</option>
                                                                <option <?php if ($compdepartament == "NORTE DE SANTANDER") {
                                                                        print ' selected ';
                                                                    } ?> value="NORTE DE SANTANDER">NORTE DE SANTANDER
                                                                </option>
                                                                <option <?php if ($compdepartament == "PUTUMAYO") {
                                                                        print ' selected ';
                                                                    } ?> value="PUTUMAYO">PUTUMAYO</option>
                                                                <option <?php if ($compdepartament == "QUIND??O") {
                                                                        print ' selected ';
                                                                    } ?> value="QUIND??O">QUIND??O</option>
                                                                <option <?php if ($compdepartament == "RISARALDA") {
                                                                        print ' selected ';
                                                                    } ?> value="RISARALDA">RISARALDA</option>
                                                                <option <?php if ($compdepartament == "SAN ANDR??S Y PROVIDENCIA") {
                                                                        print ' selected ';
                                                                    } ?> value="SAN ANDR??S Y PROVIDENCIA">SAN ANDR??S Y
                                                                    PROVIDENCIA</option>
                                                                <option <?php if ($compdepartament == "SANTANDER") {
                                                                        print ' selected ';
                                                                    } ?> value="SANTANDER">SANTANDER</option>
                                                                <option <?php if ($compdepartament == "SUCRE") {
                                                                        print ' selected ';
                                                                    } ?> value="SUCRE">SUCRE</option>
                                                                <option <?php if ($compdepartament == "TOLIMA") {
                                                                        print ' selected ';
                                                                    } ?> value="TOLIMA">TOLIMA</option>
                                                                <option <?php if ($compdepartament == "VALLE DEL CAUCA") {
                                                                        print ' selected ';
                                                                    } ?> value="VALLE DEL CAUCA">VALLE DEL CAUCA
                                                                </option>
                                                                <option <?php if ($compdepartament == "VAUP??S") {
                                                                        print ' selected ';
                                                                    } ?> value="VAUP??S">VAUP??S</option>
                                                                <option <?php if ($compdepartament == "VICHADA") {
                                                                        print ' selected ';
                                                                    } ?> value="VICHADA">VICHADA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="minucipios">
                                                                <strong>Ciuidad</strong>
                                                            </label>
                                                            <select name="city" id="minucipios" required
                                                                class="form-control">
                                                                <option
                                                                    <?php if ($compcity == "$compcity") {  print ' selected ';} ?>
                                                                    value="<?php echo "$compcity"; ?>">
                                                                    <?php echo "$compcity"; ?></option>
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
                                        </dsiv>
                                    </div>
                                </div>
                            </div>

                            <!-----fin-tbl_company----------->
                            <?php
                                }catch(PDOException $e)
                                {
                                
                                }

                            ?>
                            <!-----fin-tbl_company----------->
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright ?? Acullanos 2021</span></div>
                    </div>
                </footer>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>

        <script type="text/javascript">
        function check_passwords() {
            if (frm.password.value == "") {
                alert("Ingrese su Contrase??a.");
                frm.password.focus();
                return false;
            }
            if ((frm.password.value).length < 8) {
                alert("La contrase??a debe tener como minimo 08 caracteres");
                frm.password.focus();
                return false;
            }

            if (frm.confirmpassword.value == "") {
                alert("Ingrese otra vez su contrase??a");
                return false;
            }
            if (frm.confirmpassword.value != frm.password.value) {
                alert("Las contrase??as no son iguales");
                return false;
            }

            return true;
        }
        </script>

        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bs-init.js"></script>
        <script src="../assets/js/theme.js"></script>
</body>

</html>