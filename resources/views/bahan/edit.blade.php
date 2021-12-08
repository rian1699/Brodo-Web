@extends('layout.main')

@section('container')
    
<div class="col-xl-0 col-lg-0 col-md-0 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-0">
    <div class="card card-plain">
        <div class="card-header pb-0 p-3">
            <div class="row">
            <div class="col-6 d-flex align-items-center">
                <h6 class="mb-3 ms-3">Edit Data {{$tittle}}</h6>
            </div>
            </div>
        </div>
      <div class="card-body">
        <form  action="/bahan/{{ $bahans->id }}" method="post">
          @method('put')
          @csrf
          <div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{old('nama', $bahans->nama)}}" required placeholder="Nama Bahan Baku">
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <input type="text" class="form-control" name="supplier" id="supplier" value="{{old('supplier', $bahans->supplier)}}" required placeholder="Nama Supplier">
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <input type="number" class="form-control" name="stok" id="stok" value="{{old('stok', $bahans->stok)}}" required placeholder="Stok Bahan">
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <select name="satuan" id="satuan" class="form-control color-1" placeholder="Stok Bahan">
                <option value="kg">kg</option>
                <option value="gram">gram</option>
                <option value="ton">ton</option>
            </select>
          </div>
          <div class="text-center">
            <input type="submit" name="submit" value="Edit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection