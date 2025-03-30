@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>
    
    <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">
        Créer Produit
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
<th>Nom</th>
<th>Prix</th>
<th>Stock</th>
<th>Categorie id</th>
<th>Fournisseur id</th>
<th>Client favori id</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
<td>{{ $item->nom }}</td>
<td>{{ $item->prix }}</td>
<td>{{ $item->stock }}</td>
<td>{{ $item->categorie_id }}</td>
<td>{{ $item->fournisseur_id }}</td>
<td>{{ $item->client_favori_id }}</td>

                        <td>
                            <div class="btn-group">
                                <a href="{{ route('produits.edit', ['id'=>$item->id]) }}" 
                                   class="btn btn-sm btn-warning">
                                    Modifier
                                </a>
                                <form action="{{ url('produits/del/' . $item->id) }}" 
                                      method="POST">
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Supprimer cet élément ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection