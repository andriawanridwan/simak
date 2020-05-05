@extends('layouts.master')

@section('content')
<div class="section-header">
    <h1>Tambah Konsentrasi</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('konsentrasi.store') }}" method="post">
            @csrf
            <div class="form-group">
 	            <label for="">Konsentrasi</label>
            	<input type="text" name="konsentrasi" class="form-control">
            	<label>Prodi</label>
            	{{ csrf_field() }}
					<?php $jsArray = "var prdName = new Array();"; ?>
            	<select  class="form-control" onchange="document.getElementById('a').value = prdName[this.value];">
            		<option disabled selected>--Pilih Prodi--</option>
            		@foreach($prodi as $data)
						<option value="{{ $data->prodi }}">{{ $data->prodi}}</option>
						<?php 
						$jsArray .= "prdName['".$data->prodi."'] = '".addslashes($data->id)."'; ";
						 ?>
					@endforeach
            	</select>
            	<input type="hidden" name="prodi_id" id="a" onblur="return hit();" class="form-control"  readonly><script type="text/javascript"><?php echo $jsArray; ?></script>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>


        </form>
    </div>
</div>
@endsection
