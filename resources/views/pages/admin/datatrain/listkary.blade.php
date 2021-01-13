@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h3 class="m-0 font-weight-bold text-primary">Pilih Karyawan</h3>
              <a href="{{ route('data_train.create')}}" class="btn btn-primary">
                    <span class="icon text-white">
                      <i class="fas fa-sign-out"></i>
                    </span>
                    &nbsp;
                    <span class="text-*-center">Close</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tablekary" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">Pilih</th>
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>Position</th>
                      <th>Level</th>
                      <th>Department</th>
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                    @forelse($items as $item)
                    <tr>
                        <td align="center">
                                   <a href="{{ route('list_kary.store'),$item->id}}" class="btn btn-primary">
                                        <span class="icon text-white">
                                        <i class="fas fa-plus"></i>
                                        </span>
                                        &nbsp;
                                        <span class="text-*-center">Pilih</span>
                                    </a>
                        </td>
                                <td>
                                    <img src="{{ Storage::url($item->image)}}" alt="" width="100px"
                                        class="img-thumbnail">
                                </td>
                                <td>{{ $item->nama_kary}}</td>
                                <td>{{ $item->data_positions->name_position}}</td>
                                <td>{{ $item->data_positions->level}}</td>
                                <td>{{ $item->data_positions->department}}</td>
                                </tr>
                                @empty
                              <tr>
                                <td colspan='6' class="text-center">
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
