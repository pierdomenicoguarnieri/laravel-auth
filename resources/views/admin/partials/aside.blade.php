<aside class="h-100 text-white">

  <ul class="p-0 w-100">
    <li class="w-100 py-2 {{Route::currentRouteName() === 'admin.home' ?  'active' : ''}}">
      <a href="{{route('admin.home')}}"><i class="fa-solid fa-chart-line me-2"></i>Dashboard</a>
    </li>

    <li class="w-100 py-2 {{Route::currentRouteName() === 'admin.projects.index' || Route::currentRouteName() === 'admin.projects.show' || Route::currentRouteName() === 'admin.projects.edit' || str_contains(Route::currentRouteName(), 'admin.orderBy') ?  'active' : '' }}">
      <a href="{{route('admin.projects.index')}}"><i class="fa-solid fa-diagram-project me-2"></i>Projects</a>
    </li>

    <li class="w-100 py-2 {{Route::currentRouteName() === 'admin.projects.create' ?  'active' : ''}}">
      <a href="{{route('admin.projects.create')}}"><i class="fa-solid fa-square-plus me-2"></i>New Project</a>
    </li>
  </ul>
</aside>
