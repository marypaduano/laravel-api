@extends('layouts.app')

@section('content')

<div class="container py-5 d-flex justify-content-end">
    <a class="btn btn-primary" href="{{ route('projects.create') }}">AGGIUNGI PROGETTO</a>
</div>

<div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">TITLE PROJECT</th>
          <th scope="col">CLIENT</th>
          <th scope="col">DESCRIPTION</th>
          <th>TECHNOLOGY</th>
          <th scope="col">URL</th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)          
          <tr>
            <td>
              <a href="{{ route('projects.show', $project) }}">
                <strong>{{ $project->title }}</strong>
              </a>
            </td>
            <td>
                <p>{{ $project->client }}</p>
            </td>
            <td>
                <p>{{ $project->description }}</p>
            </td>
            <td>
              @forelse($project->technologies()->orderBy('name')->get() as $technology )
                <span class="badge rounded-pill text-bg-primary">{{ $technology->name }}</span>
              @empty
                - 
              @endforelse
            </td>
            <td>
                <a href="{{ $project->url }}">{{ $project->url }}</a>
                <p></p>
            </td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{ route('projects.edit',$project) }}">EDIT</a>
            </td>
            <td>
              <form action="{{ route('projects.destroy',$project) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger btn-sm" value="DELETE">
              </form>
            </td>            
          </tr>
              
        @endforeach 
      </tbody>
    </table>
  </div>
</div>
@endsection