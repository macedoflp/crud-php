<p>
    <h2>Usuários</h2>
    <p>Esses são os usuários:</p>

    <ul>
        @foreach ($usuarios as $usuario)
            <li>{{ $usuario->name }} — {{ $usuario->email }}</li>
        @endforeach
    </ul>
</p>