@extends('layouts.app')

@section('content')

<div class="container py-4">
  <h3>Progetto: {{ $project->title }}</h3>
</div>

<div class="container flex-column">
  <h5 class="py-3">Cliente: {{ $project->client }}</h5>
  <p>Descrizione: {{ $project->description }}</p>
  <p>Url Progetto: 
    <a href="{{ $project->url }}">{{ $project->url }}</a>
  </p>
<div class="py-4">
    <a class="btn btn-primary btn-sm" href="{{ route('projects.index') }}">Torna all'indice</a>
</div>
</div>

    
@endsection