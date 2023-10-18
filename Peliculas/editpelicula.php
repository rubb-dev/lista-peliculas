<?php
require_once("utils.php");
require_once("maket.phtml");

session_start();
verificarInicioSesion();

headerhtml("Editar película");
$row["nombre"] ="";
$row["pais"] ="";
$row["año"] ="";
$row["genero"] ="";
if(isset($_GET["id"]) && filter_var($_GET["id"],FILTER_VALIDATE_INT)){

    $id = $_GET["id"];

    $link = connectdb();
    $id = mysqli_real_escape_string($link,$id);
    $query = "SELECT * from peliculas where id='$id'";
    $result = sendquery($link,$query);

    $row = mysqli_fetch_assoc($result);
}
if(isset($_POST["editar"])){
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $pais = $_POST["pais"];
    $año = $_POST["año"];
    $genero = $_POST["genero"];

    $link = connectdb();
    $id = mysqli_real_escape_string($link,$id);
    $nombre = mysqli_real_escape_string($link,$nombre);
    $pais = mysqli_real_escape_string($link,$pais);
    $año = mysqli_real_escape_string($link,$año);
    $genero = mysqli_real_escape_string($link,$genero);
    $query = "UPDATE peliculas SET nombre='$nombre',pais='$pais',año='$año',genero='$genero' where id='$id'";
    sendquery($link,$query);

    header("Location:index.php");



}
if(isset($_POST["eliminar"])){
    
    $id = $_POST["id"];

    $link = connectdb();
    $id = mysqli_real_escape_string($link,$id);
    $query = "DELETE from peliculas where id='$id'";
    sendquery($link,$query);
    header("Location:index.php");

}

?>
<form method="POST" action="editpelicula.php">
    <input type="hidden" name="id" value="<?php echo $row["id"];?>" />
    <div class="row gtr-uniform">
	    <div class="col-12">
    		<input type="text" name="nombre"  value="<?php echo $row["nombre"]?>" placeholder="Nombre" />
		</div>
        <div class="col-6 col-12-xsmall">
    		<input type="text" name="pais"  value="<?php echo $row["pais"]?>" placeholder="Pais" />
		</div>
        <div class="col-6 col-12-xsmall">
    		<input type="text" name="año"  value="<?php echo $row["año"]?>" placeholder="Año" />
		</div>
        <div class="col-12">
    		<input type="text" name="genero"  value="<?php echo $row["genero"]?>" placeholder="Género" />
		</div>
        <div class="col-12">
            <input type="submit" name="editar" value="Editar" class="primary" />
            <input type="submit" name="eliminar" value="Eliminar pelicula" class="primary" />
        </div>
    </div>
</form>

<ul class="actions fit">
        <li><a href="index.php" class="button">Mostrar Películas</a></li>
</ul>
<?php

footerhtml();