@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Lista de categorias <a href="{{ route('categories.create') }}" class="btn btn-sm btn-success pull-right">Agregar categoria</a></h4>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="10px">ID</th>
                  <th>Nombre</th>
                  <th colspan="3">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @forelse($categories as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td width="10px">
                      <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> Ver</a>
                    </td>
                    <td width="10px">
                      <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Editar</a>
                    </td>
                    <td width="10px">
                      <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <p>No se encontraron categorias.</p>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="panel-footer">
            {{ $categories->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection