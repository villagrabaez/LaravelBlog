@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Lista de etiquetas <a href="{{ route('tags.create') }}" class="btn btn-sm btn-success pull-right">Agregar etiqueta</a></h4>
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
                @forelse($tags as $tag)
                  <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td width="10px">
                      <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> Ver</a>
                    </td>
                    <td width="10px">
                      <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Editar</a>
                    </td>
                    <td width="10px">
                      <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <p>No se encontraron etiquetas.</p>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="panel-footer">
            {{ $tags->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection