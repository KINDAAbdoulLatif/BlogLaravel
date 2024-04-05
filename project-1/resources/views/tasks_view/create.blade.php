@extends('tasks_view.app')
@section('content')
<h2>@if (empty($task))
    Creation
@else
    Modification
@endif  d'une tache</h2>
<form action="{{ empty($task) ? route('tache.store') : route('tache.update', $task->id) }}" method="POST">
    @csrf
    @if (!empty($task))
        @method('put')
    @endif
    <div class="nb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" @if (!empty($task))
            value="{{ old('title', $task->title)}}"
        @else
            
        @endif class="form-control" id="title">
    </div>
    <div class="nb-3">
        <label for="title" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="10">
            @empty($task)
                {{ old('description', '') }}
            @else
                {{ $task->description }}
            @endempty
        </textarea>
        
    </div>
    <div class="nb-3">
        <input type="checkbox" name="status" {{ empty($task) ? "" : "checked"}} class="form-check-input" id="form-check-label">
        <label for="title" class="form-label">Termine</label>
    </div>

    <button type="submit" class="btn btn-info">@if (empty($task))
        Ajouter
    @else
        Modifier
    @endif</button>
</form>
    
@endsection