<?php


function connectdb(){
    $link = mysqli_connect("127.0.0.1","root","","m2uf4_rubenvicente","3307");
    if(!$link)
        exit("No me he podido conectar");
    
    return $link;
}

function sendquery($link,$query){
    $result = mysqli_query($link,$query);
    if(!$result)
        exit("Error en la query ".mysqli_error($link));
    
    return $result;
}

function verificarInicioSesion() {
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
    }
}