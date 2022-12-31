@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Makanan') }}</div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif 
                <div class="card-body">
                    <div class="row mt-5">
                        <div class="col-lg-12 margin-tb">
                            <div class="float-start">
                                <h2>Tabel Makanan</h2>
                            </div>
                            <div class="float-end">
                                <a class="btn btn-success" href="{{ route('makanan.create') }}"> Tambahkan Makanan Baru</a>
                            </div>
                        </div>
                    </div>
                   
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                   
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama Makanan</th>
                            <th>Kode</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($makanan as $makanan)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $makanan->nama_makan }}</td>
                            <td>{{ $makanan->kode_makan }}</td>
                            <td>{{ $makanan->harga_makan }}</td>
                            <td>{{ $makanan->jumlah_makan }}</td>
                            <td>
                                <form action="{{ route('makanan.destroy',$makanan->id) }}" method="POST">
                    
                                    <a class="btn btn-primary" href="{{ route('makanan.edit',$makanan->id) }}">Edit</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
