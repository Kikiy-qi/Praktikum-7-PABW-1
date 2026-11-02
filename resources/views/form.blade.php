@extends('layouts.app')

@section('title', 'Form Pelaporan Banjir')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                <h4 class="text-primary fw-bold">Form Pelaporan Banjir Warga</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Pelapor</label>
                        <input type="text" class="form-control @error('nama_pelapor') is-invalid @enderror" name="nama_pelapor" value="{{ old('nama_pelapor') }}">
                        @error('nama_pelapor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">No. HP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi Lengkap</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}">
                        @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ old('kecamatan') }}">
                        @error('kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tinggi Air (cm)</label>
                        <input type="number" class="form-control @error('tinggi_air') is-invalid @enderror" name="tinggi_air" value="{{ old('tinggi_air') }}">
                        @error('tinggi_air') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan Kondisi</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto Bukti Banjir (JPG/JPEG/PNG, Maks 2MB)</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                        @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Kirim Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection