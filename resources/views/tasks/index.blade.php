@extends('layouts.app')

@section('content')
  <div class="col-6">
    @include('layouts.errors')
    <div class="card mb-2">
      <div class="card-header">
        <h5 class="text-secondary">
          <i class="fas fa-tasks mr-2"></i> Nueva Tarea
        </h5>
      </div>
      <div class="card-body">
        <form action="{{route('tasks.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="">Tarea</label>
            <input type="text" name="task" placeholder="Introduce una tarea" class="form-control rounded-0">
            <button type="submit" name="button" class="btn btn-primary float-right mt-2">
              <i class="fas fa-save"></i>
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="card mb-2">
      <div class="card-header">
        <h5 class="text-secondary">
          <i class="fas fa-tasks mr-2"></i> Tareas Pendientes
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th class="align-middle text-center" scope="col">#</th>
              <th class="align-middle text-center" scope="col">Tareas</th>
              <th class="align-middle text-center" scope="col">Acciones</th>
            </thead>
            <tbody>
              @foreach($tasks as $task)
              <tr>
                <td class="align-middle text-center">{{$task->id}}</td>
                <td class="align-middle text-center">{{$task->name}}</td>
                <td class="align-middle text-center">
                  <a href="{{route('tasks.delete', ['id' => $task->id])}}" class="btn btn-sm btn-danger">
                    <i class="fas fa-times"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
