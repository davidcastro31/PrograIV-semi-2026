<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    public function index() {
        $canciones = Cancion::with('artista')
                    ->when(request('titulo'), fn($q, $v) => $q->where('titulo', 'like', "%$v%"))
                    ->when(request('genero'), fn($q, $v) => $q->where('genero', $v))
                    ->get();
        return response()->json($canciones);
    }

    public function store(Request $request) {
        $request->validate([
            'titulo'     => 'required|string|max:100',
            'artista_id' => 'required|exists:artistas,id',
            'genero'     => 'nullable|string|max:50',
            'archivo_audio' => 'nullable|string',
            'portada'    => 'nullable|string',
        ]);
        $cancion = Cancion::create($request->all());
        return response()->json($cancion, 201);
    }

    public function update(Request $request, $id) {
        $cancion = Cancion::findOrFail($id);
        $cancion->update($request->all());
        return response()->json($cancion);
    }

    public function destroy($id) {
        Cancion::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Canción eliminada']);
    }
}
