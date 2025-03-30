@extends('layouts.app')

@section('title', 'Liste des Etudiants')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>
    
    <a href="{{ route('etudiants.create') }}" class="btn btn-primary mb-3">
        Créer Etudiant
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
<th>Name  email</th>
<th>Age</th>
<th>Note</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
<td>{{ $item->name__email }}</td>
<td>{{ $item->age }}</td>
<td>{{ $item->notes->note }}</td>

                        <td>
                            <div class="btn-group">
                                <a href="{{ route('etudiants.edit', ['id'=>$item->id]) }}" 
                                   class="btn btn-sm btn-warning">
                                    Modifier
                                </a>
                                <form action="{{ url('etudiants/del/' . $item->id) }}" 
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