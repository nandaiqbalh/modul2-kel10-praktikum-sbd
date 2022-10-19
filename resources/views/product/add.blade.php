@extends('admin.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Product</h5>

		<form method="post" action="{{ route('product.store') }}">
			@csrf
			<div class="mb-3">
                <label for="merk" class="form-label">Merk Handphone</label>
                <input type="text" class="form-control" id="merk" name="merk">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Handphone</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock Handphone</label>
                <input type="text" class="form-control" id="stock" name="stock">
            </div>
			<div>
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
