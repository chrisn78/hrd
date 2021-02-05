        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <div class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <h5> Today : {{ Carbon\Carbon::now()->englishDayOfWeek }}, {{ Carbon\Carbon::now()->format('d F Y')}} || <span id="time"></span></h5>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            {{-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Last Activity
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
              </div>
            </li> --}}

            <!-- Nav Item - Messages -->
            {{-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Online User
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
              </div>
            </li> --}}

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                @if( (Carbon\Carbon::now()->format('H')) > 5 && (Carbon\Carbon::now()->format('H')) < 11)
                    @if (Auth::user()->gender == "female")
                        <span class="mr-2 d-none d-lg-inline" style="font-size:larger; color:black; font-weight:bold">Good Morning, Mrs. {{ Auth::user()->info_kary->nama_kary }} <br> <span style="font-size: 10px; float:right;"> {{ Auth::user()->info_kary->data_positions->name_position }} </span></span>
                    @else
                        <span class="mr-2 d-none d-lg-inline" style="font-size: larger; color:black; font-weight:bold">Good Morning, Mr. {{ Auth::user()->info_kary->nama_kary }} <br> <span style="font-size: 10px; float:right;"> {{ Auth::user()->info_kary->data_positions->name_position }} </span></span>
                    @endif
                @elseif( (Carbon\Carbon::now()->format('H')) > 11 && (Carbon\Carbon::now()->format('H')) < 18)
                    @if (Auth::user()->gender == "female")
                        <span class="mr-2 d-none d-lg-inline" style="font-size:larger; color:black; font-weight:bold">Good Afternoon, Mrs. {{ Auth::user()->info_kary->nama_kary }} <br> <span style="font-size: 10px; float:right;"> {{ Auth::user()->info_kary->data_positions->name_position }} </span></span>
                    @else
                        <span class="mr-2 d-none d-lg-inline" style="font-size: larger; color:black; font-weight:bold">Good Afternoon, Mr. {{ Auth::user()->info_kary->nama_kary }} <br> <span style="font-size: 10px; float:right;"> {{ Auth::user()->info_kary->data_positions->name_position }} </span></span>
                    @endif
                @elseif( (Carbon\Carbon::now()->format('H')) >= 18)
                    @if (Auth::user()->gender == "female")
                        <span class="mr-2 d-none d-lg-inline" style="font-size:larger; color:black; font-weight:bold">Good Evening, Mrs. {{ Auth::user()->info_kary->nama_kary }} <br> <span style="font-size: 10px; float:right;"> {{ Auth::user()->info_kary->data_positions->name_position }} </span></span>
                    @else
                        <span class="mr-2 d-none d-lg-inline" style="font-size: larger; color:black; font-weight:bold">Good Evening, Mr. {{ Auth::user()->info_kary->nama_kary }} <br> <span style="font-size: 10px; float:right;"> {{ Auth::user()->info_kary->data_positions->name_position }} </span></span>
                    @endif
                @endif
              <img class="img-profile rounded-circle" src="{{ Storage::url(Auth::user()->info_kary->image)}}" style="width: 50px; height:50px;">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('changepass.index')}}">
                  <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Your Email/Password
                </a>
                <a class="dropdown-item" href="{{ route('profile_kary.index')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>
          <script type="text/javascript">
            function showTime() {
                var date = new Date(),
                    utc = new Date(Date.UTC(
                    date.getFullYear(),
                    date.getMonth(),
                    date.getDate(),
                    date.getHours()-8,
                    date.getMinutes(),
                    date.getSeconds()
                    ));

                document.getElementById('time').innerHTML = utc.toLocaleTimeString('id-ID');
            }

            setInterval(showTime, 1000);
            </script>
        </nav>
        <!-- End of Topbar -->
