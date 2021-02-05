@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Worker</h1>
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
                <form action="{{ route('data_kary.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="form-group">
                        <label for="nik" style="font-weight: bolder">NIK</label>
                        <input type="text" class="form-control" name="nik" value="{{ $item->nik}}">
                    </div>
                    <div class="form-group">
                        <label for="no_payroll" style="font-weight: bolder">No. Payroll</label>
                        <input type="text" class="form-control" name="no_payroll"  value="{{ $item->no_payroll}}">
                    </div>
                    <div class="form-group">
                        <label for="Posisi" style="font-weight: bolder">Position & Department</label>
                        <select name="id_position"required class="form-control">
                            <option value="{{ $item->data_positions->id }}">
                                {{ $item->data_positions->name_position }}
                                &nbsp;
                                {{ $item->data_positions->level }}
                                &nbsp;
                                {{ $item->data_positions->department }}
                            </option>
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
                        <input type="date" class="form-control" name="join_date"  value="{{ $item->join_date}}">
                    </div>
                    <div class="form-group">
                        <label for="name_kary" style="font-weight: bolder">Full Name</label>
                        <input type="text" class="form-control" name="nama_kary" value="{{ $item->nama_kary}}">
                    </div>
                    <div class="form-group">
                        <label for="image" style="font-weight: bolder">Upload Worker's Photo</label>
                        <input type="file" name="image" id="" placeholder="image" class="form-control" value="{{ $item->image}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat" style="font-weight: bolder">Address</label>
                        <textarea name="alamat" rows="5" class="d-block w-50 form-control">{{ $item->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" style="font-weight: bolder">Place of Birth</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{ $item->tempat_lahir}}">
                    </div>
                     <div class="form-group">
                        <label for="tgl_lahir" style="font-weight: bolder">Date of Birth</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{ $item->tgl_lahir}}">
                    </div>
                    <div class="form-group">
                        <label for="agama" style="font-weight: bolder">Religion</label>
                        <select name="agama" required class="form-control" value="{{ $item->agama}}">
                            <option value="BUDDHA" {{$item->agama == "BUDDHA" ? 'selected="selected"' : '' }}>Buddha</option>
                            <option value="HINDU" {{$item->agama == "HINDU" ? 'selected="selected"' : '' }}>Hindu</i></option>
                            <option value="ISLAM" {{$item->agama == "ISLAM" ? 'selected="selected"' : '' }}>Islam</option>
                            <option value="KATOLIK" {{$item->agama == "KATOLIK" ? 'selected="selected"' : '' }}>Katolik</option>
                            <option value="KRISTEN" {{$item->agama == "KRISTEN" ? 'selected="selected"' : '' }}>Kristen</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="jns_kel" style="font-weight: bolder">Gender</label>
                        <br>
                            <input type="radio"  name="jenis_kel" value="MALE" {{$item->jenis_kel == "MALE" ? 'checked="checked"' : '' }}>
                            <label for="contactChoice1">Laki-laki</label>
                            <input type="radio"  name="jenis_kel" value="FEMALE" {{$item->jenis_kel == "FEMALE" ? 'checked="checked"' : '' }}>
                            <label for="contactChoice2">Perempuan</label>
                    </div>
                     <div class="form-group">
                        <label for="gol_darah" style="font-weight: bolder">Blood Type</label>
                        <li><input type="radio"  name="gol_darah" value="A" {{$item->gol_darah == "A" ? 'checked="checked"' : '' }}>
                            &nbsp;
                            <label for="contactChoice1">A</label></li>
                        <li><input type="radio"  name="gol_darah" value="A+" {{$item->gol_darah == "A+" ? 'checked="checked"' : '' }}>
                            &nbsp;
                            <label for="contactChoice1">A+</label></li>
                        <li><input type="radio"  name="gol_darah" value="B" {{$item->gol_darah == "B" ? 'checked="checked"' : '' }}>
                            &nbsp;
                            <label for="contactChoice2">B</label></li>
                        <li><input type="radio"  name="gol_darah" value="B+" {{$item->gol_darah == "B+" ? 'checked="checked"' : '' }}>
                            &nbsp;
                            <label for="contactChoice2">B+</label></li>
                        <li><input type="radio"  name="gol_darah" value="AB" {{$item->gol_darah == "AB" ? 'checked="checked"' : '' }}>
                            &nbsp;
                            <label for="contactChoice1">AB</label></li>
                        <li><input type="radio"  name="gol_darah" value="O" {{$item->gol_darah == "O" ? 'checked="checked"' : '' }}>
                            &nbsp;
                            <label for="contactChoice2">O</label></li>
                        <li><input type="radio"  name="gol_darah" value="O+" {{$item->gol_darah == "O+" ? 'checked="checked"' : '' }}>
                            &nbsp;
                            <label for="contactChoice2">O+</label></li>
                    </div>
                    <div class="form-group">
                        <label for="status" style="font-weight: bolder">Marriage Status</label>
                        <select name="status" required class="form-control">
                            <option value="S" {{$item->status == "S" ? 'selected="selected"' : '' }}>Single</option>
                            <option value="K" {{$item->status == "K" ? 'selected="selected"' : '' }}>K (Menikah)</option>
                            <option value="K1" {{$item->status == "K1" ? 'selected="selected"' : '' }}>K1 (Menikah Anak 1) </option>
                            <option value="K2" {{$item->status == "K2" ? 'selected="selected"' : '' }}>K2 (Menikah Anak 2)</option>
                            <option value="K3" {{$item->status == "K3" ? 'selected="selected"' : '' }}>K3 (Menikah Anak 3)</option>
                            <option value="K4" {{$item->status == "K4" ? 'selected="selected"' : '' }}>K4 (Menikah Anak 4)</option>
                            <option value="K5" {{$item->status == "K5" ? 'selected="selected"' : '' }}>K5 (Menikah Anak 5)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        @if($item->jenis_kel == "MALE")
                        <label for="istri" style="font-weight: bolder">Name of Wife</label>
                        @else
                         <label for="istri" style="font-weight: bolder">Name of Husband</label>
                        @endif
                        <input type="text" class="form-control" name="istri"  value="{{ $item->istri}}">
                    </div>
                    <div class="form-group">
                        <label for="anak" style="font-weight: bolder">Name of Children</label>
                        <textarea name="anak" rows="5" class="d-block w-50 form-control">{{ $item->anak}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan" style="font-weight: bolder">Education</label>
                        <select name="pendidikan" required class="form-control">
                            <option value="SMP" {{$item->pendidikan == "SMP" ? 'selected="selected"' : '' }}>SMP</option>
                            <option value="SMK/SMA" {{$item->pendidikan == "SMK/SMA" ? 'selected="selected"' : '' }}>SMK/SMA</option>
                            <option value="D1" {{$item->pendidikan == "D1" ? 'selected="selected"' : '' }}>D1</option>
                            <option value="D2" {{$item->pendidikan == "D2" ? 'selected="selected"' : '' }}>D2</option>
                            <option value="D3" {{$item->pendidikan == "D3" ? 'selected="selected"' : '' }}>D3</option>
                            <option value="D4" {{$item->pendidikan == "D4" ? 'selected="selected"' : '' }}>D4</option>
                            <option value="S1" {{$item->pendidikan == "S1" ? 'selected="selected"' : '' }}>S1</option>
                            <option value="S2" {{$item->pendidikan == "S2" ? 'selected="selected"' : '' }}>S2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp" style="font-weight: bolder">No. Handphone</label>
                        <input type="text" class="form-control" name="no_hp"  value="{{ $item->no_hp}}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp" style="font-weight: bolder">No. Contact Emergency</label>
                        <input type="text" class="form-control" name="no_hp1"  value="{{ $item->no_hp1}}">
                    </div>
                    <div class="form-group">
                        <label for="no_rek" style="font-weight: bolder">No. BCA Account</label>
                        <input type="text" class="form-control" name="no_rek"  value="{{ $item->no_rek}}">
                    </div>
                    <div class="form-group">
                        <label for="npwp" style="font-weight: bolder">NPWP</label>
                        <input type="text" class="form-control" name="npwp"  value="{{ $item->npwp}}">
                    </div>
                    <div class="form-group">
                        <label for="bpjskes" style="font-weight: bolder">BPJS Kesehatan</label>
                        <input type="text" class="form-control" name="bpjskes"  value="{{ $item->bpjskes}}">
                    </div>
                    <div class="form-group">
                        <label for="bpjstk" style="font-weight: bolder">BPJS Ketenagakerjaan</label>
                        <input type="text" class="form-control" name="bpjstk"  value="{{ $item->bpjstk}}">
                    </div>
                    <div class="form-group">
                        <label for="status_kary" style="font-weight: bolder">Worker Status</label>
                        <br>
                            <input type="radio"  name="status_posisi" value="PKWT" {{$item->status_posisi == "PKWT" ? 'checked="checked"' : '' }}>
                            <label for="contactChoice1">PKWT</label>
                            <input type="radio"  name="status_posisi" value="DW" {{$item->status_posisi == "DW" ? 'checked="checked"' : '' }}>
                            <label for="contactChoice2">DW</label>
                            <input type="radio"  name="status_posisi" value="Deactive" {{$item->status_posisi == "Deactive" ? 'checked="checked"' : '' }}>
                            <label for="contactChoice2">Tidak Aktif</label>
                    </div>
                    <div class="form-group">
                        <label for="remarks" style="font-weight: bolder">Remark (Wajib Diisi Jika Status Karyawan Tidak Aktif !)</label>
                        <input type="text" class="form-control" name="remark" >
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save & Exit</button>
                    <div>
                </form>
              </div>
          </div>
        </div>
        <!-- /.container-fluid -->

@endsection

