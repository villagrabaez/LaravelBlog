@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{ $post->name }}</h1>

        <div class="panel panel-default">
          <div class="panel-heading">
            Categoria: <a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
          </div>
          <div class="panel-body">
            @if($post->file)
              <img src=" {{ $post->file }} " alt=" {{ $post->name }} " class="img-responsive">
            @endif
            {{ $post->excerpt }}
            <hr>
            {!! $post->body !!}
            <hr>
          </div>
          <div class="panel-footer">
            Etiquetas
            @foreach($post->tags as $tag)
              <a href="{{ route('tags', $tag->slug) }}">
                <small><b>{{ $tag->name }}</b></small>
              </a>
            @endforeach
          </div>
        </div>
    </div>
  </div>
@endsection