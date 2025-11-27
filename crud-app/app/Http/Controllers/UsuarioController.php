<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    /**
     * Lista todos os usuários.
     */
    public function index()
    {
        $usuarios = User::all(); 

        return response()->json([
            'status' => true,
            'data' => $usuarios
        ], 200);
    }

    /**
     * Retorna um único usuário pelo ID.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json([
                'status' => false,
                'message' => 'Usuário não encontrado.'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $usuario
        ], 200);
    }

    public function listarView()
    {
        $usuarios = User::all();
        return view('usuarios', compact('usuarios'));
    }


    // Outros métodos não utilizados (mantidos para resource)
    public function create() {}
    public function store(Request $request) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
