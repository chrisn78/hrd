@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              @if ($title1 === "aktif")
              <h3 class="m-0 font-weight-bold text-primary">Data Karyawan Aktif</h3>
              @else
              <h3 class="m-0 font-weight-bold text-primary">Data Karyawan Tidak Aktif</h3>
              @endif
              <div>
                  @if ($title1 === "aktif")
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#importExcel">
                    <span class="icon text-white">
                      <i class="fas fa-file-import"></i>
                    </span>
                    &nbsp;
                    <span class="text-*-center">Import From Excel</span>
                </button>
                @endif
                  <a href="{{ route('kary_export')}}" class="btn btn-success">
                    <span class="icon text-white">
                      <i class="fas fa-file-export"></i>
                    </span>
                    &nbsp;
                    <span class="text-*-center">Export to Excel</span>
                  </a>
                  @if ($title1 === "aktif")
                  <a href="{{ route('data_kary.create')}}" class="btn btn-primary">
                    <span class="icon text-white">
                      <i class="fas fa-plus"></i>
                    </span>
                    &nbsp;
                    <span class="text-*-center">Tambah Data Karyawan</span>
                  </a>
                  @endif
              </div>
            </div>

            <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('kary_import')}}" enctype="multipart/form-data">
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
                <table class="table table-bordered table-hover" id="tablekary" width="100%" cellspacing="0">
                  <thead class="text-center thead-dark align-middle">
                    <tr>
                      <th class="text-center">Action</th>
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>Position</th>
                      <th>Level</th>
                      <th>Department</th>
                      <th>Join Date</th>
                      <th>Lama bekerja</th>
                      <th>Age</th>
                      <th>Status</th>
                      <th>Pendidikan</th>
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                      @forelse($items as $item)
                    <tr>
                        <td align="center">
                             <a href="{{ route('data_kary.show', $item->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                            <a href="{{ route('data_kary.edit',$item->id)}}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                                <form action="{{ route('data_kary.destroy',$item->id)}}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                </td>
                                <td>
                                    <img src="{{ Storage::url($item->image)}}" alt="" width="100px"
                                        class="img-thumbnail">
                                </td>
                                <td>{{ $item->nama_kary}}</td>
                                <td>{{ $item->data_positions->name_position}}</td>
                                <td>{{ $item->data_positions->level}}</td>
                                <td>{{ $item->data_positions->department}}</td>
                                <td>{{ date('d-m-Y', strtotime($item->join_date))}}</td>
                                {{-- <td>{{ $item->tempat_lahir}}, {{ date('d-m-Y', strtotime($item->tgl_lahir))}}</td> --}}
                                <td>{{ $diff = Carbon\Carbon::parse($item->join_date)->longAbsoluteDiffForHumans(Carbon\Carbon::now())}}</td>
                                <td>{{ $diff = Carbon\Carbon::parse($item->tgl_lahir)->longAbsoluteDiffForHumans(Carbon\Carbon::now())}}</td>
                                <td>{{ $item->status}}</td>
                                <td>{{ $item->pendidikan}}</td>
                                </tr>
                                @empty
                              <tr>
                                <td colspan='13' class="text-center">
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
@push('prepend-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
@endpush

@push('addon-script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
       <script>
                    $(document).ready( function () {
                        $('#tablekary').DataTable();
                    } );
        </script>
@endpush
