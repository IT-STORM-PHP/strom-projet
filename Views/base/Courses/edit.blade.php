@extends('base.base')

@section('titre', 'Modifier une Course')

@section('content')
<div class="container">
    <h1>Modifier une Course</h1>

    <!-- Formulaire de modification -->
    <form action="{{ route('courses.update', ['id' => $item->id]) }}" method="POST">

        <!-- Champ pour le nom de la course -->
        <div class="form-group">
            <label for="name">Nom de la course :</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $item->point_depart }}">
        </div>

        <!-- Champ pour la description de la course -->
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" class="form-control">{{ $item->point_arrivee }}</textarea>
        </div>

        <!-- Bouton de soumission -->
        <input type="submit" value="Modifier" class="btn btn-primary" name="submit">
    </form>
</div>
@endsection