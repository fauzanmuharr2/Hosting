@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <center><b>{{ __('Tambah Data Kecamatan') }}</b></center>
                    </div>

                    <div class="card-body">
                        {{-- menampilkan error validasi --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('kecamatan.store') }}" method="POST">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="" class="form-label">Kota</label>
                                <select name="id_kota" class="form-control" id="">
                                    @foreach ($kota as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kota }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
