@extends('components.layout')
@section('heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create User</h1>
    </div>
@endsection
@section('content')
    <div class="row px-2">
        <div class="card shadow col-xl-12 col-md-12 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.user.create') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="noTelp" class="form-label">No. Telp</label>
                                <input type="text" class="form-control" name="noTelp" id="noTelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <select class="form-control" name="tempatLahir" id="tempatLahir">
                                    <option value="">--Tempat Lahir--</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-control" name="agama" id="agama">
                                    <option value="">--Agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggalLahir" class="form-label">Taggal Lahir</label>
                                <input id="tanggalLahir" name="tanggalLahir" class="form-control" type="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="luasLahan" class="form-label">Luas Lahan</label>
                                <input type="text" class="form-control" name="luasLahan" id="luasLahan" required>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(data => {
                let tempatLahir = document.getElementById('tempatLahir');
                data.forEach(tempat => {
                    let option = document.createElement('option');
                    option.value = tempat.name;
                    option.textContent = tempat.name;
                    tempatLahir.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching provinces:', error));
    });
</script>