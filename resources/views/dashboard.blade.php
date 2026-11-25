
@extends('layouts.app')

@section('title', 'Dashboard - Bookmark Manager')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Dashboard</h2>
    <p class="text-secondary">
        Selamat datang kembali, {{ auth()->user()->name }}!
        Berikut ringkasan koleksi bookmark kamu.
    </p>
</div>

<div class="content-card mb-4">
    <h5 class="fw-bold">Welcome to Bookmark Manager! 👋</h5>
    <p class="text-secondary mb-0">
        Simpan, kelola, dan temukan kembali tautan pentingmu
        dalam satu tempat dengan lebih mudah.
    </p>
</div>

<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="stat-card h-100">
            <div class="text-secondary small">Total Bookmarks</div>
            <div class="fs-2 fw-bold text-primary mt-2">
                {{ $totalBookmarks }}
            </div>
            <small class="text-secondary">Semua tautan tersimpan</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card h-100">
            <div class="text-secondary small">Total Categories</div>
            <div class="fs-2 fw-bold text-success mt-2">
                {{ $totalCategories }}
            </div>
            <small class="text-secondary">Kategori yang dibuat</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card h-100">
            <div class="text-secondary small">Favorite Bookmarks</div>
            <div class="fs-2 fw-bold text-warning mt-2">
                {{ $totalFavorites }}
            </div>
            <small class="text-secondary">Tautan favoritmu</small>
        </div>
    </div>

</div>

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold mb-1">Bookmark Terbaru</h5>
            <p class="text-secondary small mb-0">
                Lima tautan terakhir yang kamu simpan.
            </p>
        </div>

        <a href="{{ route('bookmarks.index') }}"
           class="btn btn-sm btn-primary">
            Lihat Semua
        </a>
    </div>

    @forelse ($recentBookmarks as $bookmark)
        <div class="border-bottom py-3 d-flex justify-content-between align-items-center gap-3">

            <div>
                <h6 class="fw-semibold mb-1">
                    {{ $bookmark->title }}

                    @if ($bookmark->is_favorite)
                        <span class="text-warning">★</span>
                    @endif
                </h6>

                <small class="text-secondary">
                    {{ $bookmark->category->name }}
                </small>
            </div>

            <a href="{{ route('bookmarks.show', $bookmark->id) }}"
               class="btn btn-sm btn-outline-primary">
                Detail
            </a>

        </div>
    @empty
        <div class="text-center py-4">
            <div class="fs-1 mb-2">🔖</div>
            <h6 class="fw-bold">Belum ada bookmark</h6>
            <p class="text-secondary">
                Mulai simpan tautan pertamamu.
            </p>

            <a href="{{ route('bookmarks.create') }}"
               class="btn btn-primary btn-sm">
                Tambah Bookmark
            </a>
        </div>
    @endforelse

</div>

@endsection
