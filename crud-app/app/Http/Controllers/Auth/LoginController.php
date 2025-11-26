<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Exibe o formulário de login.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Processa o login.
     */
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tenta logar
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            logger('User ' . Auth::user()->name . ' logged in');
            return redirect('/');
        }

        // Falhou → retorna erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    /**
     * Faz logout.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Métodos não utilizados em login resource:
    public function index() { abort(404); }
    public function show(string $id) { abort(404); }
    public function edit(string $id) { abort(404); }
    public function update(Request $request, string $id) { abort(404); }
}
