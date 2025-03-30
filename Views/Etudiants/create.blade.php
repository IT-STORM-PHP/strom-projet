@extends('layouts.app')

@section('title', 'Créer un(e) Etudiant')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <form action="/etudiants/store" method="POST">
        @csrf

        <div class='form-group'>
    <label for='name__email'>Name  email</label>
    <input type='text' name='name__email' id='name__email' class='form-control' value='{{ old('name__email') }}'>
</div>
<div class='form-group'>
    <label for='age'>Age</label>
    <input type='number' name='age' id='age' class='form-control' value='{{ old('age') }}'>
</div>
<div class='form-group'>
    <label for='note'>Note</label>
    
    <select name="note" id=""  class="form-select" aria-label="Default select example" value='{{ old('note') }}' id='note'>
        @foreach ($notes as $note)
            <option value="{{ $note->id }}">{{ $note->note }}</option>
        @endforeach
    </select>
</div>
    


        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

@endsection