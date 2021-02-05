@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add List Violation</h1>
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
                <form action="{{ route('violation.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_kary" style="font-weight: bolder">Choose Worker</label>
                        <select name="id_kary"required class="form-control">
                            <option> Choose Worker </option>>
                            @foreach ($data_karys as $data_kary)
                                 <option value="{{ $data_kary->id }}">
                                    {{ $data_kary->nama_kary}}
                                     &nbsp; |&nbsp;|&nbsp;
                                    {{ $data_kary->data_positions->name_position}}
                                     &nbsp; |&nbsp;|&nbsp;
                                    {{ $data_kary->data_positions->department}}
                                 </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category" style="font-weight: bolder">Choose SP Category</label>
                        <select name="category" required class="form-control browser-default custom-select" value="{{ old('category')}}" id="category">
                            <option value="">-- Choose --</option>
                            <option value="Verbal">Verbal</option>
                            <option value="SP1">SP I</option>
                            <option value="SP2">SP II</option>
                            <option value="SP3">SP III</option>
                            <option value="PHK">PHK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_sp" style="font-weight: bolder">Choose Violation</label>
                        <select name="id_sp" required class="form-control browser-default custom-select" value="{{ old('id_sp')}}" id="id_sp">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_sp" style="font-weight: bolder">Date Of SP</label>
                        <input type="date" class="form-control" name="tgl_sp"  value="{{ old('tgl_sp')}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat" style="font-weight: bolder">Detail of Violation</label>
                        <textarea name="detail_sp" required rows="5" class="d-block w-50 form-control">{{ old('detail_sp')}}</textarea>
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
@push('addon-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category"]').on('change', function() {
            var stateID = $(this).val();

            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // $('#anjing').empty();
                        // $.each(data.subcategories[0].subcategories,function(index,subcategory){
                        // debugger;
                        // // $("#anjing").append($("<option> Temporary </option>"));
                        // $('#anjing').append('<option value="'+subcategory.id+'">'+subcategory.name_sp+'</option>');
                        // });
                        $('select[name="id_sp"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="id_sp"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="sp"]').append('<option value= >'+ "value" +'</option>');
            }
        });
    });
</script>
@endpush
