<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
  // GET /api/tasks
  public function index()
  {
    return response()->json(Libro::all());
  }

  // POST /api/tasks
  public function store(Request $request)
  {
    $request->validate([
      'titulo' => 'required|string|max:25',
    ]);

    $libro = Libro::create([
      'titulo' => $request->titulo,
      'autor' => $request->autor,
      'descripcion' => $request->descripcion
    ]);

    return response()->json([
      'message' => 'Numero registrado',
      'libro' => $libro
    ], 201);
  }

  // GET /api/tasks/{id}
  public function show($id)
  {
    return response()->json(Libro::findOrFail($id));
  }

  // PUT/PATCH /api/tasks/{id}
  public function update(Request $request, $id)
  {
    $request->validate([
      'titulo' => 'required|string|max:25',
    ]);

    $libro = Libro::findOrFail($id);
    $libro->update([
      'titulo' => $request->titulo,
      'autor' => $request->autor,
      'descripcion' => $request->descripcion
    ]);

    return response()->json([
      'message' => 'Libro actualizado',
      'libro' => $libro
    ]);
  }

  // DELETE /api/tasks/{id}
  public function destroy($id)
  {
    $libro = Libro::findOrFail($id);
    $libro->delete();

    return response()->json(['message' => 'Libro eliminado']);
  }
}
