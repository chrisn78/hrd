@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Peserta Training</h1>
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
                        <label for="training_id">Data Training</label>
                        <select name="training_id"required class="form-control">
                        <option value="{{ $item->id}}">{{ $item->judul_training}} / {{ $item->speaker}} / {{ date('d F Y', strtotime($item->tgl_train))}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="karyawan_id">Pilih Karyawan</label>
                        <select name="karyawan_id"required class="form-control">
                        <option value="">Pilih Karyawan</option>
                            @foreach ($data_karys as $data_kary)
                                 <option value="{{ $data_kary->id }}">
                                    {{ $data_kary->nama_kary}}
                                    &nbsp;
                                    {{ $data_kary->data_positions->name_position}}
                                    &nbsp;
                                    {{ $data_kary->data_positions->department}}
                                 </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Pilih</button>
                </form>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable">
                        <thead class="text-center thead-dark align-middle">
                            <tr>
                                <th colspan='4' class="h5 mb-0 font-weight-bold">
                                 List Peserta
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Action</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                    <tbody class="align-self-left">
                      @forelse($kpt as $karyawan)
                        <tr>
                            <td align="center">
                                    <a href={{ route('data_peserta_remove', ['t_id' => $item->id, 'k_id' => $karyawan->karyawan_id]) }}>
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                            </td>
                            <td>{{ $karyawan->nama_kary}}</td>
                            <td>{{ $karyawan->name_position}}</td>
                            <td>{{ $karyawan->department}}</td>
                            @empty
                              <tr>
                                <td colspan='8' class="text-center">
                                    Data Kosong
                                </td>
                              </tr>
                              @endforelse
                        </tbody>
                </table>
                 <a href={{ route('data_train.index') }}>
                    <button class="btn btn-primary btn-block">Kembali</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

@endsection

