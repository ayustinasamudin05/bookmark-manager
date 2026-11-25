
@extends('layouts.app')

@section('title', 'Tambah Bookmark - Bookmark Manager')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Tambah Bookmark</h2>
    <p class="text-secondary">
        Simpan tautan baru ke koleksi bookmark milikmu.
    </p>
</div>

<div class="content-card" style="max-width: 850px;">

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

    <form action="{{ route('bookmarks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul Bookmark</label>
            <input
                type="text"
                name="title"
                class="form-control"
                placeholder="Contoh: Laravel Documentation"
                value="{{ old('title') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">URL</label>
            <input
                type="url"
                name="url"
                class="form-control"
                placeholder="https://example.com"
                value="{{ old('url') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @if ($categories->isEmpty())
                <small class="text-danger">
                    Kamu belum memiliki kategori.
                    <a href="{{ route('categories.create') }}">Buat kategori terlebih dahulu.</a>
                </small>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea
                name="description"
                class="form-control"
                rows="4"
                placeholder="Tambahkan catatan singkat tentang tautan ini..."
            >{{ old('description') }}</textarea>
        </div>

        <div class="form-check mb-4">
            <input
                type="checkbox"
                name="is_favorite"
                value="1"
                class="form-check-input"
                id="is_favorite"
                {{ old('is_favorite') ? 'checked' : '' }}
            >

            <label class="form-check-label" for="is_favorite">
                Tandai sebagai favorit ⭐
            </label>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">
                Simpan Bookmark
            </button>

            <a href="{{ route('bookmarks.index') }}"
               class="btn btn-outline-secondary">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
