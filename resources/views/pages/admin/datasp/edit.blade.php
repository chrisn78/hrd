@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit List Violation</h1>
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
                <form action="{{ route('violation.update',$vio->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="id_kary" style="font-weight: bolder">Data Worker</label>
                        <select name="id_kary"required class="form-control">
                            <option value="{{ $item->id_kary }}">
                                {{ $item->nama_kary }}
                                &nbsp;
                                {{ $item->name_position }}
                                &nbsp;
                                {{ $item->department }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category" style="font-weight: bolder">Choose SP Category</label>
                        <select name="category" required class="form-control browser-default custom-select" id="category">
                            <option value="Verbal" {{$item->category == "Verbal" ? 'selected="selected"' : '' }}>Verbal</option>
                            <option value="SP1" {{$item->category == "SP1" ? 'selected="selected"' : '' }}>SP I</option>
                            <option value="SP2" {{$item->category == "SP2" ? 'selected="selected"' : '' }}>SP II</option>
                            <option value="SP3" {{$item->category == "SP3" ? 'selected="selected"' : '' }}>SP III</option>
                            <option value="PHK" {{$item->category == "PHK" ? 'selected="selected"' : '' }}>PHK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_sp" style="font-weight: bolder">Choose Violation</label>
                        <select name="id_sp" required class="form-control browser-default custom-select" id="id_sp">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_sp" style="font-weight: bolder">Date of SP</label>
                        <input type="date" class="form-control" name="tgl_sp"  value="{{ $vio->tgl_sp }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat" style="font-weight: bolder">Detail of Violation</label>
                        <textarea name="detail_sp" rows="5" class="d-block w-50 form-control">{{ $vio->detail_sp }}</textarea>
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
