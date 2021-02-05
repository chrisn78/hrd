@extends('layouts.admin')

@section('content')
        {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h3 class="m-0 font-weight-bold text-primary">List of Trainings</h3>
              <div>
                @if(Auth::user()->roles == "admin" || Auth::user()->dept == "hrsec")
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#importExcel">
                            <span class="icon text-white">
                            <i class="fas fa-file-import"></i>
                            </span>
                            &nbsp;
                            <span class="text-*-center">Import Data Training</span>
                        </button>
                        <a href="{{ route('training_export')}}" class="btn btn-success">
                            <span class="icon text-white">
                            <i class="fas fa-file-export"></i>
                            </span>
                            &nbsp;
                            <span class="text-*-center">Export to Excel</span>
                        </a>
                        <a href="{{ route('data_train.create')}}" class="btn btn-primary">
                            <span class="icon text-white">
                            <i class="fas fa-plus"></i>
                            </span>
                            &nbsp;
                            <span class="text-*-center">Add Data Training</span>
                        </a>
                @endif
                </div>
            </div>

            <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('training_import')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">

                                    {{ csrf_field() }}

                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-center thead-dark align-middle">
                    <tr>
                      <th class="text-center">Action</th>
                      @if(Auth::user()->roles == "admin")
                      <th>ID.</th>
                      @else
                      <th>No.</th>
                      @endif
                      <th>Title Of Training</th>
                      <th>Speaker</th>
                      <th>Date of Training</th>
                      <th>Start</th>
                      <th>Finish</th>
                      <th>Duration</th>
                      <th>Number of participants</th>
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                      @forelse($items as $key => $item)
                        <tr>
                            <td align="center">
                                <a href="{{ route('data_peserta_edit', $item->id) }}" class="btn btn-primary">
                                     @if(Auth::user()->roles == "admin" || "hr")
                                    <i class="fa fa-user-plus"></i>
                                    @else
                                    <i class="fa fa-eye"></i>
                                    @endif
                                </a>
                                @if(Auth::user()->roles == "admin" || Auth::user()->dept == "hrsec")
                                <hr>
                                <a href="{{ route('data_train.edit',$item->id)}}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                    {{-- <form action="{{ route('data_train.destroy',$item->id)}}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form> --}}
                                @endif
                            </td>
                            @if(Auth::user()->roles == "admin")
                            <td>{{ $item->id}}</td>
                            @else
                            <td>{{ $key+1}}</td>
                            @endif
                            <td>{{ $item->judul_training}}</td>
                            <td>{{ $item->speaker}}</td>
                            <td>{{ date('d F Y', strtotime($item->tgl_train))}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->start)->format('H:i')}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->finish)->format('H:i')}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->duration)->format('H:i')}}</td>
                            <td>
                                {{ count($item->karyawan)}}
                            </td>
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
                        console.log(total_Duration);
                        console.log(pageTotal_Duration);
                        // Update footer Column "quantita"
                                // Update footer
                                $( api.column( 6 ).footer() ).html(
                                    moment.utc(pageTotal_Duration).format("HH:mm") + ' ('+ moment.duration(total_Duration).format("HH:mm") + ' total)'
                                    );
                                }
                            } );
                        } );
        </script>
@endpush
