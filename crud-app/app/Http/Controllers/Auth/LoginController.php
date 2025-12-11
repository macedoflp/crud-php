<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Error;
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

        // Verifica se o email existe
        $user = \App\Models\User::where('email', $validated['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Nenhuma conta encontrada com este e-mail.',
            ])->onlyInput('email');
        }

        // Verifica senha incorreta
        if (!\Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Senha incorreta.',
            ])->onlyInput('email');
        }

        // Se tudo ok → tenta logar
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            logger('User ' . Auth::user()->name . ' logged in');
           return redirect(env('APP_URL') . '/');
        }

        // fallback (quase nunca acontece)
        return back()->withErrors([
            'email' => 'Não foi possível autenticar. Tente novamente.',
        ]);
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
