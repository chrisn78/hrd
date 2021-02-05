@extends('layouts.admin')

@section('content')

            <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h3 class="m-0 font-weight-bold text-primary">Data Activity Log</h3>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-center thead-dark align-middle">
                    <tr>
                      <th>No.</th>
                      <th>Name of User</th>
                      <th>Department</th>
                      <th>Roles</th>
                      <th>Action</th>
                      <th>Description</th>
                      <th>Date Of Action</th>
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                      @forelse($items as $key => $items)
                    <tr>
                      <td>{{ $key+1}}</td>
                      <td>{{ $items->nama_user}}</td>
                      <td>{{ $items->dept}}</td>
                      <td>{{ $items->roles}}</td>
                      <td>{{ $items->action}}</td>
                      <td>{{ $items->description}}</td>
                      <td>{{ date('d F Y', strtotime($items->created_at))}}, Jam : {{ \Carbon\Carbon::parse($items->created_at)->format('H:i')}}</td>
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

