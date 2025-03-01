<html>
<head>
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bonjour, {{ $username }}!</h1>
    <p>Ton email est : {{ $email }}</p>
    <h2>Liste des fruits :</h2>
    <ul>
        @foreach ($data as $fruit)
            <li>{{ $fruit }}</li>
        @endforeach
    </ul>
    @if ($number>12)
        <p>
            {{$number}}
        </p>
    @else
        <p>
            Different
        </p>
    @endif
        @csrf
    <!-- Lien vers la route nommée 'index.info' -->
    <a href="{{ route('user.index') }}">Aller à la page d'index</a>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</body>
</html>
