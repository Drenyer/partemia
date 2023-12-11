<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Foro de Opinión</title>
    <style>
        body {
            text-align: center;
            border: solid 5px black;
            background-color: bisque;
        }

        textarea {
            width: 450px;
            height: 130px;
            border: solid 2px burlywood;
        }

        button {
            border: 2px solid royalblue;
            height: auto;
            width: auto;

        }

        .valor {
            display: inline-flex;
            flex-direction: row-reverse;
            align-items: center;
            margin: 0 auto;
        }

        .valor input {
            display: none;
        }

        .valor label {
            font-size: 40px;
            color: #ccc;
            cursor: pointer;
            text-align: center;
          
        }

        .valor label:hover,
        .valor input:checked~label,
        .valor label:hover+label {
            color: orange;
        }
    </style>
</head>

<body>

    <header>
        <h1>Foro de Comentarios</h1>
    </header>


    <section id="formulario">

        <h2>Agregar comentario</h2>

        <form method="POST" action="{{ route('opiniones.almacenar') }}">
            @csrf

            <input type="text" name="nombre" placeholder="Tu nombre">
            <h3>Puntaje de Satisfacción</h3>
            <div class="valor">
            <input type="radio" name="valor" id="str5" value="5" method="POST" action="{{ route('opiniones.almacenar') }}"><label for="str5">☆</label>
            <input type="radio" name="valor" id="str4" value="4" method="POST" action="{{ route('opiniones.almacenar') }}"><label for="str4">☆</label>
            <input type="radio" name="valor" id="str3" value="3" method="POST" action="{{ route('opiniones.almacenar') }}"><label for="str3">☆</label>
            <input type="radio" name="valor" id="str2" value="2" method="POST" action="{{ route('opiniones.almacenar') }}"><label for="str2">☆</label>
            <input type="radio" name="valor" id="str1" value="1" method="POST" action="{{ route('opiniones.almacenar') }}"><label for="str1">☆</label>
            </div>
            <input type="email" name="correo" placeholder="Tu email">
            <p></p>
            <br>
            <textarea name="opinion" placeholder="Escribe tu opinión"></textarea>
            <p></p>
            <br>
            <button type="submit">Enviar opinión</button>
            @if (isset($mensaje))
            <p>{{ $mensaje }}</p>
            @endif

        </form>
        <button type="submit">Ver opiniones</button>

    </section>

</body>

</html>