
@extends('layouts.app')

@section('title', 'My Bookmarks - Bookmark Manager')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">My Bookmarks</h2>
        <p class="text-secondary mb-0">
            Kelola semua tautan yang telah kamu simpan.
        </p>
    </div>

    <a href="{{ route('bookmarks.create') }}" class="btn btn-primary">
        + Tambah Bookmark
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="content-card mb-4">
    <form action="{{ route('bookmarks.index') }}" method="GET">
        <div class="row g-3">
            <div class="col-md-5">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul atau URL bookmark..."
                    value="{{ $query ?? '' }}"
                >
            </div>

            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="">Semua Kategori</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ ($categoryId ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    Filter
                </button>

                <a href="{{ route('bookmarks.index') }}"
                   class="btn btn-outline-secondary">
                    Reset
                </a>
            </div>
        </div>
    </form>
</div>

<div class="content-card">
    <h5 class="fw-bold mb-3">Daftar Bookmark</h5>

    @forelse ($bookmarks as $bookmark)
        <div class="border-bottom py-3">
            <div class="d-flex justify-content-between align-items-start gap-3">
                <div>
                    <h6 class="fw-bold mb-1">
                        {{ $bookmark->title }}

                        @if ($bookmark->is_favorite)
                            <span class="text-warning">★</span>
                        @endif
                    </h6>

                    <span class="badge bg-primary-subtle text-primary mb-2">
                        {{ $bookmark->category->name }}
                    </span>

                    <p class="text-secondary small mb-2">
                        {{ $bookmark->description ?: 'Tidak ada deskripsi.' }}
                    </p>

                    <a href="{{ $bookmark->url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="small text-decoration-none">
                        {{ $bookmark->url }}
                    </a>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('bookmarks.show', $bookmark->id) }}"
                       class="btn btn-sm btn-outline-primary">
                        Detail
                    </a>

                    <a href="{{ route('bookmarks.edit', $bookmark->id) }}"
                       class="btn btn-sm btn-outline-warning">
                        Edit
                    </a>

                    <form action="{{ route('bookmarks.destroy', $bookmark->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus bookmark ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <h5 class="fw-semibold">Belum ada bookmark</h5>
            <p class="text-secondary">
                Mulai simpan tautan favoritmu sekarang.
            </p>

            <a href="{{ route('bookmarks.create') }}" class="btn btn-primary">
                Tambah Bookmark
            </a>
        </div>
    @endforelse
</div>

@endsection
