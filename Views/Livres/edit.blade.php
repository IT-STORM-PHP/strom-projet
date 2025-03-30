@extends('layouts.app')

@section('title', 'Modifier Livre')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <form action="{{ route('livres.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class='form-group'>
    <label for='titre'>Titre</label>
    <input type='text' name='titre' id='titre' class='form-control' value='{{ $item->titre }}'>
</div>
<div class='form-group'>
    <label for='auteur_id'>Auteur id</label>
    <input type='number' name='auteur_id' id='auteur_id' class='form-control' value='{{ $item->auteur_id }}'>
</div>
<div class='form-group'>
    <label for='isbn'>Isbn</label>
    <input type='text' name='isbn' id='isbn' class='form-control' value='{{ $item->isbn }}'>
</div>


        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection