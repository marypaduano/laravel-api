@extends('layouts.app')

@section('content')

  <div class="container py-5">
    <h1>NUOVO PROGETTO</h1>
  </div>

  <div class="container">
    <form action="{{ route('projects.store') }}" method="POST">

      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="client" class="form-label">Cliente</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="client" name="client" value="{{ old('client') }}">
        @error('client')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="url" class="form-label">Url</label>
        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}">
        @error('url')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('url') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      
      <button type="submit" class="btn btn-primary">SALVA</button>


    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </div>
  </div>
    
@endsection
