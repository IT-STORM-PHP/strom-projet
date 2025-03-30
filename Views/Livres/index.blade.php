@extends('layouts.app')

@section('title', 'Liste des Livres')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>
    
    <a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">
        Créer Livre
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
<th>Titre</th>
<th>Auteur id</th>
<th>Isbn</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
<td>{{ $item->titre }}</td>
<td>{{ $item->auteur_id }}</td>
<td>{{ $item->isbn }}</td>

                        <td>
                            <div class="btn-group">
                                <a href="{{ route('livres.edit', ['id'=>$item->id]) }}" 
                                   class="btn btn-sm btn-warning">
                                    Modifier
                                </a>
                                <form action="{{ url('livres.destroy'. $item->id) }}" 
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