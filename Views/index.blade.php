@extends('base.base')

@section('titre', 'Welcome')

@section('content')
    <div id="sec">
        <h1>Bonjour, Emery  {{ $username }}!</h1>
        <p>Ton email est : {{ $email }}</p>

        <h2>Liste des fruits :</h2>
        <ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Liste des fruits
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                @foreach ($data as $fruit)
               

                        <li><a class="dropdown-item" href="#">{{ $fruit }}</a></li>

                
                @endforeach
            </ul>
            </div>
        </ul>

        @if ($number > 12)
            <p>{{ $number }}</p>
        @else
            <p>Different</p>
        @endif
        
        <form method="POST" action="{{ route('user.store') }}">
        
            <button type="submit" class="btn btn-success ">
                <i class="fa-solid fa-plus"></i>
        <span class="text">Ajouter des employés</span>

            </button>
            
        </form>
        

        <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Aller à la page d'index</a>
    </div>
@endsection
