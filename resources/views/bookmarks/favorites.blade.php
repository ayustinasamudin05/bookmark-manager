
@extends('layouts.app')

@section('title', 'Favorites - Bookmark Manager')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">My Favorites ⭐</h2>
    <p class="text-secondary">
        Kumpulan tautan yang kamu tandai sebagai favorit.
    </p>
</div>

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Favorite Bookmarks</h5>

        <span class="badge bg-warning-subtle text-warning-emphasis">
            {{ $bookmarks->count() }} Favorites
        </span>
    </div>

    @forelse ($bookmarks as $bookmark)
        <div class="border-bottom py-3">
            <div class="d-flex justify-content-between align-items-start gap-3">
                <div>
                    <h6 class="fw-bold mb-1">
                        {{ $bookmark->title }}
                        <span class="text-warning">★</span>
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

                <a href="{{ route('bookmarks.show', $bookmark->id) }}"
                   class="btn btn-sm btn-outline-primary">
                    Detail
                </a>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <div class="fs-1 mb-3">⭐</div>
            <h5 class="fw-bold">Belum ada favorit</h5>
            <p class="text-secondary">
                Tandai bookmark sebagai favorit agar mudah ditemukan di sini.
            </p>

            <a href="{{ route('bookmarks.index') }}"
               class="btn btn-primary">
                Lihat Semua Bookmark
            </a>
        </div>
    @endforelse

</div>

@endsection
