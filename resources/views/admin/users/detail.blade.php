@extends('components.layout')
@section('heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update User</h1>
    </div>
@endsection
@section('content')
    <div class="row px-2">
        <div class="card shadow col-xl-12 col-md-12 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update User</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.user.update', ['userId' => $user->id]) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="noTelp" class="form-label">No. Telp</label>
                                <input type="text" class="form-control" name="noTelp" id="noTelp" value="{{$user->no_telp}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <select class="form-control" name="tempatLahir" id="tempatLahir" required>
                                    <option value="">--Tempat Lahir--</option>
                                    @foreach(json_decode(file_get_contents('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')) as $tempat)
                                        <option value="{{ $tempat->name }}" @if($tempat->name == $user->tempat_lahir) selected @endif>{{ $tempat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-control" name="agama" id="agama" required>
                                    <option value="">--Agama--</option>
                                    <option value="Islam" @if($user->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen Protestan" @if($user->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                    <option value="Kristen Katolik" @if($user->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                    <option value="Hindu" @if($user->agama == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Buddha" @if($user->agama == 'Buddha') selected @endif>Buddha</option>
                                    <option value="Konghucu" @if($user->agama == 'Konghucu') selected @endif>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="{{ $user->nik }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input id="tanggalLahir" name="tanggalLahir" class="form-control" type="date" value="{{ $user->tanggal_lahir }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="luasLahan" class="form-label">Luas Lahan</label>
                                <input type="text" class="form-control" name="luasLahan" id="luasLahan" value="{{ $user->luas_lahan }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-success w-100">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
