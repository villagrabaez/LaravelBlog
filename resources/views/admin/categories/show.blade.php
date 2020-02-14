@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Ver categoria</h4>
          </div>
          <div class="panel-body">
            <p><strong>Nombre: </strong> {{ $category->name }} </p>
            <p><strong>Slug: </strong> {{ $category->slug }} </p>
            <p><strong>Descripcion: </strong> {{ $category->body }}</p>
          </div>
          <div class="panel-footer">
            <a href=" {{ route('categories.index') }} " class="btn btn-sm btn-primary">Volver</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection