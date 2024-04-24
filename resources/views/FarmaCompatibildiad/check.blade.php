<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4 ">
        <form action="{{ url('/check') }}" method="POST" class="bg-primary-subtle p-4 border border-primary rounded-2" style="--bs-border-opacity: .5;">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Farmaco 1</label>
              <select class="form-select" name="first_farmaco">
                @foreach ($farmacos as $farmaco)
                    <option value="{{$farmaco->id}}">{{$farmaco->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Farmaco 2</label>
                <select class="form-select" aria-label="Default select example" name="second_farmaco">
                    @foreach ($farmacos as $farmaco)
                        <option value="{{$farmaco->id}}">{{$farmaco->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ver Compatibilidad</button>
          </form>
    </div>
</body>
</html>
