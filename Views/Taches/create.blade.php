@extends('base.base')

@section('title', 'Créer un(e) Tach')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <form action="/taches/store" method="POST">
        @csrf

        <div class='form-group'>
    <label for='id_tache'>Id tache</label>
    <input type='number' 
           name='id_tache' 
           id='id_tache' 
           class='form-control'
           value='{{ old('id_tache') }}'>
</div>
<div class='form-group'>
    <label for='nom'>Nom</label>
    <input type='text' 
           name='nom' 
           id='nom' 
           class='form-control'
           value='{{ old('nom') }}'>
</div>
<div class='form-group'>
    <label for='description'>Description</label>
    <input type='textarea' 
           name='description' 
           id='description' 
           class='form-control'
           value='{{ old('description') }}'>
</div>
<div class='form-group'>
    <label for='id_user'>Id user</label>
    <input type='number' 
           name='id_user' 
           id='id_user' 
           class='form-control'
           value='{{ old('id_user') }}'>
</div>
<div class='form-group'>
    <label for='mig'>Mig</label>
    <input type='number' 
           name='mig' 
           id='mig' 
           class='form-control'
           value='{{ old('mig') }}'>
</div>


        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('taches.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection