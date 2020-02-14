@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Agregar etiqueta</h4>
          </div>
          <form action=" {{ route('tags.store') }} " method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel-body">
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ old('name') }}">
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('name') }} </small>
                @endif
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}">
                @if($errors)
                  <small id="emailHelp" class="form-text text-danger"> {{ $errors->first('slug') }} </small>
                @endif
              </div>
            </div>
            <div class="panel-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
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