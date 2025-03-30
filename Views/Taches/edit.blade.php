@extends('layouts.app')

@section('titre', 'Modifier Tach')

@section('content')
<div class="container">
    <h1>@yield('titre')</h1>

    <form action="{{ route('taches.update', ['id'=>$item->id_tache]) }}" method="POST">
        <div class='form-group'>
            <label for='id_tache'>Id tache</label>
            <input type='number' 
                   name='id_tache' 
                   id='id_tache' 
                   class='form-control'
                   value='{{ $item->id_tache }}'>
        </div>
        <div class='form-group'>
            <label for='nom'>Nom</label>
            <input type='text' 
                   name='nom' 
                   id='nom' 
                   class='form-control'
                   value='{{ $item->nom }}'>
        </div>
        <div class='form-group'>
            <label for='description'>Description</label>
            <input type='textarea' 
                   name='description' 
                   id='description' 
                   class='form-control'
                   value='{{ $item->description }}'>
        </div>
        <div class='form-group'>
            <label for='id_user'>Id user</label>
            <input type='number' 
                   name='id_user' 
                   id='id_user' 
                   class='form-control'
                   value='{{ $item->id_user }}'>
        </div>
        <div class='form-group'>
            <label for='mig'>Mig</label>
            <input type='number' 
                   name='mig' 
                   id='mig' 
                   class='form-control'
                   value='{{ $item->mig }}'>
        </div>
        
        
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('taches.index') }}" class="btn btn-secondary">Annuler</a>
        
    </form>
</div>
@endsection