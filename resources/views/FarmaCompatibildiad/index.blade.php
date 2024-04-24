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
        <form action="{{ url('/compatibilidad') }}" method="POST" class="bg-dark-subtle p-4 border border-dark rounded-2" style="--bs-border-opacity: .5;">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Farmaco 1</label>
              @if ($errors->has('first_farmaco'))
    <span class="text-danger">{{ $errors->first('first_farmaco') }}</span>
@endif
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
            <div class="mb-3">
                <label class="form-label">Compatibilidad</label>
                @foreach ($compatibilidads as $compatibilidad)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="id_compatibilidad" value="{{ $compatibilidad->id }}" id="{{ $compatibilidad->id }}">
                        <label class="form-check-label" for="compatibilidad{{ $compatibilidad->id }}">
                            <span class="badge text-bg-{{$compatibilidad->colors}}">{{$compatibilidad->name}}</span>
                        </label>
                    </div>
    @endforeach
            </div>
            <button type="submit" class="btn btn-dark">Guardar</button>
          </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.form-check-input');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    checkboxes.forEach(function(otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
