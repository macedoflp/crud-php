<h2>Login</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/login" method="POST">
    @csrf

    <label>Email</label>
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">

    <label>Password</label>
    <input type="password" name="password" placeholder="Password">

    <button type="submit">Entrar</button>
</form>
