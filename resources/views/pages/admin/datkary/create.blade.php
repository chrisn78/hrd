@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Worker</h1>
            <div>
                    <a href="{{ route('data_kary.index') }}">
                        <button class="btn btn-danger btn_block">Back</button>
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
                        <label for="nik" style="font-weight: bolder">NIK</label>
                        <input type="text" class="form-control" name="nik" value="{{ old('nik')}}">
                    </div>
                    <div class="form-group">
                        <label for="no_payroll" style="font-weight: bolder">No. Payroll</label>
                        <input type="text" class="form-control" name="no_payroll"  value="{{ old('no_payroll')}}">
                    </div>
                    <div class="form-group">
                        <label for="Posisi" style="font-weight: bolder">Position & Department</label>
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
                        <label for="join_date" style="font-weight: bolder">Join Date</label>
                        <input type="date" class="form-control" name="join_date"  value="{{ old('join_date')}}">
                    </div>
                    <div class="form-group">
                        <label for="name_kary" style="font-weight: bolder">Full Name</label>
                        <input type="text" class="form-control" name="nama_kary" value="{{ old('name_kary')}}">
                    </div>
                    <div class="form-group">
                        <label for="image" style="font-weight: bolder">Upload Worker's Photo</label>
                        <input type="file" name="image" id="" placeholder="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat" style="font-weight: bolder">Address</label>
                        <textarea name="alamat" rows="5" class="d-block w-50 form-control">{{ old('alamat')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" style="font-weight: bolder">Place of Birth</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir')}}">
                    </div>
                     <div class="form-group">
                        <label for="tgl_lahir" style="font-weight: bolder">Date of Birth</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir')}}">
                    </div>
                    <div class="form-group">
                        <label for="agama" style="font-weight: bolder">Religion</label>
                        <select name="agama" required class="form-control" value="{{ old('agama')}}">
                            <option value="">Choose Religion</option>
                            <option value="BUDDHA">Buddha</option>
                            <option value="HINDU">Hindu</i></option>
                            <option value="ISLAM">Islam</option>
                            <option value="KATOLIK">Katolik</option>
                            <option value="KRISTEN">Kristen</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="jns_kel" style="font-weight: bolder">Gender</label>
                        <br>
                            <input type="radio"  name="jenis_kel" value="MALE" id="gender">
                            <label for="contactChoice1">Laki-laki</label>
                            <input type="radio"  name="jenis_kel" value="FEMALE" id="gender">
                            <label for="contactChoice2">Perempuan</label>
                    </div>
                     <div class="form-group" >
                        <label for="gol_darah" style="font-weight: bolder">Blood Type</label>
                        <ul>
                        <li><input type="radio"  name="gol_darah" value="A">
                            &nbsp;
                            <label for="contactChoice1">A</label></li>
                        <li><input type="radio"  name="gol_darah" value="A+">
                            &nbsp;
                            <label for="contactChoice1">A+</label></li>
                        <li><input type="radio"  name="gol_darah" value="B">
                            &nbsp;
                            <label for="contactChoice2">B</label></li>
                        <li><input type="radio"  name="gol_darah" value="B+">
                            &nbsp;
                            <label for="contactChoice2">B+</label></li>
                        <li><input type="radio"  name="gol_darah" value="AB">
                            &nbsp;
                            <label for="contactChoice1">AB</label></li>
                        <li><input type="radio"  name="gol_darah" value="O">
                            &nbsp;
                            <label for="contactChoice2">O</label></li>
                        <li><input type="radio"  name="gol_darah" value="O+">
                            &nbsp;
                            <label for="contactChoice2">O+</label></li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="status" style="font-weight: bolder">Marriage Status</label>
                        <select name="status" required class="form-control" value="{{ old('status')}}">
                            <option value="">Choose Marriage Status</option>
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
                        <label for="istri" id="spouse" style="font-weight: bolder">Name of Wife/Husband</label>
                        <input type="text" class="form-control" name="istri"  value="{{ old('istri')}}">
                    </div>
                    <div class="form-group">
                        <label for="anak" style="font-weight: bolder">Name of Children</label>
                        <textarea name="anak" rows="5" class="d-block w-50 form-control">{{ old('anak')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan" style="font-weight: bolder">Education</label>
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
                        <label for="no_hp" style="font-weight: bolder">No. Handphone</label>
                        <input type="text" class="form-control" name="no_hp"  value="{{ old('no_hp')}}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp" style="font-weight: bolder">No. Contact Emergency</label>
                        <input type="text" class="form-control" name="no_hp1"  value="{{ old('no_hp1')}}">
                    </div>
                    <div class="form-group">
                        <label for="no_rek" style="font-weight: bolder">No. BCA Account</label>
                        <input type="text" class="form-control" name="no_rek"  value="{{ old('no_rek')}}">
                    </div>
                    <div class="form-group">
                        <label for="npwp" style="font-weight: bolder">NPWP</label>
                        <input type="text" class="form-control" name="npwp"  value="{{ old('npwp')}}">
                    </div>
                    <div class="form-group">
                        <label for="bpjskes" style="font-weight: bolder">BPJS Kesehatan</label>
                        <input type="text" class="form-control" name="bpjskes"  value="{{ old('bpjskes')}}">
                    </div>
                    <div class="form-group">
                        <label for="bpjstk" style="font-weight: bolder">BPJS Ketenagakerjaan</label>
                        <input type="text" class="form-control" name="bpjstk"  value="{{ old('bpjstk')}}">
                    </div>
                    <div class="form-group">
                        <label for="status_posisi" style="font-weight: bolder">Worker Status</label>
                        <br>
                            <input type="radio"  name="status_posisi" value="PWKT">
                            <label for="contactChoice1">PKWT</label>
                            <input type="radio"  name="status_posisi" value="DW">
                            <label for="contactChoice1">DW</label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                           <div class="col-4">
                               <button type="submit" class="btn btn-primary btn-block" name="button" value="exit">Save & Exit</button>
                           </div>
                           <div class="col-4">
                                <button type="submit" class="btn btn-success btn-block" name="button" value="add">Save & Add Again</button>
                           </div>
                           <div class="col-4">
                                <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                           </div>
                        </div>
                    </div>
                </form>
              </div>
          </div>
        </div>
        <!-- /.container-fluid -->

@endsection


