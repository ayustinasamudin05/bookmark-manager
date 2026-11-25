
@extends('layouts.app')

@section('title', 'Edit Kategori - Bookmark Manager')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Edit Kategori</h2>
    <p class="text-secondary">
        Perbarui informasi kategori yang sudah kamu buat.
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

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kategori</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $category->name) }}"
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
            >{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">
                Simpan Perubahan
            </button>

            <a href="{{ route('categories.index') }}"
               class="btn btn-outline-secondary">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
