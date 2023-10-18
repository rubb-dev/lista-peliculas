<?php

require_once("utils.php");
require_once("maket.phtml");

headerhtml("Log-in");


if(isset($_POST["login"])){
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $link = connectdb();
    $usuario = mysqli_real_escape_string($link,$usuario);
    $contraseña = mysqli_real_escape_string($link,$contraseña);
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $result = sendquery($link,$query);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

?>
<form method="POST" action="login.php">
    <div class="row gtr-uniform">
	    <div class="col-12">
    		<input type="text" name="usuario"  value="" placeholder="Usuario" />
		</div>
        <div class="col-12">
    		<input type="password" name="contraseña"  value="" placeholder="Contraseña" />
		</div>
        <div class="col-12">
            <input type="submit" name="login" value="Iniciar sesión" class="primary" />
        </div>
    </div>
</form>

<ul class="actions">
        <li><a href="registrarse.php" class="button">Registrarse</a></li>
</ul>

<?php

footerhtml();