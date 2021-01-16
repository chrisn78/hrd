@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
          </div>
           <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-white shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text font-weight-bold text-primary text-uppercase mb-1">Total Karyawan Aktif</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $karyawan }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-3x text-gray-500"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           </div>

           {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Total By Department</h2>
          </div> --}}
          <!-- Content Row -->

        {{-- <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-7 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total By Department</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Front Office</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$fo}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fa fa-key fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">F&B Service</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$fbs}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-cocktail fa-2x text-gray-500" aria-hidden="true"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">F&B Product</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$fbp}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-hamburger fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Accounting</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$acc}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-balance-scale fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Human Resource</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hr}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-users-cog fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Engineering</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$eng}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-cogs fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Sales & Marketing</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sm}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-search-dollar fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Housekeeping</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hk}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-broom fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">SPA & Recreation</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$spa}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-spa fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Laundry</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ldy}}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-tshirt fa-2x text-gray-500"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Security</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sct}}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-user-shield fa-2x text-gray-500"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

                        <!-- Pie Chart -->
                <div class="col-xl-5 col-lg-5">
                    <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total By Department</h6>
                            </div>
                            <!-- Card Body -->
                                <div id="donutchart" class="card-body ml-1" style="width: auto; height: 500px;">
                                </div>
                    </div>
                </div>
        </div> --}}


        <!-- Area Summary Total By Dept -->
        <div class="row">
            <div class="col-xl col-lg">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total By Department</h6>
                </div>
                <!-- Card Body -->
                <div class="row">
                  <div class="col-xl-9 col-lg-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Front Office</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$fo}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fa fa-key fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">F&B Service</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$fbs}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-cocktail fa-2x text-gray-500" aria-hidden="true"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">F&B Product</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$fbp}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-hamburger fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Accounting</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$acc}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-balance-scale fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Human Resource</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hr}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-users-cog fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Engineering</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$eng}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-cogs fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Sales & Marketing</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sm}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-search-dollar fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Housekeeping</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hk}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-broom fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">SPA & Recreation</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$spa}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-spa fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Laundry</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ldy}}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-tshirt fa-2x text-gray-500"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Security</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sct}}</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-user-shield fa-2x text-gray-500"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-7">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div id="deptchart"  style="width: 400px; height:400px;"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <!-- Area Summary Total By Masa Kerja -->
        <div class="row">
            <div class="col-xl col-lg">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total By length Of Service</h6>
                </div>
                <!-- Card Body -->
                <div class="row">
                  <div class="col-xl-9 col-lg-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Masa Kerja < 1 Tahun</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mk01}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fa fa-key fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Masa Kerja 1-2 Tahun</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mk12}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-cocktail fa-2x text-gray-500" aria-hidden="true"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Masa Kerja 2-3 Tahun</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mk23}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-hamburger fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Masa Kerja 3-4 Tahun</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mk34}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-balance-scale fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Masa Kerja 4-5 Tahun</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mk45}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-users-cog fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text font-weight-bold text-success text-uppercase mb-1">Masa Kerja > 5 Tahun</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mk5}}</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-cogs fa-2x text-gray-500"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-7">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div id="mkchart"  style="width: 400px; height:400px;"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>


        <!-- Area Summary Gender -->
        <div class="row">
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total By Gender</h6>
                </div>
                <!-- Card Body -->
                <div class="row">
                  <div class="col-xl-8 col-lg-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Male</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$male}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-male fa-2x text-gray-500"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Female</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$female}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-female fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-7">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div id="genderchart"  style="width: 300px; height:300px;"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Area Summary Position Status -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total By Position Status</h6>
                </div>
                <!-- Card Body -->
                <div class="row">
                  <div class="col-xl-8 col-lg-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">PKWT</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pkwt}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-id-card fa-2x text-gray-500"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">DW</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dw}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-portrait fa-2x text-gray-500"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-7">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div id="postchart"  style="width: 300px; height:300px;"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row">
            <!-- Area Summary Education -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total By Education</h6>
                </div>
                <!-- Card Body -->
                <div class="row">
                  <div class="col-xl-8 col-lg-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">SMP</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$smp}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-school fa-2x text-gray-500"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">SMK/SMA</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$smk}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-school fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">D1</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$d1}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-university fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">D2</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$d2}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-university fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">D3</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$d3}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-university fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">D4</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$d4}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-university fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">S1</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$s1}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-university fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">S2</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$s2}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-university fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-7">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div id="educhart"  style="width: 250px; height:300px;"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Area Summary Religion -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total By Religion</h6>
                </div>
                <!-- Card Body -->
                <div class="row">
                  <div class="col-xl-8 col-lg-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Buddha</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$buddha}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-vihara fa-2x text-gray-500"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Hindu</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$hindu}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-gopuram fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Islam</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$islam}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-mosque fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Katolik</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$katolik}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-church fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Kristen</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kristen}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-bible fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-7">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div id="relchart"  style="width: 300px; height:300px;"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <!-- Area Summary blood type -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-danger">Total By Blood Type</h6>
                </div>
                <!-- Card Body -->
                <div class="row">
                  <div class="col-xl-8 col-lg-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-danger text-uppercase mb-1">A</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$gola}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-tint fa-2x text-gray-500"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-danger text-uppercase mb-1">A+</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$golaa}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-tint fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-danger text-uppercase mb-1">B</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$golb}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-tint fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-danger text-uppercase mb-1">B+</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$golbb}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-tint fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-danger text-uppercase mb-1">AB</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$golab}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-tint fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-danger text-uppercase mb-1">O</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$golo}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-tint fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-danger text-uppercase mb-1">O+</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$goloo}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-tint fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-7">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div id="bloodchart"  style="width: 300px; height:300px;"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Area Summary Marriage -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total By Marriage Status</h6>
                </div>
                <!-- Card Body -->
                <div class="row">
                  <div class="col-xl-8 col-lg-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Single</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$single}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-smile fa-2x text-gray-500"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">Menikah(K)</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kawin}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-ring fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">K1</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$k1}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-baby-carriage fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">K2</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$k2}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-baby-carriage fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">K3</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$k3}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-baby-carriage fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-1" style="height: 150px;">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text font-weight-bold text-success text-uppercase mb-1">K4</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$k4}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-baby-carriage fa-2x text-gray-500" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-7">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div id="marrchart"  style="width: 300px; height:300px;"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
