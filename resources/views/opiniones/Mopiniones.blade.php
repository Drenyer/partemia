<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Opiniones</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <script src="funciones.js"></script>
  

  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .opiniones {
      margin: 20px;
    }

    .opiniones h2 {
      color: #333;
    }

    .opiniones-list {
      list-style: none;
      padding: 0;
    }

    .opinion-item {
      border: 1px solid #ccc;
      margin: 10px 0;
      padding: 10px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .opinion-header {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .nombre {
      color: blue;
    }

    .valor {
      color: red;
      font-size: 12px;
    }

    .correo {
      color: red;
      font-size: 12px;
    }

    .stars i {
      font-size: 18px;
      color: red; /* Cambié el color a rojo */
    }

    .opinion-content {
      margin-top: 10px;
    }

    .opinion {
      color: black;
      font-size: 14px;
    }

    .opiniones-calificacion {
      display: flex;
      align-items: center;
      margin-top: 10px;
    }

    .estrellas {
      margin-right: 5px;
    }

    .calificacion {
      font-weight: bold;
    }

    .fecha-creacion {
      color: gray;
      font-size: 12px;
    }
  </style>
  
</head>
<body>

<div class="opiniones">

  <h2>Opiniones</h2>

  <ul class="opiniones-list">
    @php
      use Carbon\Carbon;
    @endphp

    @foreach ($data['opiniones'] as $opinion)
    <pre>
        {{ print_r($opinion) }}
    </pre>
    <hr>

      <li class="opinion-item" data-timestamp="{{ $opinion['_id'] }}">

        <div class="opinion-header">

          <span class="nombre">{{ $opinion['nombre'] }}</span>
          <span class="correo">{{ $opinion['correo'] }}</span>
          <p class="hora">Hora: {{ $opinion['hora']->toDateTime()->format('Y-m-d H:i:s') }}</p>

          <br>


          <div class="stars">
            @for ($i = 1; $i <= 5; $i++)
              @if ($i <= $opinion['valor'])
                <i class="fas fa-star"></i>
              @else
                <i class="far fa-star"></i>
              @endif
            @endfor
            <span class="valor">{{ $opinion['valor'] }}</span>
          </div>
        </div>

        <div class="opinion-content">
          <p class="opinion">{{ $opinion['opinion'] }}</p>
        </div>

      </li>

    @endforeach

  </ul>

</div>

</body>
</html>


