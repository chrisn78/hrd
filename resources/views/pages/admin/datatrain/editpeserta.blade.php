@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @if(Auth::user()->roles == "admin" || Auth::user()->dept == "hrsec")
            <h1 class="h3 mb-0 text-gray-800">Edit Training Participants</h1>
            @else
            <h1 class="h3 mb-0 text-gray-800">List Training Participants</h1>
            @endif
          </div>

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
              <div class="card-body">
                <form action="{{ route('data_peserta_store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="training_id" style="font-weight: bolder">Data Training</label>
                        <select name="training_id"required class="form-control">
                        <option value="{{ $item->id}}">{{ $item->judul_training}} / {{ $item->speaker}} / {{ date('d F Y', strtotime($item->tgl_train))}}</option>
                        </select>
                    </div>
                    @if(Auth::user()->roles == "admin" || Auth::user()->dept == "hrsec")
                    <div class="form-group">
                        <label for="karyawan_id" style="font-weight: bolder">Choose Worker</label>
                        <select name="karyawan_id"required class="form-control">
                        <option value="">Choose Worker</option>
                            @foreach ($data_karys as $data_kary)
                                 <option value="{{ $data_kary->id }}">
                                    {{ $data_kary->nama_kary}}
                                     &nbsp; |&nbsp;|&nbsp;
                                    {{ $data_kary->data_positions->name_position}}
                                     &nbsp; |&nbsp;|&nbsp;
                                    {{ $data_kary->data_positions->department}}
                                 </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Choose</button>
                    @endif
                </form>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable">
                        <thead class="text-center thead-dark align-middle">
                            {{-- <tr>
                                <th colspan='4' class="h5 mb-0 font-weight-bold">
                                 List Peserta
                                </th>
                            </tr> --}}
                            <tr>
                                 @if(Auth::user()->roles == "admin" || Auth::user()->dept == "hrsec")
                                    <th class="text-center">Action</th>
                                 @else
                                    <th>No.</th>
                                 @endif
                                <th>Name</th>
                                <th>Position</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                    <tbody class="align-self-left">
                      @forelse($kpt as $key => $karyawan)
                        <tr>
                             @if(Auth::user()->roles == "admin" || Auth::user()->dept == "hrsec")
                                <td align="center">
                                    <a href={{ route('data_peserta_remove', ['t_id' => $item->id, 'k_id' => $karyawan->karyawan_id]) }}>
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            @else
                                <td align="center">
                                    {{ $key+1}}
                                </td>
                            @endif
                            <td>{{ $karyawan->nama_kary}}</td>
                            <td>{{ $karyawan->name_position}}</td>
                            <td>{{ $karyawan->department}}</td>
                            @empty
                              <tr>
                                <td colspan='8' class="text-center">
                                    Empty Data
                                </td>
                              </tr>
                              @endforelse
                        </tbody>
                </table>
                 <a href={{ route('data_train.index') }}>
                    <button class="btn btn-danger btn-block">Back</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

@endsection

