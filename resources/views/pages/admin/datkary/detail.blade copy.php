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
                  <div class="col-6">
                    <div class="table-responsive">
                        <table style="width:auto" class="table table-bordered">
                            <tr>
                                <th colspan="3">
                                    <div class="card-header py-3 d-flex justify-content-between" style="background-color: #eaecf0">
                                        <h4 class="m-0 font-weight-bold text-primary">Profile Karyawan ({{ $item->nama_kary }})</h4>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="22" style="vertical-align: top">
                                    <img src="{{ Storage::url($item->image)}}" alt="" width="400px"
                                    class="img-thumbnail center" align="center">
                                </th>
                                <td>NIK</td>
                                <td>{{ $item->nik }}</td>
                            </tr>
                            <tr>
                                <td>No. Payroll</td>
                                <td>{{ $item->no_payroll }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $item->nama_kary }}</td>
                            </tr>
                            <tr>
                                <td>Position/Level</td>
                                <td>{{ $item->data_positions->name_position}} | {{ $item->data_positions->level}}</td>
                            </tr>
                            <tr>
                                <td>Basic Salary</td>
                                <td>{{ number_format($item->data_positions->basic_salary)}}</td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td>{{ $item->data_positions->department}}</td>
                            </tr>
                            <tr>
                                <td>Join Date</td>
                                <td>{{ date('d-m-Y', strtotime($item->join_date))}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $item->alamat }}</td>
                            </tr>
                            <tr>
                                <td>TTL</td>
                                <td>{{ $item->tempat_lahir}}, {{ date('d-m-Y', strtotime($item->tgl_lahir))}}</td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td>{{ $item->agama }}</td>
                            </tr>
                            <tr>
                                <td>Gender/Blood Type/Marriage Status</td>
                                <td>{{ $item->jenis_kel }} / {{ $item->gol_darah }} / {{ $item->status }}</td>
                            </tr>
                            @if(($item->jenis_kel) == "MALE")
                            <tr>
                                <td>Name of Wife</td>
                                <td>{{ $item->istri }}</td>
                            </tr>
                            @else
                            <tr>
                                <td>Name of Husband</td>
                                <td>{{ $item->istri }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Name of Children</td>
                                <td>{{ $item->anak }}</td>
                            </tr>
                            <tr>
                                <td>Education</td>
                                <td>{{ $item->pendidikan }}</td>
                            </tr>
                            <tr>
                                <td>No. Handphone</td>
                                <td>{{ $item->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>No. Contact Emergency</td>
                                <td>{{ $item->no_hp1 }}</td>
                            </tr>
                            <tr>
                                <td>No. BCA Account</td>
                                <td>{{ $item->no_rek }}</td>
                            </tr>
                            <tr>
                                <td>NPWP</td>
                                <td>{{ $item->npwp }}</td>
                            </tr>
                            <tr>
                                <td>BPJS Kesehatan</td>
                                <td>{{ $item->bpjskes }}</td>
                            </tr>
                            <tr>
                                <td>BPJS Ketenagakerjaan</td>
                                <td>{{ $item->bpjstk }}</td>
                            </tr>
                            <tr>
                                <td>Worker Status</td>
                                <td>{{ $item->status_posisi }}</td>
                            </tr>
                            <tr>
                                <td>Remark</td>
                                <td>{{ $item->remarks }}</td>
                            </tr>
                        </table>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th colspan="7">
                                        <div class="card-header py-3 d-flex justify-content-between" style="background-color: #eaecf0">
                                            <h5 class="m-0 font-weight-bold text-primary">Training that has been attended</h5>
                                        </div>
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
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0" style="margin-top: 50px">
                                    <thead>
                                        <tr>
                                        <th colspan="7">
                                        <div class="card-header py-3 d-flex justify-content-between" style="background-color: #eaecf0">
                                            <h5 class="m-0 font-weight-bold text-primary">Violation that have been committed</h5>
                                        </div>
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

