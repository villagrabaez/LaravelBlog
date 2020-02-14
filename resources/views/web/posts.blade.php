@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <h1>Lista de articulos</h1>

      @forelse($posts as $post)
        <div class="panel panel-default">
          <div class="panel-heading">
            {{ $post->name }}
          </div>
          <div class="panel-body">
            @if($post->file)
              <img src=" {{ $post->file }} " alt=" {{ $post->name }} " class="img-responsive">
            @endif
            {{ $post->excerpt }}
          </div>
          <div class="panel-footer">
            <a href=" {{ route('post', $post->slug) }} ">Leer más</a>
          </div>
        </div>
      @empty
        <div class="panel panel-default">
          <p>No se encontraron entradas.</p>
        </div>
      @endforelse
      {{ $posts->render() }}
    </div>
  </div>
@endsection