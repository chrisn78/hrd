@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Jabatan</h1>
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
                <form action="{{ route('data-jab.update',$item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="location">Pilih Department</label>
                        <select name="department" required class="form-control">
                            <option value="Front Office" {{$item->department == "Front Office" ? 'selected="selected"' : '' }}>Front Office</option>
                            <option value="Human Resource" {{ $item->department == "Human Resource" ? 'selected="selected"' : '' }}>Human Resource</option>
                            <option value="F&B Service" {{ $item->department == "F&B Service" ? 'selected="selected"' : '' }}>F&B Service</option>
                            <option value="F&B Product" {{$item->department  == "F&B Product" ? 'selected="selected"' : '' }}>F&B Product</option>
                            <option value="Housekeeping" {{ $item->department == "Housekeeping" ? 'selected="selected"' : '' }}>Housekeeping</option>
                            <option value="Sales & Marketing" {{ $item->department == "Sales & Marketing" ? 'selected="selected"' : '' }}>Sales & Marketing</option>
                            <option value="Accounting" {{ $item->department == "Accounting" ? 'selected="selected"' : '' }}>Accounting</option>
                            <option value="Engineering" {{ $item->department == "Engineering" ? 'selected="selected"' : '' }}>Engineering</option>
                            <option value="Security" {{ $item->department == "Security" ? 'selected="selected"' : '' }}>Security</option>
                            <option value="Laundry" {{ $item->department == "Laundry" ? 'selected="selected"' : '' }}>Laundry</option>
                            <option value="SPA & Recreation" {{ $item->department == "SPA & Recreation" ? 'selected="selected"' : '' }}>SPA & Recreation</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Nama Posisi</label>
                        <input type="text" class="form-control" name="name_position" value="{{ $item->name_position}}">
                    </div>
                    <div class="form-group">
                        <label for="location">Pilih Level</label>
                        <select name="level" required class="form-control">
                            <option value="Level I" {{ $item->level == "Level I" ? 'selected="selected"' : '' }}>Level I General Manager</option>
                            <option value="Level II" {{ $item->level == "Level II" ? 'selected="selected"' : '' }}>Level II Manager</option>
                            <option value="Level III"{{ $item->level == "Level III" ? 'selected="selected"' : '' }}>Level III Asst. Manager</option>
                            <option value="Level IV" {{ $item->level == "Level IV" ? 'selected="selected"' : '' }}>Level IV Supervisor</option>
                            <option value="Level V" {{ $item->level == "Level V" ? 'selected="selected"' : '' }}>Level V Senior Staff</option>
                            <option value="Level VI"{{ $item->level == "Level VI" ? 'selected="selected"' : '' }}>Level VI Staff</option>
                            <option value="Level VII" {{ $item->level == "Level VII" ? 'selected="selected"' : '' }}>Level VII DW NO SC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="base_salary"> Base Salary </label>
                        <input type="text" class="form-control" name="basic_salary" value="{{ $item->basic_salary}}">
                    </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <input type="text" class="form-control" name="remark" value="{{ $item->remark}}">
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

