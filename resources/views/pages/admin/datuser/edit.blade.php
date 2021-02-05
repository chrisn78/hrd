@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Data User</h1>
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
                <form action="{{ route('data_user.update',$item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="dept">Choose Department</label>
                        <select name="dept" required class="form-control">
                            <option value="all" {{$item->dept == "all" ? 'selected="selected"' : '' }}>All Dept</option>
                            <option value="fo" {{$item->dept == "fo" ? 'selected="selected"' : '' }}>Front Office</option>
                            <option value="hrsec" {{ $item->dept == "hrsec" ? 'selected="selected"' : '' }}>Human Resource/Security</option>
                            <option value="fbs" {{ $item->dept == "fbs" ? 'selected="selected"' : '' }}>F&B Service</option>
                            <option value="fbp" {{$item->dept  == "fbp" ? 'selected="selected"' : '' }}>F&B Product</option>
                            <option value="hkls" {{ $item->dept == "hkls" ? 'selected="selected"' : '' }}>Housekeeping/Laundry/SPA</option>
                            <option value="s&m" {{ $item->dept == "s&m" ? 'selected="selected"' : '' }}>Sales & Marketing</option>
                            <option value="acc" {{ $item->dept == "acc" ? 'selected="selected"' : '' }}>Accounting</option>
                            <option value="eng" {{ $item->dept == "eng" ? 'selected="selected"' : '' }}>Engineering</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" style="font-weight: bold">Nama User : {{ $item->info_kary->nama_kary}}</label>
                    </div>
                    <div class="form-group">
                        <label for="base_salary"> Email </label>
                        <input type="text" class="form-control" name="email" value="{{ $item->email}}">
                    </div>
                     <div class="form-group">
                        <label for=""><strong>Password (Kosongkan jika tidak dirubah)</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="roles" style="font-weight: bolder">Change role</label>
                        <select name="roles" required class="form-control" value="{{ old('roles')}}">
                            <option value="admin"  {{$item->roles == "admin" ? 'selected="selected"' : '' }}>Admin</option>
                            <option value="gm" {{$item->roles == "gm" ? 'selected="selected"' : '' }}>GM</option>
                            <option value="ca" {{$item->roles == "ca" ? 'selected="selected"' : '' }}>CA</option>
                            <option value="manager" {{$item->roles == "manager" ? 'selected="selected"' : '' }}>Manager</option>
                            <option value="worker" {{$item->roles == "worker" ? 'selected="selected"' : '' }}>Worker</option>
                            <option value="hr" {{$item->roles == "hr" ? 'selected="selected"' : '' }}>HR Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update & Exit</button>
                    <div>
                </form>
              </div>
          </div>
        </div>
        <!-- /.container-fluid -->

@endsection

