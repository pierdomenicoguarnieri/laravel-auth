@extends('layouts.admin')

@section('content')
<div class="container py-4">
  <h2 class="fs-4 text-secondary mb-4">
    Create new project
  </h2>

  <form action="{{route('admin.projects.store')}}" method="POST">
    @csrf

    @if($errors->any())

      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>

    @endif

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input
        type="text"
        class="form-control @error('title') is-invalid @enderror"
        placeholder="Titolo"
        name="title"
        value="{{old('title')}}">
        @error('title')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea
        type="text"
        id="description"
        class="form-control @error('description') is-invalid @enderror"
        placeholder="Descrizione"
        name="description">{{old('description')}}</textarea>
        @error('decription')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
      <label for="start_date" class="form-label">Data d'inizio</label>
      <input
        type="text"
        class="form-control @error('start_date') is-invalid @enderror"
        placeholder="YYYY-MM-DD"
        name="start_date"
        value="{{old('start_date')}}">
        @error('start_date')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
      <label for="end_date" class="form-label">Data di fine</label>
      <input
        type="text"
        class="form-control @error('end_date') is-invalid @enderror"
        placeholder="YYYY-MM-DD"
        name="end_date"
        value="{{old('end_date')}}">
        @error('end_date')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
      <label for="used_languages" class="form-label">Linguaggi usati</label>
      <input
        type="text"
        class="form-control @error('used_languages') is-invalid @enderror"
        placeholder="PHP|Laravel|JavaScript"
        name="used_languages"
        value="{{old('used_languages')}}">
        @error('used_languages')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
      <label for="commits" class="form-label">Commits</label>
      <input
        type="number"
        class="form-control"
        placeholder="0"
        name="commits"
        value="{{old('commits')}}">
        @error('commits')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
      <label for="finished" class="form-label">Stato del progetto</label>
      <select class="form-select @error('finished') is-invalid @enderror" id="finished" name="finished">
        <option selected>Scegli una opzione</option>
        <option value="1">Terminato</option>
        <option value="0">Non Terminato</option>
      </select>
      @error('finished')
        <span class="text-danger">{{$message}}</span>
      @enderror
    </div>


    <button type="submit" class="btn btn-success mb-5">Crea</button>
  </form>
</div>

<script>
ClassicEditor
  .create( document.querySelector( '#description' ) )
  .catch( error => {
    console.error( error );
  } );
</script>

@endsection
