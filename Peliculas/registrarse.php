<?php

require_once("utils.php");
require_once("maket.phtml");

headerhtml("Registrarse");

if(isset($_POST["registrar"])){

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    $link = connectdb();
    $nombre = mysqli_real_escape_string($link,$nombre);
    $apellido = mysqli_real_escape_string($link,$apellido);
    $usuario = mysqli_real_escape_string($link,$usuario);
    $contraseña = mysqli_real_escape_string($link,$contraseña);
    $query = "INSERT INTO usuarios (nombre,apellido,usuario,contraseña) values ('$nombre','$apellido','$usuario','$contraseña')";
    sendquery($link,$query);
    echo "Te has registrado correctamente";
    ?>
        <META HTTP-EQUIV="refresh" Content="2">
    <?php
}
?>
<form method="POST" action="registrarse.php">
    <div class="row gtr-uniform">
	    <div class="col-12">
    		<input type="text" name="nombre"  value="" placeholder="Nombre" />
		</div>
        <div class="col-12">
    		<input type="text" name="apellido"  value="" placeholder="Apellido" />
		</div>
        <div class="col-6 col-12-xsmall">
    		<input type="text" name="usuario"  value="" placeholder="Usuario" />
		</div>
        <div class="col-6 col-12-xsmall">
    		<input type="text" name="contraseña"  value="" placeholder="Contraseña" />
		</div>
        <div class="col-12">
            <input type="submit" name="registrar" value="Registrar" class="primary" />
        </div>
    </div>
</form>

<ul class="actions fit">
        <li><a href="login.php" class="button primary">Log In</a></li>
</ul>

<?php

footerhtml();

?>