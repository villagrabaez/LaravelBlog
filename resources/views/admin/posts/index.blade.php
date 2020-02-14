@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Mis posts <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success pull-right">Agregar post</a></h4>
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
              @forelse($posts as $post)
              <tbody>
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td width="10px">
                      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> Ver</a>
                    </td>
                    <td width="10px">
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Editar</a>
                    </td>
                    <td width="10px">
                      <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                      </form>
                    </td>
                  </tr>
              </tbody>
              @empty
                <p>No se encontraron entradas.</p>
              @endforelse
            </table>
          </div>
          <div class="panel-footer">
            {{ $posts->render() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection