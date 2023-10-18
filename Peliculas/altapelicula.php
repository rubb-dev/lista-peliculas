<?php

require_once("utils.php");
require_once("maket.phtml");

session_start();
verificarInicioSesion();

headerhtml("Agragar películas");

if(isset($_POST["añadir"])){

    $nombre = $_POST["nombre"];
    $pais = $_POST["pais"];
    $año = $_POST["año"];
    $genero = $_POST["genero"];

    $link = connectdb();
    $nombre = mysqli_real_escape_string($link,$nombre);
    $pais = mysqli_real_escape_string($link,$pais);
    $año = mysqli_real_escape_string($link,$año);
    $genero = mysqli_real_escape_string($link,$genero);
    $query = "INSERT INTO peliculas (nombre,pais,año,genero) values ('$nombre','$pais','$año','$genero')";
    sendquery($link,$query);
    echo "Se ha añadido la película";
    ?>
        <META HTTP-EQUIV="refresh" Content="2">
    <?php
}
?>
<form method="POST" action="altapelicula.php">
    <div class="row gtr-uniform">
	    <div class="col-12">
    		<input type="text" name="nombre"  value="" placeholder="Nombre" />
		</div>
        <div class="col-6 col-12-xsmall">
    		<input type="text" name="pais"  value="" placeholder="Pais" />
		</div>
        <div class="col-6 col-12-xsmall">
    		<input type="text" name="año"  value="" placeholder="Año" />
		</div>
        <div class="col-12">
    		<input type="text" name="genero"  value="" placeholder="Género" />
		</div>
        <div class="col-12">
            <input type="submit" name="añadir" value="Añadir" class="primary" />
        </div>
    </div>
</form>

<ul class="actions fit">
        <li><a href="index.php" class="button">Mostrar Películas</a></li>
</ul>
<?php

footerhtml();

?>