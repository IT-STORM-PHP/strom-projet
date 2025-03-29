@extends('base.base')

@section('titre', 'Liste des Courses')

@section('content')
<!-- boutton ajouter -->
<div class="container mt-4">
    <a href="{{ route('courses.create') }}" class="btn btn-success">Ajouter une course</a>
</div>
<div class="container mt-4">
    <h2 class="mb-4">Liste des Courses</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Point de départ</th>
                <th>Point d'arrivé</th>
                <th>Date et heure</th>
                <th>Statut</th>
                <th>Chauffeur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $course)
                <tr>
                    <td>{{ $course->course_id }}</td>
                    <td> {{ $course->point_depart }} </td>
                    <td>{{ $course->point_arrivee }}</td>
                    <td>{{ $course->date_heure }}</td>
                    <td>{{ $course->satut }}</td>
                    <td>{{ $course->chauffeurs->nom }}</td>
                    <td>
                        <a href="{{ route('courses.show', ['id' => $course->course_id]) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('courses.edit', ['id' => $course->course_id]) }}" class="btn btn-warning">Modifier</a>
                        <form method="POST" action="{{ route('courses.destroy', ['id' => $course->course_id]) }}" class="d-inline">
                            
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
