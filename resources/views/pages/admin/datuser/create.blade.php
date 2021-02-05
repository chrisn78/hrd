@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Data User</h1>
            <div>
                    <a href="{{ route('data-jab.index') }}">
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
                <form action="{{ route('data_user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="dept" style="font-weight: bolder">Pilih Department</label>
                        <select name="dept" required class="form-control" value="{{ old('dept')}}">
                            <option value="all">All Department</option>
                            <option value="fo">Front Office</option>
                            <option value="hrsec">Human Resource/Security</option>
                            <option value="fbs">F&B Service</option>
                            <option value="fbp">F&B Product</option>
                            <option value="hkls">Housekeeping/Laundry/SPA</option>
                            <option value="s&m">Sales & Marketing</option>
                            <option value="acc">Accounting</option>
                            <option value="eng">Engineering</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_kary" style="font-weight: bolder">Nama User/Karyawan</label>
                        <select name="id_kary" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($data_kary as $data_kary)
                                 <option value="{{ $data_kary->id }}">
                                    {{ $data_kary->nama_kary}}
                                    |&nbsp;|
                                    {{ $data_kary->data_positions->name_position}}
                                 </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender" style="font-weight: bolder">Jenis Kelamin</label>
                        <br>
                            <input type="radio"  name="gender" value="male">
                            <label for="contactChoice1">Laki-laki</label>
                            <input type="radio"  name="gender" value="female">
                            <label for="contactChoice2">Perempuan</label>
                    </div>
                    <div class="form-group">
                        <label for="base_salary" style="font-weight: bolder"> Email </label>
                        <input type="text" class="form-control" name="email" value="{{ old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bolder"><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bolder"><strong>Konfirmasi Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                    </div>
                   <div class="form-group">
                        <label for="roles" style="font-weight: bolder">Choose role</label>
                        <select name="roles" required class="form-control" value="{{ old('roles')}}">
                            <option value="admin">Admin</option>
                            <option value="gm">GM</option>
                            <option value="ca">CA</option>
                            <option value="manager">Manager</option>
                            <option value="worker">Worker</option>
                            <option value="hr">HR Admin</option>
                        </select>
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

