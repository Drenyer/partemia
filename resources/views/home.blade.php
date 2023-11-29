@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-3">
        @foreach($fotos as $foto)
        <div class="col">
            <div class="card">
                <img height="300" src="/foto/{{$foto->ruta}}" alt="Imagen">
                <div class="card-body">
                    <p class="card-text">{{$foto->descripcion}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$foto->id}}" aria-expanded="false" aria-controls="collapse{{$foto->id}}">
                            <i class="bi bi-chat text-primary"></i>
                            {{count($foto->comentario)}}
                        </button>
                        <small class="text-muted">{{$foto->User->name}}</small>
                    </div>
                    <div class="collapse" id="collapse{{$foto->id}}">
                        @foreach($foto->comentario as $comentario)
                        <div class="card card-body">
                            {{ $comentario->comentario }}
                            <small class="text-muted">{{ $comentario->User->name }}</small>
                            <form action="{{ route('comentario.like', ['id' => $comentario->id]) }}" method="POST">
                            @csrf
                                <button type="submit">
                                <i class="bi bi-heart"></i>
                            {{ $comentario->likes }} 
                                </button>
                            </form>

                            <form method="POST" action="{{ route('eliminarComentario') }}">
                                @csrf
                                <input type="hidden" name="id_comentario" value="{{ $comentario->id }}">
                                <button type="submit" class="btn btn-danger">Eliminar Comentario</button>
                            </form>
                           
                        </div>
                        @endforeach
                        <form method="POST" action="{{ route('subirComentario') }}">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-9">
                                        <input type="hidden" name="id_foto" value="{{$foto->id}}">
                                        <input type="text" class="form-control" name="comentario" placeholder="Ingrese su comentario">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-chat"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
