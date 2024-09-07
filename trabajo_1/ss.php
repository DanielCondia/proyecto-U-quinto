<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


</head>
<body>

    <div class="container">
    <div class="input-group"> <span class="input-group-addon">Filtrado</span>
    <input id="entradafilter" type="text" class="form-control">
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>CODIGO</th>
            <th>NOMBRE</th>
        </tr>
    </thead>
    <tbody class="contenidobusqueda">
        <tr>
            <td>123456</td>
            <td>Felipe</td>
        </tr>
        <tr>
            <td>987654</td>
            <td>María</td>
        </tr>
        <tr>
            <td>565424</td>
            <td>Pedro</td>
        </tr>
        <tr>
            <td>112322</td>
            <td>Milagros</td>
        </tr>
    </tbody>
</table>
    </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
   <script>
    $(document).ready(function () {
   $('#entradafilter').keyup(function () {
      var rex = new RegExp($(this).val(), 'i');
        $('.contenidobusqueda tr').hide();
        $('.contenidobusqueda tr').filter(function () {
            return rex.test($(this).text());
        }).show();

        })

});
   </script>
</body>
</html>