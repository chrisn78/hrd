@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h3 class="m-0 font-weight-bold text-primary">Daftar Training</h3>
              <a href="{{ route('data_train.create')}}" class="btn btn-primary">
                    <span class="icon text-white">
                      <i class="fas fa-plus"></i>
                    </span>
                    &nbsp;
                    <span class="text-*-center">Tambah Data Training</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">Action</th>
                      <th>Judul Training</th>
                      <th>Speaker</th>
                      <th>Tanggal Training</th>
                      <th>Start</th>
                      <th>Finish</th>
                      <th>Durasi Training</th>
                      <th>Jumlah Peserta</th>
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                      @forelse($items as $item)
                        <tr>
                            <td align="center">
                                <a href="{{ route('data_peserta_edit', $item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-user-plus"></i>
                                </a>
                                <a href="{{ route('data_train.edit',$item->id)}}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                    <form action="{{ route('data_train.destroy',$item->id)}}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                            </td>
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
                                    Data Kosong
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
                                    moment.utc(pageTotal_Duration).format("HH:mm") + ' ('+ moment.utc(total_Duration).format("HH:mm") + ' total)'
                                    );
                                }
                            } );
                        } );
        </script>
@endpush
