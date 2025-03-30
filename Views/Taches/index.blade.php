@extends('base.base')

@section('titre', 'Liste des Tâches')

@section('content')
<form action="{{ route('taches.create') }}" 
    method="GET"
    >
  @csrf
  <button type="submit" class="btn btn-sm btn-info">
      Creer
  </button>
</form>
<div class="container">
    <h1>@yield('titre')</h1>
    
    

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Utilisateur</th>
                    <th>Migration</th>
                    <th>Créé le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{ $item->id_tache }}</td>
                        <td>{{ $item->nom }}</td>
                        <td>{{ $item->description, 50}}</td>
                        <td>
                            @if($item->utilisateurs)
                                {{ $item->utilisateurs->prenom }} {{ $item->utilisateurs->nom }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($item->migrations)
                                {{ $item->migrations->migration }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="btn-group">

                                <!-- Lien pour afficher --> 
                                <a href="{{ route('taches.show', ['id' => $item->id_tache]) }}" 
                                   class="btn btn-sm btn-info">
                                    Détails
                                <!-- Lien pour éditer -->
                                <a href="{{ route('taches.edit', ['id' => $item->id_tache]) }}" 
                                   class="btn btn-sm btn-warning">
                                    Modifier

                                </a>
                                 
                                <!-- Formulaire de suppression -->
                                <form action="{{ route('taches.destroy', $item->id_tache) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucune tâche trouvée</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
</div>
@endsection
