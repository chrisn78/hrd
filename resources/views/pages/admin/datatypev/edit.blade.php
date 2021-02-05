@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Violation</h1>
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
                <form action="{{ route('type_violation.update',$vio->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="category" style="font-weight: bolder">Choose Category SP</label>
                        <select name="category" required class="form-control" value="">
                            <option value="Verbal" {{$vio->jenis_sp == "Verbal" ? 'selected="selected"' : '' }}>Verbal</option>
                            <option value="SP1" {{$vio->jenis_sp == "SP1" ? 'selected="selected"' : '' }}>SP I</option>
                            <option value="SP2" {{$vio->jenis_sp == "SP2" ? 'selected="selected"' : '' }}>SP II</option>
                            <option value="SP3" {{$vio->jenis_sp == "SP3" ? 'selected="selected"' : '' }}>SP III</option>
                            <option value="PHK" {{$vio->jenis_sp == "PHK" ? 'selected="selected"' : '' }}>PHK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_sp" style="font-weight: bolder">Violation</label>
                         <textarea name="nama_sp" rows="5" class="d-block w-50 form-control">{{ $vio->nama_sp }}</textarea>
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

