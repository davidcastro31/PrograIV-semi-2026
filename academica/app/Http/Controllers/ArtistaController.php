<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    public function index() {
        $artistas = Artista::when(request('nombre'), fn($q, $v) => $q->where('nombre', 'like', "%$v%"))
                           ->when(request('genero'), fn($q, $v) => $q->where('genero', $v))
                           ->get();
        return response()->json($artistas);
    }

    public function store(Request $request) {
        $request->validate([
            'nombre'    => 'required|string|max:100',
            'genero'    => 'required|string|max:50',
            'biografia' => 'nullable|string',
            'foto'      => 'nullable|string',
        ]);
        $artista = Artista::create($request->all());
        return response()->json($artista, 201);
    }

    public function update(Request $request, $id) {
        $artista = Artista::findOrFail($id);
        $artista->update($request->all());
        return response()->json($artista);
    }

    public function destroy($id) {
        Artista::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Artista eliminado']);
    }
}
