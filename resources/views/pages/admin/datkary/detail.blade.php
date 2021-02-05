@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

         @if (count($errors) > 0)
                 <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          <div class="card shadow">
              <div class="row card-body">
                  <div class="col-12">
                    <div class="row">
                        <div class="col-md-3 mb-3" >
                            <h5 style="font-weight: bold">Employee Profile</h5>
                            <div class="card" style="margin-top: 20px">
                                <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ Storage::url($item->image)}}" alt="Admin" class="img-thumbnail" width="500">
                                    <div class="mt-3">
                                    <h4 style="font-weight: bolder">{{ $item->nama_kary }}</h4>
                                    <p class="text-dark mb-1">{{ $item->data_positions->name_position}}</p>
                                    <p class="text-dark font-size-sm">{{ $item->data_positions->level}}</p>
                                    <p class="text-dark font-size-sm">Department Of {{ $item->data_positions->department}}</p>
                                    <p class="text-dark font-size-sm">Position Status : {{ $item->status_posisi}}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3" style="margin-top: 45px">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">NIK</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->nik }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">No. Payroll</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->no_payroll }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->nama_kary }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">Basic Salary</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    @if(Auth::user()->roles == "admin" || Auth::user()->roles == "gm" || Auth::user()->roles == "ca")
                                    {{ number_format($item->data_positions->basic_salary)}}
                                    @elseif (Auth::user()->info_kary->id == $item->id)
                                    {{ number_format($item->data_positions->basic_salary)}}
                                     @endif
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">Join Date</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ date('d-m-Y', strtotime($item->join_date))}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->alamat }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">TTL</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->tempat_lahir}}, {{ date('d-m-Y', strtotime($item->tgl_lahir))}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">Religion</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->agama }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">Gender/Blood Type/Marriage Status</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->jenis_kel }} / {{ $item->gol_darah }} / {{ $item->status }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    @if(($item->jenis_kel) == "MALE")
                                    <h6 class="mb-0">Name of Wife</h6>
                                    @else
                                    <h6 class="mb-0">Name of Husband</h6>
                                    @endif
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->istri }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">Name of Children</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->anak }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">Education</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->pendidikan }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">No. Handphone</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->no_hp }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">No. Contact Emergency</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->no_hp1 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">No. BCA Account</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->no_rek }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">NPWP</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->npwp }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">BPJS Kesehatan</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->bpjskes }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                    <h6 class="mb-0">BPJS Ketenagakerjaan</h6>
                                    </div>
                                    <div class="col-sm-7 text-dark">
                                    {{ $item->bpjstk }}
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead >
                                                <tr>
                                                <th colspan="7">
                                                    <h5 class="m-0 font-weight-bold text-primary">Training that has been attended</h5>
                                                </th>
                                                </tr>
                                                <tr>
                                                <th>No.</th>
                                                <th>Title of Training</th>
                                                <th>Speaker</th>
                                                <th>Date Of Training</th>
                                                <th>Start</th>
                                                <th>Finish</th>
                                                <th>Duration</th>
                                                </tr>
                                            </thead>
                                            <tbody class="align-self-left">
                                                @forelse($item->training as $key => $training)
                                                    <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{ $training->judul_training}}</td>
                                                    <td>{{ $training->speaker}}</td>
                                                    <td>{{ date('d F Y', strtotime($training->tgl_train))}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($training->start)->format('H:i')}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($training->finish)->format('H:i')}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($training->duration)->format('H:i')}}</td>
                                                    </tr>
                                                @empty
                                                        <tr>
                                                            <td colspan='8' class="text-center">
                                                                Empty Data
                                                            </td>
                                                        </tr>
                                                        @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" style="text-align:right">Total Hours:</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0" style="margin-top:30px">
                                            <thead>
                                                <tr>
                                                <th colspan="7">
                                                    <h5 class="m-0 font-weight-bold text-danger">Violation that have been committed</h5>
                                                </th>
                                                </tr>
                                                <tr>
                                                <th>No.</th>
                                                <th>Date Of SP</th>
                                                <th>SP Category</th>
                                                <th>Name of Violation</th>
                                                <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody class="align-self-left">
                                                @forelse($items as $key => $violation)
                                                    <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{ date('d F Y', strtotime($violation->tgl_sp))}}</td>
                                                    <td>{{ $violation->category}}</td>
                                                    <td>{{ $violation->nama_sp}}</td>
                                                    <td>{{ $violation->detail_sp}}</td>
                                                    </tr>
                                                @empty
                                                        <tr>
                                                            <td colspan='6' class="text-center">
                                                                Empty Data
                                                            </td>
                                                        </tr>
                                                @endforelse
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                        <div class="card-header d-flex justify-content-center" style="background-color: #eaecf0">
                                    <a href="{{ route('data_kary.index')}}" class="btn btn-primary">
                                            <span class="icon text-white">
                                            <i class="fas fa-times"></i>
                                            </span>
                                            &nbsp;
                                            <span class="text-*-center">Back</span>
                                    </a>
                        </div>
                  </div>
                </div>
        </div>
        <!-- /.container-fluid -->

@endsection
@push('prepend-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
@endpush

@push('addon-script')
       <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
       <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.22/api/sum().js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/1.3.0/moment-duration-format.min.js"></script>
        <script>
                    $(document).ready( function () {
                        $('#dataTable').DataTable( {
                        "footerCallback": function ( row, data, start, end, display ) {
                       var api = this.api(), data;
                        // Total over all pages
                        total_Duration = api.column(6).data().reduce( function (a, b) {
                            return moment.duration(a).asMilliseconds() + moment.duration(b).asMilliseconds();
                        }, 0 );
                        // Total over this page
                        pageTotal_Duration = api.column(6, { page: 'current'} ).data().reduce( function (a, b) {
                            return moment.duration(a).asMilliseconds() + moment.duration(b).asMilliseconds();
                        }, 0 );
                        // Update footer Column "quantita"
                                // Update footer
                                $( api.column( 6 ).footer() ).html(
                                    moment.utc(pageTotal_Duration).format("HH:mm") + ' ( Total All : '+ moment.duration(total_Duration).format("HH:mm") + ' )'
                                    );
                                }

                            } );
                        } );
        </script>
@endpush

