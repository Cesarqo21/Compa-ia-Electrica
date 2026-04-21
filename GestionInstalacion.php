
<?php
session_start();

if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != "almacen"){
    header("Location: ../vistas/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Instalaciones</title>

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
margin-bottom:20px;
}

input,select{
padding:8px;
margin:5px;
border:none;
border-radius:6px;
}

button{
padding:8px 12px;
border:none;
border-radius:6px;
margin:3px;
cursor:pointer;
}

.agregar{background:#3b82f6;color:white}
.editar{background:#f59e0b;color:white}
.eliminar{background:#ef4444;color:white}

table{
width:100%;
border-collapse:collapse;
}

th,td{
padding:10px;
border-bottom:1px solid #334155;
}
</style>

<script>

// 🔥 LOGOUT CORRECTO
function cerrarSesion(){
    window.location="../controlador/logout.php";
}

function agregar(){
    let tabla=document.getElementById("tabla")
    let fila=tabla.insertRow()

    fila.innerHTML=`
    <td>Nuevo</td>
    <td>${cliente.value}</td>
    <td>${tecnico.value}</td>
    <td>${estado.value}</td>
    <td>
    <button class="editar" onclick="editar(this)">Editar</button>
    <button class="eliminar" onclick="eliminar(this)">Eliminar</button>
    </td>`
}

function eliminar(btn){
    btn.parentNode.parentNode.remove()
}

function editar(btn){
    let fila=btn.parentNode.parentNode

    cliente.value=fila.cells[1].innerText
    tecnico.value=fila.cells[2].innerText
    estado.value=fila.cells[3].innerText
}

function buscar(){
    let filtro=busqueda.value.toLowerCase()
    let filas=document.querySelectorAll("#tabla tr")

    filas.forEach(f=>{
        f.style.display=f.innerText.toLowerCase().includes(filtro)?"":"none"
    })
}
</script>

</head>

<body>

<div class="sidebar">
<h2>Sistema</h2>

<a href="#">Instalaciones</a>
<a onclick="cerrarSesion()">Cerrar sesión</a>
</div>

<div class="main">

<h1>Gestión de instalaciones</h1>

<div class="card">

<input id="cliente" placeholder="Cliente">
<input id="tecnico" placeholder="Técnico">

<select id="estado">
<option>Pendiente</option>
<option>En proceso</option>
<option>Finalizada</option>
</select>

<button class="agregar" onclick="agregar()">Agregar</button>

</div>

<div class="card">

<input id="busqueda" placeholder="Buscar..." onkeyup="buscar()">

<table id="tabla">

<tr>
<th>ID</th>
<th>Cliente</th>
<th>Técnico</th>
<th>Estado</th>
<th>Acciones</th>
</tr>

<tr>
<td>1</td>
<td>Juan Pérez</td>
<td>Carlos López</td>
<td>Pendiente</td>
<td>
<button class="editar" onclick="editar(this)">Editar</button>
<button class="eliminar" onclick="eliminar(this)">Eliminar</button>
</td>
</tr>

<tr>
<td>2</td>
<td>Ana Martínez</td>
<td>Luis Torres</td>
<td>En proceso</td>
<td>
<button class="editar" onclick="editar(this)">Editar</button>
<button class="eliminar" onclick="eliminar(this)">Eliminar</button>
</td>
</tr>

</table>

</div>

</div>

</body>
</html>
```
