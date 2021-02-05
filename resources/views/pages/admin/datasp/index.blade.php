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
              <h3 class="m-0 font-weight-bold text-primary">Data Violation</h3>
              @if(Auth::user()->roles == "admin")
                <div>
                       {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#importExcel">
                            <span class="icon text-white">
                            <i class="fas fa-file-import"></i>
                            </span>
                            &nbsp;
                            <span class="text-*-center">Import Data Violation</span>
                        </button> --}}
                    <a href="{{ route('violation.create')}}" class="btn btn-primary">
                        <span class="icon text-white">
                        <i class="fas fa-plus"></i>
                        </span>
                        &nbsp;
                        <span class="text-*-center">Add Data Violation</span>
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
                      @if(Auth::user()->roles == "admin")
                      <th>ID.</th>
                      @else
                      <th>No.</th>
                      @endif
                      <th>Worker Name</th>
                      <th>Position</th>
                      <th>Department</th>
                      <th>Violation</th>
                      <th>Category SP</th>
                      <th>Date</th>
                      <th>Detail</th>
                      @if(Auth::user()->roles == "admin")
                      <th class="text-center">Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                      @forelse($items as $key => $items)
                    <tr>
                      @if(Auth::user()->roles == "admin")
                            <td>{{ $items->id}}</td>
                            @else
                            <td>{{ $key+1}}</td>
                            @endif
                      <td>{{ $items->nama_kary}}</td>
                      <td>{{ $items->name_position}}</td>
                      <td>{{ $items->department}}</td>
                      <td>{{ $items->nama_sp}}</td>
                      <td>{{ $items->category}}</td>
                      <td>{{ date('d F Y', strtotime($items->tgl_sp))}}</td>
                       <td>{{ $items->detail_sp}}</td>
                      @if(Auth::user()->roles == "admin")
                      <td align="center">
                            <a href="{{ route('violation.edit',$items->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                                <form action="{{ route('violation.destroy',$items->id)}}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                              <tr>
                                <td colspan='10' class="text-center">
                                    Empty Data
                                </td>
                              </tr>
                              @endforelse
                  </tbody>
                  <tfoot>
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
        <script>
                    $(document).ready( function () {
                        $('#dataTable').DataTable();
                    } );
        </script>
@endpush

