@extends('base.base')

@section('titre', 'Détails de Tach')

@section('content')
<div class="container">
    <h1>@yield('titre')</h1>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
    <th>Id tache</th>
    <td>{{ $item->id_tache }}</td>
</tr>
<tr>
    <th>Nom</th>
    <td>{{ $item->nom }}</td>
</tr>
<tr>
    <th>Description</th>
    <td>{{ $item->description }}</td>
</tr>
<tr>
    <th>Utilisateur</th>
    <td>
        @if($item->utilisateurs)
            {{ $item->utilisateurs->prenom }} {{ $item->utilisateurs->nom }}
        @else
            N/A
        @endif
    </td>
<tr>
    <th>Created at</th>
    <td>{{ $item->created_at }}</td>
</tr>
<tr>
    <th>Updated at</th>
    <td>{{ $item->updated_at }}</td>
</tr>
<tr>
    <th>Mig</th>
    <td>{{ $item->mig }}</td>
</tr>

                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('taches.index') }}" class="btn btn-primary">
        Retour à la liste
    </a>
</div>
@endsection