 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <img src="{{ url('backend/logo.png')}}" width="80px">
        </div>
        <div class="sidebar-brand-text mx-3">HR System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      @if (Auth::user()->roles != "worker")
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Workers</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('data_kary.index')}}">Active Workers</a>
            <a class="collapse-item" href="{{ route('kary_deactive.index')}}">Deactive Workers</a>
          </div>
        </div>
      </li>
      @endif

       <!-- Nav Item - Utilities Collapse Menu -->
       @if (Auth::user()->roles != "worker" && Auth::user()->roles != "hr")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('data-jab.index')}}">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Data Positions</span></a>
      </li>
      @endif
      <!-- Nav Item - Utilities Collapse Menu -->
      @if (Auth::user()->roles != "worker")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('data_train.index')}}">
          <i class="fas fa-fw fa-university"></i>
          <span>Data Trainings</span></a>
      </li>
      @endif

      <!-- Nav Item - Data User -->
      @if (Auth::user()->roles == "admin" || Auth::user()->roles == "gm" || Auth::user()->roles == "manager" || Auth::user()->roles == "ca")
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-gavel"></i>
          <span>Data Violations</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('type_violation.index')}}">List Violation</a>
            <a class="collapse-item" href="{{ route('violation.index')}}">Worker Violation</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Nav Item - Data User -->
      @if (Auth::user()->roles == "admin")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('data_user.index')}}">
          <i class="fas fa-fw fa-lock"></i>
          <span>Data Users</span></a>
      </li>
      @endif

      @if (Auth::user()->roles == "worker")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profile_kary.index')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Your Profile</span></a>
      </li>
      @endif
      @if (Auth::user()->roles == "admin" || Auth::user()->roles == "gm" )
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-gavel"></i>
          <span>Data Logs</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('loginlog')}}">Login Log</a>
            <a class="collapse-item" href="{{ route('activitylog')}}">Activity Log</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
