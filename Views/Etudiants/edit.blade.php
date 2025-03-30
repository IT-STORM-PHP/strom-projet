@extends('layouts.app')

@section('title', 'Modifier Etudiant')

@section('content')
<div class="container">
    <h1>@yield('title')</h1>

    <form action="{{ url('etudiants/update/' .$item->id) }}" method="POST">
        <div class='form-group'>
    <label for='name__email'>Name  email</label>
    <input type='text' name='name__email' id='name__email' class='form-control' value='{{ $item->name__email }}'>
</div>
<div class='form-group'>
    <label for='age'>Age</label>
    <input type='number' name='age' id='age' class='form-control' value='{{ $item->age }}'>
</div>
<div class='form-group'>
    <label for='note'>Note</label>
    <select name="note" id=""  class="form-select" aria-label="Default select example" value='{{ old('note') }}' id='note'>
        <option value="{{ $item->note }}" selected>
            {{ $item->notes->note }}
        </option>
        @foreach ($notes as $note)
            @if ($note->note != $item->notes->note)
                <option value="{{ $note->id }}">{{ $note->note }}</option>
            @endif
        @endforeach
    </select>
</div>


        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection