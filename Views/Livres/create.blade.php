@extends('layouts.app')

@section('title', 'Créer un(e) Livre')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <form action="{{ url('livres.store') }}" method="POST">
        @csrf

        <div class='form-group'>
    <label for='titre'>Titre</label>
    <input type='text' name='titre' id='titre' class='form-control' value='{{ old('titre') }}'>
</div>
<div class='form-group'>
    <label for='auteur_id'>Auteur id</label>
    <input type='number' name='auteur_id' id='auteur_id' class='form-control' value='{{ old('auteur_id') }}'>
</div>
<div class='form-group'>
    <label for='isbn'>Isbn</label>
    <input type='text' name='isbn' id='isbn' class='form-control' value='{{ old('isbn') }}'>
</div>


        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection