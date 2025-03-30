@extends('layouts.app')

@section('title', 'Détails de Produit')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
    <th>Id</th>
    <td>{{ $item->id }}</td>
</tr>
<tr>
    <th>Nom</th>
    <td>{{ $item->nom }}</td>
</tr>
<tr>
    <th>Prix</th>
    <td>{{ $item->prix }}</td>
</tr>
<tr>
    <th>Stock</th>
    <td>{{ $item->stock }}</td>
</tr>
<tr>
    <th>Categorie id</th>
    <td>{{ $item->categorie_id }}</td>
</tr>
<tr>
    <th>Fournisseur id</th>
    <td>{{ $item->fournisseur_id }}</td>
</tr>
<tr>
    <th>Client favori id</th>
    <td>{{ $item->client_favori_id }}</td>
</tr>

                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('produits.index') }}" class="btn btn-primary">
        Retour à la liste
    </a>
</div>
@endsection