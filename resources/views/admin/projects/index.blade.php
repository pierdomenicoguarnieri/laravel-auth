@extends('layouts.admin')

@section('title')
  Index
@endsection

@section('content')
<div class="container py-4">
  <h2 class="fs-4 text-secondary mb-4">
    Projects Index
  </h2>

    @if(session('deleted'))
      <div class="alert alert-success mb-4" role="alert">
        {{session('deleted')}}
      </div>
    @endif

  <div class="pg-table-wrapper rounded-2 border border-1 overflow-hidden shadow-sm mb-4">
    <table class="table m-0">
      <thead>
        <tr>
          <th scope="col" class="text-center">
            <a class="text-black text-decoration-none" href="{{route('admin.orderBy', ['direction' => $direction])}}">
              #ID
              @if ($direction === 'asc')
                <i class="fa-solid fa-chevron-up ms-2"></i>
              @else
                <i class="fa-solid fa-chevron-down ms-2"></i>
              @endif
            </a>
          </th>
          <th scope="col">Title</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col" class="text-center">Finished</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
        <tr>
          <th scope="row" class="text-center">{{$project->id}}</th>
          <td>{{$project->title}}</td>
          <td>
            @php
              $date = date_create($project->start_date);
              echo date_format($date, 'd/m/Y');
            @endphp
          </td>
          <td>
            @if ($project->end_date)
              @php
                $date = date_create($project->end_date);
                echo date_format($date, 'd/m/Y');
              @endphp
            @else
              <span class="text-danger">No date</span>
            @endif
          </td>
          <td class="text-center">
            @if ($project->finished)
              <i class="fa-solid fa-check" style="color: #26a269;"></i>
            @else
            <i class="fa-solid fa-x" style="color: #e01b24;"></i>
            @endif
          </td>
          <td class="text-center">
            <a href="{{route('admin.projects.show', $project)}}" class="btn btn-primary" title="Show"><i class="fa-solid fa-eye"></i></a>
            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning" title="Edit"><i class="fa-solid fa-pencil"></i></a>
            @include('admin.partials.modal')
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div>
    {{$projects->links()}}
  </div>
</div>
@endsection
