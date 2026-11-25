
@extends('layouts.app')

@section('title', 'Edit Bookmark - Bookmark Manager')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Edit Bookmark</h2>
    <p class="text-secondary">
        Perbarui informasi bookmark yang telah kamu simpan.
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

    <form action="{{ route('bookmarks.update', $bookmark->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul Bookmark</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $bookmark->title) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">URL</label>
            <input
                type="url"
                name="url"
                class="form-control"
                value="{{ old('url', $bookmark->url) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $bookmark->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea
                name="description"
                class="form-control"
                rows="4"
            >{{ old('description', $bookmark->description) }}</textarea>
        </div>

        <div class="form-check mb-4">
            <input
                type="checkbox"
                name="is_favorite"
                value="1"
                class="form-check-input"
                id="is_favorite"
                {{ old('is_favorite', $bookmark->is_favorite) ? 'checked' : '' }}
            >

            <label class="form-check-label" for="is_favorite">
                Tandai sebagai favorit ⭐
            </label>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">
                Simpan Perubahan
            </button>

            <a href="{{ route('bookmarks.index') }}"
               class="btn btn-outline-secondary">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
