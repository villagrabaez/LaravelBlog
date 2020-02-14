@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Editar post</h4>
          </div>
          <form action=" {{ route('posts.update', $post->id) }} " method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel-body">
              <div class="form-group">
                <label for="name">Titulo</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value=" {{ $post->name }} {{ old('name') }}">
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('name') }} </small>
                @endif
              </div>
              <div class="form-group">
                <label for="file">Imagen</label>
                <input class="form-control" type="file" name="file" id="file">
              </div>
              <div class="form-group">
                <label>Estado</label><br>
                <input type="radio" id="published" name="status" value="PUBLISHED" {{ $post->status === 'PUBLISHED' ? 'checked' : '' }}>
                <label for="published">Publicado</label> &nbsp;
                <input type="radio" id="draft" name="status" value="DRAFT" {{ $post->status === 'DRAFT' ? 'checked' : '' }}>
                <label for="draft">Borrador</label>
                <div>
                  @if($errors)
                    <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('status') }} </small>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label>Etiquetas</label>
                <div>
                  @foreach($tags as $tag)
                    <input
                      type="checkbox"
                      value="{{ $tag->id }}"
                      name="tags[{{ $tag->id }}]"
                      id="tags-{{ $tag->id }}"

                      {{ $errors->any() ? old("tags-{$tag->id}") : $post->tags->contains($tag) ? 'checked' : '' }}

                    > <strong>{{ $tag->name }}</strong>
                  @endforeach
                </div>
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('tags') }} </small>
                @endif
              </div>
              <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id" class="form-control">
                  <option value="">Seleccione una categoria</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id', $post->category_id) == $category->id ? ' selected' : '' }} > {{ $category->name }}
                    </option>
                  @endforeach
                </select>
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('category_id') }} </small>
                @endif
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $post->slug }} {{ old('slug') }}">
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('slug') }} </small>
                @endif
              </div>
              <div class="form-group">
                <label for="excerpt">Extracto</label>
                <textarea class="form-control" name="excerpt" id="excerpt" cols="30" rows="3">{{ $post->excerpt }}{{ old('body') }}</textarea>
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('excerpt') }} </small>
                @endif
              </div>
              <div class="form-group">
                <label for="body">Contenido</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $post->body }} {{ old('body') }}</textarea>
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('name') }} </small>
                @endif
              </div>
            </div>
            <div class="panel-footer">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src=" {{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }} "></script>
  <script src=" {{ asset('vendor/ckeditor/ckeditor.js') }} "></script>
  <script>
      $(document).ready(function(){
          $("#name, slug").stringToSlug({
              callback: function(text){
                  $("#slug").val(text);
              }
          });
      });

      CKEDITOR.config.height = 400;
      CKEDITOR.config.width = 'auto';
      CKEDITOR.replace('body');
  </script>
@endsection