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
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div>
                                <h2>Edit Makanan</h2>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{ route('makanan.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                   
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  
                    <form action="{{ route('makanan.update',$makanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                   
                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Makanan:</strong>
                                    <input type="text" name="nama_makan" value="{{ $makanan->nama_makan }}" class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Kode:</strong>
                                    <input class="form-control" name="kode_makan" placeholder="Kode" value="{{ $makanan->kode_makan }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Harga:</strong>
                                    <input class="form-control" name="harga_makan" placeholder="Harga" value="{{ $makanan->harga_makan }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Jumlah:</strong>
                                    <input class="form-control" name="jumlah_makan" placeholder="Jumlah" value="{{ $makanan->jumlah_makan }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
