@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Data Training</h1>
            <div>
                    <a href="{{ route('data_train.index') }}">
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
                <form action="{{ route('data_train.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title" style="font-weight: bolder">Title of Training</label>
                        <input type="text" class="form-control" name="judul_training" value="{{ old('name_position')}}">
                    </div>
                    <div class="form-group">
                        <label for="base_salary" style="font-weight: bolder"> Speaker </label>
                        <input type="text" class="form-control" name="speaker" value="{{ old('speaker')}}">
                    </div>
                    <div class="form-group">
                        <label for="base_salary" style="font-weight: bolder"> Date of Training </label>
                        <input type="date" class="form-control" name="tgl_train" value="{{ old('tgl_train')}}">
                    </div>
                    <div class="form-group">
                        <label for="remark" style="font-weight: bolder">Start</label>
                        <input type="time" class="form-control" name="start" value="{{ old('remark')}}">
                    </div>
                    <div class="form-group">
                        <label for="remark" style="font-weight: bolder">Finish</label>
                        <input type="time" class="form-control" name="finish" value="{{ old('remark')}}">
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

