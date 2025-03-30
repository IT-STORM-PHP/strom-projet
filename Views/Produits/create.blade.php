@extends('layouts.app')

@section('title', 'Créer un(e) Produit')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <form action="/produits/store" method="POST">
        @csrf

        <div class='form-group'>
    <label for='nom'>Nom</label>
    <input type='text' name='nom' id='nom' class='form-control' value='{{ old('nom') }}'>
</div>
<div class='form-group'>
    <label for='prix'>Prix</label>
    <input type='text' name='prix' id='prix' class='form-control' value='{{ old('prix') }}'>
</div>
<div class='form-group'>
    <label for='stock'>Stock</label>
    <input type='number' name='stock' id='stock' class='form-control' value='{{ old('stock') }}'>
</div>
<div class='form-group'>
    <label for='categorie_id'>Categorie id</label>
    <input type='number' name='categorie_id' id='categorie_id' class='form-control' value='{{ old('categorie_id') }}'>
</div>
<div class='form-group'>
    <label for='fournisseur_id'>Fournisseur id</label>
    <input type='number' name='fournisseur_id' id='fournisseur_id' class='form-control' value='{{ old('fournisseur_id') }}'>
</div>
<div class='form-group'>
    <label for='client_favori_id'>Client favori id</label>
    <input type='number' name='client_favori_id' id='client_favori_id' class='form-control' value='{{ old('client_favori_id') }}'>
</div>


        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection