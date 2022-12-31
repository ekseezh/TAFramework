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
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div>
                                <h2>Edit Minuman</h2>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{ route('minuman.index') }}"> Back</a>
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
                  
                    <form action="{{ route('minuman.update',$minuman->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                   
                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Minuman:</strong>
                                    <input type="text" name="nama_minum" value="{{ $minuman->nama_minum }}" class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Kode:</strong>
                                    <input class="form-control" name="kode_minum" placeholder="Kode" value="{{ $minuman->kode_minum }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Harga:</strong>
                                    <input class="form-control" name="harga_minum" placeholder="Harga" value="{{ $minuman->harga_minum }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Jumlah:</strong>
                                    <input class="form-control" name="jumlah_minum" placeholder="Jumlah" value="{{ $minuman->jumlah_minum }}">
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
