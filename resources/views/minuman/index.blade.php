@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Minuman') }}</div>
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
                                <h2>Tabel Minuman</h2>
                            </div>
                            <div class="float-end">
                                <a class="btn btn-success" href="{{ route('minuman.create') }}"> Tambahkan Minuman Baru</a>
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
                            <th>Nama Minuman</th>
                            <th>Kode</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($minuman as $minuman)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $minuman->nama_minum }}</td>
                            <td>{{ $minuman->kode_minum }}</td>
                            <td>{{ $minuman->harga_minum }}</td>
                            <td>{{ $minuman->jumlah_minum }}</td>
                            <td>
                                <form action="{{ route('minuman.destroy',$minuman->id) }}" method="POST">
                    
                                    <a class="btn btn-primary" href="{{ route('minuman.edit',$minuman->id) }}">Edit</a>
                   
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
