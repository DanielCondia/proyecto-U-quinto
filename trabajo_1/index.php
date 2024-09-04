<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$titulo = $_POST['titulo'];
	$fecha = $_POST['fecha'];
	$nota = $_POST['nota'];
	
	echo "Título: " . htmlspecialchars($titulo) . "<br>";
    echo "Fecha: " . htmlspecialchars($fecha) . "<br>";
    echo "Nota: " . nl2br(htmlspecialchars($nota));
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Tareas</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-outline-primary" id="filtrar" name="filtrar" style="margin-bottom: 1rem;">Filtrar</button>
                <table class="table table-dark table-striped" style="margin-bottom: 1rem;">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Nota</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
						<tr>
							<td>Título 1</td>
							<td>Nota 1</td>
							<td>Fecha 1</td>
							<td>Estado 1</td>
						</tr>
                    </tbody>
                </table>
                <a href="#agregar" data-bs-toggle="collapse" class="btn btn-outline-primary">Agregar</a>
                <div id="agregar" class="collapse">
                    <form action="index.php" class="form" id="formulario" method="POST" target="_self" autocomplete="on">
                        <div class="row">
                            <div class="col">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" name="titulo" id="titulo">
                            </div>
                            <div class="col">
                                <label for="date" class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="fecha" id="fecha">
                            </div>
                        </div>

                        <label for="Nota" class="form-label">Nota</label>
                        <textarea name="nota" class="form-control" id="nota" rows="5"></textarea>
                        
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="resultado"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
						$("#resultado").html(response);
					},
					error: function(xhr, status, error) {
						console.log("Ocurrio un error => " + error);
					}
				});
			});
		});
    </script>
</body>
</html>
