@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Jabatan</h1>
            <div>
                    <a href="{{ route('data-jab.index') }}">
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
                <form action="{{ route('data-jab.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="location">Pilih Department</label>
                        <select name="department" required class="form-control" value="{{ old('department')}}">
                            <option value="">Pilih Department</option>
                            <option value="Executive Office">Front Office</option>
                            <option value="Human Resource">Human Resource</option>
                            <option value="F&B Service">F&B Service</option>
                            <option value="F&B Product">F&B Product</option>
                            <option value="Housekeeping">Housekeeping</option>
                            <option value="Sales & Marketing">Sales & Marketing</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Security">Security</option>
                            <option value="Laundry">Laundry</option>
                            <option value="SPA & Recreation">SPA & Recreation</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Nama Posisi</label>
                        <input type="text" class="form-control" name="name_position" value="{{ old('name_position')}}">
                    </div>
                    <div class="form-group">
                        <label for="location">Pilih Level</label>
                        <select name="level" required class="form-control" value="{{ old('level')}}">
                            <option value="">Pilih Level</option>
                            <option value="Level I">Level I General Manager</option>
                            <option value="Level II">Level II Manager</option>
                            <option value="Level III">Level III Asst. Manager</option>
                            <option value="Level IV">Level IV Supervisor</option>
                            <option value="Level V">Level V Senior Staff</option>
                            <option value="Level VI">Level VI Staff</option>
                            <option value="Level VII">Level VII DW NO SC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="base_salary"> Base Salary </label>
                        <input type="text" class="form-control" name="basic_salary" value="{{ old('basic_salary')}}">
                    </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <input type="text" class="form-control" name="remark" value="{{ old('remark')}}">
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

