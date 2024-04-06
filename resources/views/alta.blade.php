<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class=" btn btn-primary">boton</div>
    <h1>sss</h1>
    <form method="POST" action="/altaFarm">
    @csrf
    @method('POST')
    
    <label for="farmaco" class="form-label">Farmaco</label><input type="text" name="" id="farmaco" placeholder="Ingrese nombre de Farmaco">
</form>
</body>
</html>