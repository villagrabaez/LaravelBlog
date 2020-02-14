@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Editar categoria</h4>
          </div>
          <form action=" {{ route('categories.update', $category->id) }} " method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel-body">
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value=" {{ $category->name }} {{ old('name') }}">
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('name') }} </small>
                @endif
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }} {{ old('slug') }}">
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('slug') }} </small>
                @endif
              </div>
              <div class="form-group">
                <label for="body">Descripcion</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="3">{{ $category->body }} {{ old('body') }}</textarea>
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
  <script>
    $(document).ready(function(){
      $("#name, slug").stringToSlug({
          callback: function(text){
              $("#slug").val(text);
          }
      });
    });
  </script>
@endsection