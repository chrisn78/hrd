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
              <h3 class="m-0 font-weight-bold text-primary">Data Positions</h3>
              @if(Auth::user()->roles == "admin")
                <div>
                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#importExcel">
                            <span class="icon text-white">
                            <i class="fas fa-file-import"></i>
                            </span>
                            &nbsp;
                            <span class="text-*-center">Import Data Position</span>
                        </button>
                    <a href="{{ route('data-jab.create')}}" class="btn btn-primary">
                        <span class="icon text-white">
                        <i class="fas fa-plus"></i>
                        </span>
                        &nbsp;
                        <span class="text-*-center">Add Position</span>
                    </a>
                </div>
                @endif
            </div>

            <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('post_import')}}" enctype="multipart/form-data">
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
                      <th class="text-center">ID.</th>
                      <th>Position</th>
                      <th>Level</th>
                      <th>Department</th>
                      @if(Auth::user()->roles != "hr" && Auth::user()->roles != "manager")
                      <th>Basic Salary</th>
                      @endif
                      <th>Remarks</th>
                      @if(Auth::user()->roles == "admin")
                      <th class="text-center">Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                      @forelse($items as $key => $items)
                    <tr>
                      <td>{{ $items->id}}</td>
                      <td>{{ $items->name_position}}</td>
                      <td>{{ $items->level}}</td>
                      <td>{{ $items->department}}</td>
                      @if(Auth::user()->roles != "hr" && Auth::user()->roles != "manager")
                      <td>{{ $items->basic_salary}}</td>
                      @endif
                      <td>{{ $items->remark}}</td>
                      @if(Auth::user()->roles == "admin")
                      <td align="center">
                            <a href="{{ route('data-jab.edit',$items->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                                {{-- <form action="{{ route('data-jab.destroy',$items->id)}}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form> --}}
                        </td>
                        @endif
                    </tr>
                    @empty
                              <tr>
                                <td colspan='7' class="text-center">
                                    Data Kosong
                                </td>
                              </tr>
                              @endforelse
                  </tbody>
                  @if(Auth::user()->roles != "hr" && Auth::user()->roles != "manager")
                    <tfoot>
                        <tr>
                            <th colspan="4" style="text-align:right">Total:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    @endif
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
        <script>
                    $(document).ready( function () {
                        $('#dataTable').DataTable( {
                        "footerCallback": function ( row, data, start, end, display ) {
                        var api = this.api(), data;

                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                        };

            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                var display = $.fn.dataTable.render.number( '.', '.', 0).display;
                var formattedNumber1 = display( pageTotal );
                var formattedNumber2 = display( total );
            // Update footer
            $( api.column( 4 ).footer() ).html(
            formattedNumber1 +' ( '+ formattedNumber2 +' Total All)'
            );
        }
    } );
                    } );
        </script>
@endpush

