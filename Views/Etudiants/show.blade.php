@extends('layouts.app')

@section('title', 'Détails de Etudiant')

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
    <th>Name  email</th>
    <td>{{ $item->name__email }}</td>
</tr>
<tr>
    <th>Age</th>
    <td>{{ $item->age }}</td>
</tr>
<tr>
    <th>Note</th>
    <td>{{ $item->note }}</td>
</tr>
<tr>
    <th>Created at</th>
    <td>{{ $item->created_at }}</td>
</tr>
<tr>
    <th>Updated at</th>
    <td>{{ $item->updated_at }}</td>
</tr>

                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('etudiants.index') }}" class="btn btn-primary">
        Retour à la liste
    </a>
</div>
@endsection