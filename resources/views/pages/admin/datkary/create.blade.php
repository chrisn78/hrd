@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Karyawan</h1>
            <div>
                    <a href="{{ route('data_kary.index') }}">
                        <button class="btn btn-danger btn_block">Kembali</button>
                    </a>
                </div>
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
                <form action="{{ route('data_kary.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" value="{{ old('nik')}}">
                    </div>
                    <div class="form-group">
                        <label for="no_payroll">No. Payroll</label>
                        <input type="text" class="form-control" name="no_payroll"  value="{{ old('no_payroll')}}">
                    </div>
                    <div class="form-group">
                        <label for="Posisi">Posisi dan Departemen</label>
                        <select name="id_position" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($data_positions as $data_positions)
                                 <option value="{{ $data_positions->id }}">
                                    {{ $data_positions->name_position}}
                                    &nbsp;
                                    {{ $data_positions->level}}
                                    &nbsp;
                                    {{ $data_positions->department}}
                                 </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="join_date">Join Date</label>
                        <input type="date" class="form-control" name="join_date"  value="{{ old('join_date')}}">
                    </div>
                    <div class="form-group">
                        <label for="name_kary">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama_kary" value="{{ old('name_kary')}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Foto Karyawan</label>
                        <input type="file" name="image" id="" placeholder="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" rows="5" class="d-block w-50 form-control">{{ old('alamat')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir')}}">
                    </div>
                     <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir')}}">
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select name="agama" required class="form-control" value="{{ old('agama')}}">
                            <option value="">Pilih Agama</option>
                            <option value="BUDDHA">Buddha</option>
                            <option value="HINDU">Hindu</i></option>
                            <option value="ISLAM">Islam</option>
                            <option value="KATOLIK">Katolik</option>
                            <option value="KRISTEN">Kristen</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="jns_kel">Jenis Kelamin</label>
                        <br>
                            <input type="radio"  name="jenis_kel" value="MALE">
                            <label for="contactChoice1">Laki-laki</label>
                            <input type="radio"  name="jenis_kel" value="FEMALE">
                            <label for="contactChoice2">Perempuan</label>
                    </div>
                     <div class="form-group">
                        <label for="gol_darah">Golongan Darah</label>
                        <br>
                        <ul>
                        <input type="radio"  name="gol_darah" value="A">
                            <label for="contactChoice1">A</label>
                        <input type="radio"  name="gol_darah" value="A+">
                            <label for="contactChoice1">A+</label>
                        <input type="radio"  name="gol_darah" value="B">
                            <label for="contactChoice2">B</label>
                        <input type="radio"  name="gol_darah" value="B+">
                            <label for="contactChoice2">B+</label>
                        <input type="radio"  name="gol_darah" value="AB">
                            <label for="contactChoice1">AB</label>
                        <input type="radio"  name="gol_darah" value="O">
                            <label for="contactChoice2">O</label>
                        <input type="radio"  name="gol_darah" value="O+">
                            <label for="contactChoice2">O+</label>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pernikahan</label>
                        <select name="status" required class="form-control" value="{{ old('status')}}">
                            <option value="">Pilih Status Pernikahan</option>
                            <option value="S">Single</option>
                            <option value="K">K (Menikah)</option>
                            <option value="K1">K1 (Menikah Anak 1) </option>
                            <option value="K2">K2 (Menikah Anak 2)</option>
                            <option value="K3">K3 (Menikah Anak 3)</option>
                            <option value="K4">K4 (Menikah Anak 4)</option>
                            <option value="K5">K5 (Menikah Anak 5)</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="istri">Nama Istri</label>
                        <input type="text" class="form-control" name="istri"  value="{{ old('istri')}}">
                    </div>
                    <div class="form-group">
                        <label for="anak">Nama Anak</label>
                        <textarea name="anak" rows="5" class="d-block w-50 form-control">{{ old('anak')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <select name="pendidikan" required class="form-control" value="{{ old('pendidikan')}}">
                            <option value="">Pilih Pendidikan</option>
                            <option value="SMP">SMP</option>
                            <option value="SMK/SMA" selected="selected">SMK/SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. Handphone</label>
                        <input type="text" class="form-control" name="no_hp"  value="{{ old('no_hp')}}">
                    </div>
                    <div class="form-group">
                        <label for="no_rek">No. Rekening BCA</label>
                        <input type="text" class="form-control" name="no_rek"  value="{{ old('no_rek')}}">
                    </div>
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" name="npwp"  value="{{ old('npwp')}}">
                    </div>
                    <div class="form-group">
                        <label for="bpjskes">BPJS Kesehatan</label>
                        <input type="text" class="form-control" name="bpjskes"  value="{{ old('bpjskes')}}">
                    </div>
                    <div class="form-group">
                        <label for="bpjstk">BPJS Ketenagakerjaan</label>
                        <input type="text" class="form-control" name="bpjstk"  value="{{ old('bpjstk')}}">
                    </div>
                    <div class="form-group">
                        <label for="status_posisi">Status karyawan</label>
                        <br>
                            <input type="radio"  name="status_posisi" value="PWKT">
                            <label for="contactChoice1">PWKT</label>
                            <input type="radio"  name="status_posisi" value="DW">
                            <label for="contactChoice1">DW</label>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Save & Add</button>
                    </div>
                        <div class="form-group">
                        <button type="reset" class="btn btn-primary btn-block">Reset</button>
                    </div>
                </form>
              </div>
          </div>
        </div>
        <!-- /.container-fluid -->

@endsection

