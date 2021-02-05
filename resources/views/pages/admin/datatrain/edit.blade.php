@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Training</h1>
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
                 <form action="{{ route('data_train.update',$item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title" style="font-weight: bolder">Title of Training</label>
                        <input type="text" class="form-control" name="judul_training" value="{{ $item->judul_training}}">
                    </div>
                    <div class="form-group">
                        <label for="base_salary" style="font-weight: bolder"> Speaker </label>
                        <input type="text" class="form-control" name="speaker" value="{{ $item->speaker}}">
                    </div>
                    <div class="form-group">
                        <label for="base_salary" style="font-weight: bolder"> Date of Training </label>
                        <input type="date" class="form-control" name="tgl_train" value="{{ $item->tgl_train}}">
                    </div>
                    <div class="form-group">
                        <label for="remark" style="font-weight: bolder">Start</label>
                        <input type="time" class="form-control" name="start" value="{{ $item->start}}">
                    </div>
                    <div class="form-group">
                        <label for="remark" style="font-weight: bolder">Finish</label>
                        <input type="time" class="form-control" name="finish" value="{{ $item->finish}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Save & Exit</button>
                    </div>
                </form>
              </div>
          </div>
        </div>
        <!-- /.container-fluid -->

@endsection

