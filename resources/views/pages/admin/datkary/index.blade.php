@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              @if ($title1 === "aktif")
              <h3 class="m-0 font-weight-bold text-primary">Active Workers</h3>
              @else
              <h3 class="m-0 font-weight-bold text-primary">Deactive Workers</h3>
              @endif
              <div>
                @if(Auth::user()->roles == "admin")
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
                    <span class="text-*-center">Add Worker</span>
                  </a>
                  @endif
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
                      @if(Auth::user()->roles == "admin")
                      <th class="text-center">Action</th>
                      @endif
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Level</th>
                      <th>Department</th>
                      <th>Join Date</th>
                      <th>Length Of Service</th>
                      @if ($title1 === "aktif")
                      <th>Age</th>
                      <th>Status</th>
                      <th>Education</th>
                      @else
                      <th>Worker Status</th>
                      <th>Remark</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody class="align-self-left">
                      @forelse($items as $item)
                    <tr>
                            @if(Auth::user()->roles == "admin")
                                <td align="center">
                                    <a href="{{ route('data_kary.edit',$item->id)}}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                        {{-- <form action="{{ route('data_kary.destroy',$item->id)}}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form> --}}
                                </td>
                            @endif
                                <td class="d-flex justify-content-center">
                                    <div class="flip-card">
                                        <div class="flip-card-inner" >
                                                <div class="flip-card-front">
                                                    <img src="{{ Storage::url($item->image)}}" alt="" width="100px" height="135px">
                                                </div>
                                                <div class="flip-card-back" >
                                                    <p style="font-weight: bolder">Profile</p>
                                                    <a href="{{ route('data_kary.show', $item->id) }}" class="btn btn-primary" >
                                                        <i class="fa fa-eye fa-3x"></i>
                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->nama_kary}}</td>
                                <td>{{ $item->data_positions->name_position}}</td>
                                <td>{{ $item->data_positions->level}}</td>
                                <td>{{ $item->data_positions->department}}</td>
                                <td>{{ date('d-m-Y', strtotime($item->join_date))}}</td>
                                {{-- <td>{{ $item->tempat_lahir}}, {{ date('d-m-Y', strtotime($item->tgl_lahir))}}</td> --}}
                                <td>{{ $diff = Carbon\Carbon::parse($item->join_date)->longAbsoluteDiffForHumans(Carbon\Carbon::now())}}</td>
                                @if ($title1 === "aktif")
                                <td>{{ $diff = Carbon\Carbon::parse($item->tgl_lahir)->longAbsoluteDiffForHumans(Carbon\Carbon::now())}}</td>
                                <td>{{ $item->status}}</td>
                                <td>{{ $item->pendidikan}}</td>
                                @else
                                <td>{{ $item->status_posisi}}</td>
                                <td>{{ $item->remark}}</td>
                                @endif
                                </tr>
                                @empty
                              <tr>
                                <td colspan='13' class="text-center">
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
        <!-- /.container-fluid -->

@endsection
@push('addon-style')
    <style>
        .flip-card {
            background-color: transparent;
            width: 100px;
            height: 135px;
            /* border: 1px solid #f1f1f1; */
            perspective: 1000px; /* Remove this if you don't want the 3D effect */
            }

            /* This container is needed to position the front and back side */
            .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
            }

            /* Do an horizontal flip when you move the mouse over the flip box container */
            .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
            }

            /* Position the front and back side */
            .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden; /* Safari */
            backface-visibility: hidden;
            }

            /* Style the front side (fallback if image is missing) */
            .flip-card-front {
            background-color: #bbb;
            color: black;
            }

            /* Style the back side */
            .flip-card-back {
            background-color: dodgerblue;
            color: white;
            transform: rotateY(180deg);
            }
    </style>
@endpush
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
