@extends('layouts.admin')

@section('title')
  Home Dashboard
@endsection

@section('content')

  <div class="container py-4">
    <h2 class="fs-4 text-secondary mb-4">
      Dashboard Home
    </h2>
    <div class="row justify-content-center">
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-header">Message</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <span>Benvenuto nella home della dashboard, <span class="fw-bold">{{ Auth::user()->name }}</span>! Ci sono <span class="fw-bold">{{$n_projects}}</span> progetti!</span>
          </div>
        </div>
      </div>
    </div>

    <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Mostra i 5 progetti più recenti
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <table class="table m-0">
              <thead>
                <tr>
                  <th scope="col" class="text-center">#ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col" class="text-center">Finished</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($last_projects as $project)
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
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
