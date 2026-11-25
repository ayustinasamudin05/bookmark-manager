
@extends('layouts.app')

@section('title', 'Tambah Kategori - Bookmark Manager')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Tambah Kategori</h2>
    <p class="text-secondary">
        Buat kategori baru untuk mengelompokkan bookmark.
    </p>
</div>

<div class="content-card" style="max-width: 750px;">

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali input kamu:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kategori</label>
            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Contoh: Programming"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea
                name="description"
                class="form-control"
                rows="4"
                placeholder="Jelaskan isi kategori ini..."
            >{{ old('description') }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">
                Simpan Kategori
            </button>

            <a href="{{ route('categories.index') }}"
               class="btn btn-outline-secondary">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
