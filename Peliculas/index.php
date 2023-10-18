<?php
require_once("utils.php");
require_once("maket.phtml");

session_start();
verificarInicioSesion();

$link = connectdb();

$query = "SELECT * from peliculas order by id DESC";
$result = sendquery($link,$query);


while($row = mysqli_fetch_assoc($result))
    $arr_peliculas[]=$row;


headerhtml("Listado de películas");

?>
<!-- Table -->
	<h2>Películas</h2>
	<div class="table-wrapper">
		<table>
			<thead>
			<tr>
					<th>Nombre</th>
                    <th>Pais</th>
                    <th>Año</th>
                    <th>Género</th>
				</tr>
			</thead>
            <tbody>
			<?php
            foreach($arr_peliculas as $pelicula)
                echo "<tr><td><a href='editpelicula.php?id=".$pelicula['id']."'>".$pelicula['nombre'].
                "</a></td><td>".$pelicula['pais'].
                "</td><td>".$pelicula['año'].
                "</td><td>".$pelicula['genero'].
                "</td></tr>";
            ?>	
			</tbody>
		</table>
	</div>

<ul class="actions">
    <li><a href="altapelicula.php" class="button primary">Agregar Película</a></li>
</ul>

<?php


footerhtml();

