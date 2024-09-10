<?php 
//funcion para validar los datos y agregarlos a la tabla
$lista_tareas = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$titulo = htmlspecialchars($_POST['titulo']);
	$fecha = htmlspecialchars($_POST['fecha']);
	$categoria = htmlspecialchars($_POST['categoria']);
    $nota = htmlspecialchars($_POST['nota']);

	
	$fila = "
	<tr>
		<td>$titulo</td>
		<td>$nota</td>
        <td>$categoria</td>
		<td>$fecha</td>
		<td>
			<label for='checked'>
			Estado
			<input type='checkbox' class='form-check-input' value='tareaCheck' name='check' id='checked'/>
			</label>
		</td>
        <td>
            <button type='button' class='btn btn-primary' id='eliminar'>
                <span class='glyphicon glyphicon-remove-sign'></span
            </button>
        </td>
	</tr>
	";

	echo $fila;
    exit;
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Lista de Tareas</title>
</head>
<body>
        <nav class="navbar nabvar-expand-lg navabr-dark bg-primary">
            <ul class="navbar-nav">
                <li class="nav-item" style="margin-left: 1rem">
                    <a class="nav-link" id="inicio">Inicio</a>
                </li>
            </ul>
        </nav>
    <div class="container">
        <div class="row">
            <h1 style="text-align: center; margin-top: 2rem">TUS NOTAS</h1>
            <div class="col" style="margin-top: 3rem;">
                <div class="input-group"> 
                    <input id="entradafilter" type="text" class="form-control" placeholder="FILTRAR" data-bs-toggle="mensaje" title="aca podras filtrar tus notas ya sea con el titulo o con la fecha">
                </div>
                <table class="table table-dark table-striped" style="margin-bottom: 1rem; margin-top: 1rem">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Nota</th>
                            <th>Categoria</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="contenidobusqueda">
						<tr>
							<td>Título 1</td>
							<td>Nota 1</td>
                            <td>Categoria 1</td>
							<td>Fecha 1</td>
							<td>Estado 1</td>
                            <td>
                                <button type="button" class="btn btn-close" id="eliminar">
                                    <span class="glyphicon glyphicon-remove-sign"></span>
                                </button>
                            </td>
						</tr>
                    </tbody>
                </table>
                <a href="#agregar" data-bs-toggle="collapse" class="btn btn-outline-primary" data-bs-toggle="mensaje" title="se desplegara un formulario para agregar tu nota">Agregar</a>
                <div id="agregar" class="collapse">
                    <form action="index.php" class="form" id="formulario" method="POST" target="_self" autocomplete="on">
                        <div class="row">
                            <div class="col-6">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" required data-bs-toggle="mensaje" title="coloca un titulo corto con eso te sera mas facil buscar la nota despues">
                            </div>
                            <div class="col-3">
                                <label for="categoria" class="form-label">categoria</label>
                                <input type="text" class="form-control" name="categoria" id="categoria" required data-bs-toggle="mensaje" title="aca escribe una categoria como trabajo o estudio">
                            </div>
                            <div class="col-3">
                                <label for="date" class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" required>
                            </div>
                        </div>

                        <label for="Nota" class="form-label">Nota</label>
                        <textarea name="nota" class="form-control" id="nota" rows="5" required></textarea>
                        
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script>
        //funcion tooltip para mostrar el mensaje con el cursor
        //var = tooltiipTrigerList =[].slice.call(document.queryselector('[data-bs-toggle="mensaje"]'));
        //var = tooltiplist = tooltiipTrigerList.map (function(tooltiipTrigerEl){
          //  return new bootstrap.Tooltip(tooltiipTrigerEl)
        //});

		$(document).ready(() => {
			console.log('Se cargo el archivo');
			$("#formulario").on("submit", function(event) {
				// Evita que la pagina se recargue automáticamente
				event.preventDefault();
				
				console.log('entro en submit');
				
				$.ajax({
					url: 'index.php',
					type: 'POST',
					data: $(this).serialize(),
					success: function(response) {
						// Agrega la nieva fila a la tabla
						$("table tbody").append(response);
						
						// Limpia el formulario
						$("#formulario")[0].reset();
					},
					error: function(xhr, status, error) {
						console.log("Ocurrio un error => " + error);
					}
				});
			});
		});

        const ini = document.getElementById("inicio");
        ini.addEventListener('click', () =>{
            window.location.href = "inicio.php"
        })

        //funcion para filtrar datos 
        $(document).ready(function () {
        $('#entradafilter').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

        });

        //funcion eliminar fila o tarea
        let boteliminar = document.getElementById("eliminar");

        boteliminar.addEventListener("click", () =>{
            alert("se elimino la tarea")
            event.target.parentNode.parentNode.remove()
        });


    </script>
</body>
</html>
