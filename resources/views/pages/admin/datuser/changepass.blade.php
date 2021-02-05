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
                <form action="{{ route('changepass.update',$item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title" style="font-weight: bold">Nama User : {{ $item->info_kary->nama_kary}}</label>
                    </div>
                    <div class="form-group">
                        <label for="base_salary">Email </label>
                        <input type="text" class="form-control" name="email" value="{{ $item->email}}">
                    </div>
                     <div class="form-group">
                        <label for=""><strong>Password (Kosongkan jika tidak dirubah)</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
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

