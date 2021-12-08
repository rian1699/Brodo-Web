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
        <form  action="/user/{{ $users->id }}" method="post">
          @method('put')
          @csrf
          <div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <input type="text" class="form-control" name="nama_dpn" id="nama_dpn" value="{{old('nama_dpn', $users->nama_dpn)}}" required placeholder="Nama Depan">
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <input type="text" class="form-control" name="nama_blkng" id="nama_blkng" value="{{old('nama_blkng', $users->nama_blkng)}}" required placeholder="Nama Belakang">
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <input type="email" class="form-control" name="email" id="email" value="{{old('email', $users->email)}}" required placeholder="Email">
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <input type="password" class="form-control" name="password" id="password" value="" required placeholder="Password">
          </div>
          <div class="text-center">
            <input type="submit" name="submit" value="Edit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection