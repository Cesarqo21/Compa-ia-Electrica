
<?php
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != "tecnico"){
    header("Location: ../vistas/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Técnico</title>

<style>
body{margin:0;font-family:Segoe UI;background:#0f172a;color:white}

.sidebar{
width:200px;
height:100vh;
background:#111827;
position:fixed;
padding:20px;
}

.sidebar a{
display:block;
color:white;
padding:10px;
text-decoration:none;
cursor:pointer;
}

.main{
margin-left:220px;
padding:20px;
}

.card{
background:#1e293b;
padding:20px;
border-radius:10px;
}

table{
width:100%;
border-collapse:collapse;
}

th,td{
padding:10px;
border-bottom:1px solid #334155;
}

button{
background:#22c55e;
border:none;
padding:8px 12px;
border-radius:6px;
cursor:pointer;
}
</style>

<script>

// 🔥 LOGOUT CORRECTO
function cerrarSesion(){
    window.location="../controlador/logout.php";
}

function completar(btn){
    let fila=btn.parentNode.parentNode
    fila.cells[3].innerText="Finalizada"
}
</script>

</head>

<body>

<div class="sidebar">
<h2>Técnico</h2>

<a href="#">Mis instalaciones</a>
<a onclick="cerrarSesion()">Cerrar sesión</a>
</div>

<div class="main">

<h1>Instalaciones asignadas</h1>

<div class="card">

<table>

<tr>
<td>1</td>
<td>Juan Pérez</td>
<td>Calle 123</td>
<td>Pendiente</td>
<td><button onclick="completar(this)">Completar</button></td>
</tr>

<tr>
<td>2</td>
<td>Ana Martínez</td>
<td>Av. Reforma 456</td>
<td>En proceso</td>
<td><button onclick="completar(this)">Completar</button></td>
</tr>

</table>

</div>

</div>

</body>
</html>
```
