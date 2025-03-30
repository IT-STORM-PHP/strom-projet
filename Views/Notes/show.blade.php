@extends('layouts.app')

@section('title', 'Détails de Note')

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
    <th>Note</th>
    <td>{{ $item->note }}</td>
</tr>
<tr>
    <th>Description</th>
    <td>{{ $item->description }}</td>
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

    <a href="{{ route('notes.index') }}" class="btn btn-primary">
        Retour à la liste
    </a>
</div>
@endsection