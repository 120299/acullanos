<div class="containerr">
    <div class="forms-container">
        <div class="signin-signup">
            <form name="frm" action="app/auth.php" method="POST" autocomplete="off" class="sign-in-form">
            <?php require 'constants/check_reply.php'; ?>
                <h2 class="title">Iniciar sesión</h2>
                <div class="input-field">
                    <i class="icon-user-following menu-ico"></i>
                    <input type="text" placeholder="Ingrese su correo" name="email" required id="Usuario" >
                </div>
                <div class="input-field">
                    <i class="icon-lock menu-ico"></i>
                    <input type="password" placeholder="Ingrese su contraseña" name="password" required type="password">
                </div>
                <button type="submit" class="btn2 solid">Iniciar Sesión</button>
            </form>
            
            <form class="sign-up-form" name="frm" action="app/create-account.php" method="POST" autocomplete="off">
                <h2 class="title">Regístrate</h2>

                <div class="input-field">
                    <i class="icon-user-following menu-ico"></i>
                    <input type="text" placeholder="Nombre del administrador" name="name" required>
                </div>
                <div class="input-field">
                    <i class="icon-envelope menu-icoe"></i>
                    <input type="email" placeholder="Correo electrónico" name="email" required >
                </div>
                <div class="input-field">
                    <i class="icon-lock menu-ico"></i>
                    <input type="password" placeholder="Contraseña" name="password" required>
                </div>
                <div class="input-field">
                    <i class="icon-lock menu-ico"></i>
                    <input type="password" placeholder="Confirmar contraseña" name="confirmpassword" required>
                </div>
                <input type="hidden" name="acctype" value="102">
                <button onclick="return val();" type="submit" name="reg_mode" class="btn2">Registrar</button>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>¿Eres Nuevo?</h3>
                <p>
                    Has clik al siguiente botón para crear tu cuenta !
                </p>
                <button class="btn2 transparent" id="sign-up-btn">
                    Regístrate
                </button>
            </div>
            <img src="https://i.pinimg.com/originals/72/82/fe/7282fee6a0641482ab4391b9638ee46c.png" class="image" alt="" >
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>¿Ya tienes una Cuenta?</h3>
                <p>
                    Inicie sesión
                </p>
                <button class="btn2 transparent" id="sign-in-btn">
                    Iniciar Sesión
                </button>
            </div>
            <img src="https://i.pinimg.com/originals/77/29/f4/7729f497f9d0188fa35d41db45232cca.png" class="image" alt="" >
        </div>
    </div>
</div>
