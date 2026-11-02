@extends('layouts.app')

@section('title', 'Edit Laporan')

@section('content')
<div class="card shadow-sm border-0 col-md-7 mx-auto">
    <div class="card-header bg-white pt-3">
        <h4 class="fw-bold">Edit Laporan & Status Penanganan</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Pelapor</label>
                <input type="text" class="form-control @error('nama_pelapor') is-invalid @enderror" name="nama_pelapor" value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}">
                @error('nama_pelapor') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">No. HP</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $laporan->no_hp) }}">
                @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Lokasi</label>
                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi', $laporan->lokasi) }}">
                @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{ old('kecamatan', $laporan->kecamatan) }}">
                @error('kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Tinggi Air (cm)</label>
                <input type="number" class="form-control @error('tinggi_air') is-invalid @enderror" name="tinggi_air" value="{{ old('tinggi_air', $laporan->tinggi_air) }}">
                @error('tinggi_air') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="3">{{ old('keterangan', $laporan->keterangan) }}</textarea>
                @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Status Penanganan</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    @foreach(['Menunggu', 'Diproses', 'Selesai'] as $status)
                        <option value="{{ $status }}" {{ old('status', $laporan->status) == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Ganti Foto Bukti (Kosongkan jika tidak diganti)</label>
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Lama" width="120" class="rounded">
                </div>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
