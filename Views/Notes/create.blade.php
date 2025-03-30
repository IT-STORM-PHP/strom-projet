@extends('layouts.app')

@section('title', 'Créer un(e) Note')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <form action="/notes/store" method="POST">
        @csrf

        <div class='form-group'>
    <label for='note'>Note</label>
    <input type='number' name='note' id='note' class='form-control' value='{{ old('note') }}'>
</div>
<div class='form-group'>
    <label for='description'>Description</label>
    <textarea name='description' id='description' class='form-control'>{{ old('description') }}</textarea>
</div>


        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection