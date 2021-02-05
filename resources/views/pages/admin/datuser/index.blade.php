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
              <h3 class="m-0 font-weight-bold text-primary">Data User</h3>
            <div>
                  <a href="{{ route('data_user.create')}}" class="btn btn-primary">
                    <span class="icon text-white">
                      <i class="fas fa-plus"></i>
                    </span>
                    &nbsp;
                    <span class="text-*-center">Add Data User</span>
                  </a>
            </div>
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
                      <th>No.</th>
                      <th>Nama User</th>
                      <th>Gender</th>
                      <th>Department</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Roles</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                      @forelse($items as $key => $items)
                    <tr>
                      <td>{{ $key+1}}</td>
                      <td>{{ $items->nama_kary}}</td>
                      <td>{{ $items->gender}}</td>
                      <td>{{ $items->dept}}</td>
                      <td>{{ $items->email}}</td>
                      <td>{{ $items->password}}</td>
                      <td>{{ $items->roles}}</td>
                      <td align="center">
                            <a href="{{ route('data_user.edit',$items->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                                <form action="{{ route('data_user.destroy',$items->id)}}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                    @empty
                              <tr>
                                <td colspan='7' class="text-center">
                                    Data Kosong
                                </td>
                              </tr>
                              @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection
