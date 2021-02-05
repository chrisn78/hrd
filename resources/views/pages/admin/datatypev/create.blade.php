@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Data Violation</h1>
            <div>
                    <a href="{{ route('type_violation.index') }}">
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
                <form action="{{ route('type_violation.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category" style="font-weight: bolder">Choose Category SP</label>
                        <select name="category" required class="form-control" value="{{ old('category')}}">
                             <option value="">Choose Category SP</option>
                            <option value="Verbal">Verbal</option>
                            <option value="SP1" >SP I</option>
                            <option value="SP2" >SP II</option>
                            <option value="SP3" >SP III</option>
                            <option value="PHK" selected>PHK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_sp" style="font-weight: bolder">Violation</label>
                        <textarea name="nama_sp" rows="5" class="d-block w-50 form-control">{{ old('nama_sp')}}</textarea>
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

