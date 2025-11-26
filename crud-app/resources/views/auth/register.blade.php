<h2>Registrar</h2>
@if ($errors->any())
    <div>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<form action="/register" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') }}" autofocus>
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email') }}">
    <label for="password_confirmation">Password</label>
    <input type="password" name="password" value="{{ old('password') }}" >
    <button type="submit">Registrar</button>
</form>