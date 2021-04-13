  
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.dashboard') }}" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Quiz System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->image == null)
          <img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{ asset('img/students/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link {{ ($route == 'admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Profile</p>
            </a>
          </li>

          <li class="nav-item {{ ($prefix == '/quiz_list') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quiz
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.quiz.view') }}" class="nav-link {{ ($route == 'user.quiz.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quiz List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.complete.quiz.list') }}" class="nav-link {{ ($route == 'user.complete.quiz.list') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Complete Quiz</p>
                </a>
              </li>
            </ul>
          </li>
 

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>