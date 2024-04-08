<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <h1 class="m-1">Alta de Farmaco</h1>
    
    <div class="container">
     <form method="POST">
        @csrf
        <label for="farmaco" class="form-label">Farmaco</label>
        <input type="text" class="form-control my-2" name="name" id="farmaco" placeholder="Ingrese nombre de Farmaco">
        <input type="submit" value="Cargar" class="btn btn-primary">
        </form>

    </div>
</body>
</html>