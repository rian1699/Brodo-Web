@extends('layout.main')


@section('container')

    {{-- Tombol Tambah --}}
    <div class="card-header pb-0 p-3">
        <div class="row">
        <div class="col-6 d-flex align-items-center">
            <h6 class="mb-3">Data {{$tittle}}</h6>
        </div>
        <div class="col-6 text-end">
            <a class="btn bg-gradient-dark mb-3" href="/predict/create"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah Data</a>
        </div>
        </div>
    </div>

    <table class="table align-items-center mb-0">
        
        <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok Produk</th>
            <th class="text-secondary opacity-7"></th>
        </tr>
        </thead>
        
        <tbody>
            @foreach ($predicts as $item)
        <tr>
            
            <td>
            <div class="d-flex px-2 py-1">
                <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 ms-2 text-sm">{{ $item->nama }}</h6>
                </div>
            </div>
            </td>
            <td class="align-middle text-center text-sm">
            <p class="text-xs font-weight-bold mb-0">{{ $item->stok }}</p>
            </td>
            <td class="align-middle">
            <form action="{{asset('/produk/'.$item->id.'/edit')}}" method="POST">
                @csrf
                @method('get')
                <button class="btn text-xs font-weight-bold mb-0 justify-content-center text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                </button>
            </form>
            </td>
            @endforeach
        </tr>
        </tbody>
    </table>

@endsection