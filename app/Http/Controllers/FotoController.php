<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Comentario;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            $id = $user->id;
            $fotos = Foto::where('user_id', $id)->get();
            return view('fotos.fotos', compact('fotos'));
        }
    }
    
    public function subirFoto(Request $request)
    {
        $user = auth()->user();

        if ($request->hasFile('foto')) {
            $id = $user->id;
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put('/' . $fileName, file_get_contents($image));
            $foto = new Foto;
            $foto->user_id = $id;
            $foto->descripcion = $request->descripcion;
            $foto->estado = 1;
            $foto->ruta = $fileName;
            $foto->save();
            return redirect('/fotos');
        }
    }
    public function mostrarFoto(string $ruta)
    {
        $file = Storage::disk('local')->get($ruta);
        return Image::make($file)->response();
    }
    public function eliminarFoto(Request $request)
    {
    if ($request->id_foto) {
        $foto = Foto::find($request->id_foto);

        
        if ($foto) {
            Storage::disk('local')->delete($foto->ruta);
            $foto->delete();
            return redirect('/fotos')->with('success', 'Foto eliminada exitosamente');
        } else {
            return redirect('/fotos')->with('error', 'La foto no existe o ya ha sido eliminada');
        }
    }

    return redirect('/fotos')->with('error', 'No se proporcionó un ID de foto válido');
    }
    public function subirComentario(Request $request)
    {
    if($request->comentario) { 
        $id = auth()->user()->id;
        $comentario = new Comentario; 
        $comentario->user_id = $id;
        $comentario->foto_id = $request->id_foto;
        $comentario->comentario = $request->comentario;
        $comentario->estado = 1;
        $comentario->save(); 
        return redirect('/home');
    }
    }
    public function eliminarComentario(Request $request)
    {
        if ($request->id_comentario) {
            $comentario = Comentario::find($request->id_comentario);

            if ($comentario) {
                $comentario->delete();
                return redirect('/fotos')->with('success', 'Comentario eliminado exitosamente');
            } else {
                return redirect('/fotos')->with('error', 'El comentario no existe o ya ha sido eliminado');
            }
        }

        return redirect('/fotos')->with('error', 'No se proporcionó un ID de comentario válido');
    }
}


