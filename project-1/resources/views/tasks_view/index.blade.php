@extends('tasks_view.app')

@section('content')
<a href="{{ route('tache.create') }}" class="btn btn-primary">Ajouter une tache</a>
<a href="{{ route('logout') }}" class="btn btn-primary ml-3">Se deconnecter</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{$task->title}}</td>
                <td>{{ Str::limit($task->description, 100)}}</td>
                <td>
                    @if ($task->status == 1)
                    <span class="badge text-bg-success">Termine</span>
                    @else
                    <span class="badge text-bg-warning">En cours</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('tache.edit', $task->id)}}" class="btn btn-info">Modifier</a>
                    <form action="{{ route('tache.destroy', $task->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-danger" onclick="return confirm('Etes vous sur de vouloir supprimer cette tache?')">Supprimer</button>

                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection