@extends('layouts.app')

@section('title', 'Modifier Note')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <form action="{{ url('notes/update/' .$item->id) }}" method="POST">
        <div class='form-group'>
    <label for='note'>Note</label>
    <input type='number' name='note' id='note' class='form-control' value='{{ $item->note }}'>
</div>
<div class='form-group'>
    <label for='description'>Description</label>
    <textarea name='description' id='description' class='form-control'>{{ $item->description }}</textarea>
</div>


        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection