@extends('layouts.app')

@section('title', 'Liste des Notes')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>
    
    <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">
        Créer Note
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
<th>Note</th>
<th>Description</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
<td>{{ $item->note }}</td>
<td>{{ $item->description }}</td>

                        <td>
                            <div class="btn-group">
                                <a href="{{ route('notes.edit', ['id'=>$item->id]) }}" 
                                   class="btn btn-sm btn-warning">
                                    Modifier
                                </a>
                                <form action="{{ url('notes/del/' . $item->id) }}" 
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