</div>
        <!-- /.container-fluid -->

@endsection
@push('addon-script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dept', 'Total'],
          ['Accounting', {{$acc}}],
          ['Front Office',      {{$fo}}],
          ['F&B Product',  {{$fbp}}],
          ['F&B Service',  {{$fbs}}],
          ['Human Resource', {{$hr}}],
          ['Sales & Marketing',    {{$sm}}],
          ['Engineering',    {{$eng}}],
          ['SPA',    {{$spa}}],
          ['Laundry',    {{$ldy}}],
          ['Security',    {{$sct}}],
          ['Housekeeping',    {{$hk}}]
        ]);

        var options = {'title': '% Total By Department',
               'width': 300,
               'height': 400,
               'chartArea': {'width': '100%', 'height': '80%'},
               'legend': {'position': 'bottom'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('deptchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Length Of Service', 'Total'],
          ['< 1 Tahun', {{$mk01}}],
          ['1-2 Tahun',      {{$mk12}}],
          ['2-3 Tahun',  {{$mk23}}],
          ['3-4 Tahun',  {{$mk34}}],
          ['4-5 Tahun', {{$mk45}}],
          ['> 5 Tahun',    {{$mk5}}],
        ]);

        var options = {'title': '% Total By Length of Service',
               'width': 300,
               'height': 400,
               'chartArea': {'width': '100%', 'height': '80%'},
               'legend': {'position': 'bottom'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('mkchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Total'],
          ['Male', {{$male}}],
          ['Female',  {{$female}}],
        ]);

        var options = {'title': '% Total By Gender',
               'width': 250,
               'height': 300,
               'chartArea': {'width': '100%', 'height': '80%'},
               'legend': {'position': 'bottom'}
    };

        var chart = new google.visualization.PieChart(document.getElementById('genderchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Position Status', 'Total'],
          ['PKWT', {{$pkwt}}],
          ['DW',  {{$dw}}],
        ]);

        var options = {'title': '% Total By Position Status',
               'width': 250,
               'height': 300,
               'chartArea': {'width': '100%', 'height': '80%'},
               'legend': {'position': 'bottom'}
    };

        var chart = new google.visualization.PieChart(document.getElementById('postchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Position Status', 'Total'],
          ['SMP', {{$smp}}],
          ['SMK/SMA',  {{$smk}}],
          ['D1', {{$d1}}],
          ['D2',  {{$d2}}],
          ['D3', {{$d3}}],
          ['D4',  {{$d4}}],
          ['S1', {{$s1}}],
          ['S2',  {{$s2}}],
        ]);

        var options = {'title': '% Total By Education',
               'width': 250,
               'height': 300,
               'chartArea': {'width': '100%', 'height': '80%'},
               'legend': {'position': 'bottom'}
    };

        var chart = new google.visualization.PieChart(document.getElementById('educhart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Position Status', 'Total'],
          ['Buddha', {{$buddha}}],
          ['Hindu',  {{$hindu}}],
          ['Islam', {{$islam}}],
          ['Katolik',  {{$katolik}}],
          ['Kristen', {{$kristen}}],
        ]);

        var options = {'title': '% Total By Religion',
               'width': 250,
               'height': 300,
               'chartArea': {'width': '100%', 'height': '80%'},
               'legend': {'position': 'bottom'}
    };

        var chart = new google.visualization.PieChart(document.getElementById('relchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Blood Type', 'Total'],
          ['A', {{$gola}}],
          ['A+',  {{$golaa}}],
          ['B', {{$golb}}],
          ['B+',  {{$golbb}}],
          ['AB', {{$golab}}],
          ['O',  {{$golo}}],
          ['O+', {{$goloo}}],
        ]);

        var options = {'title': '% Total By Blood Type',
               'width': 250,
               'height': 300,
               'chartArea': {'width': '100%', 'height': '80%'},
               'legend': {'position': 'bottom'}
    };

        var chart = new google.visualization.PieChart(document.getElementById('bloodchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Marriage Status', 'Total'],
          ['Single', {{$single}}],
          ['Menikah',  {{$kawin}}],
          ['K1', {{$k1}}],
          ['K2',  {{$k2}}],
          ['K3', {{$k3}}],
          ['K4',  {{$k4}}],
        ]);

        var options = {'title': '% Total By Marriage Status',
               'width': 250,
               'height': 300,
               'chartArea': {'width': '100%', 'height': '80%'},
               'legend': {'position': 'bottom'}
    };

        var chart = new google.visualization.PieChart(document.getElementById('marrchart'));
        chart.draw(data, options);
      }
    </script>
@endpush
