
@extends('layouts.app')

@section('title', 'Detail Bookmark - Bookmark Manager')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Detail Bookmark</h2>
        <p class="text-secondary mb-0">
            Informasi lengkap tautan yang kamu simpan.
        </p>
    </div>

    <a href="{{ route('bookmarks.index') }}"
       class="btn btn-outline-secondary">
        Kembali
    </a>
</div>

<div class="content-card" style="max-width: 900px;">

    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <span class="badge bg-primary-subtle text-primary mb-3">
                {{ $bookmark->category->name }}
            </span>

            <h3 class="fw-bold">
                {{ $bookmark->title }}

                @if ($bookmark->is_favorite)
                    <span class="text-warning">★</span>
                @endif
            </h3>
        </div>

        <a href="{{ route('bookmarks.edit', $bookmark->id) }}"
           class="btn btn-warning">
            Edit Bookmark
        </a>
    </div>

    <hr>

    <div class="mb-4">
        <label class="text-secondary small fw-semibold">
            URL BOOKMARK
        </label>

        <div class="mt-2">
            <a href="{{ $bookmark->url }}"
               target="_blank"
               rel="noopener noreferrer"
               class="text-decoration-none">
                {{ $bookmark->url }}
                ↗
            </a>
        </div>
    </div>

    <div class="mb-4">
        <label class="text-secondary small fw-semibold">
            DESKRIPSI
        </label>

        <p class="mt-2 mb-0">
            {{ $bookmark->description ?: 'Tidak ada deskripsi.' }}
        </p>
    </div>

    <div class="mb-4">
        <label class="text-secondary small fw-semibold">
            STATUS
        </label>

        <p class="mt-2 mb-0">
            @if ($bookmark->is_favorite)
                <span class="badge bg-warning-subtle text-warning-emphasis">
                    ★ Favorite
                </span>
            @else
                <span class="badge bg-secondary-subtle text-secondary">
                    Regular Bookmark
                </span>
            @endif
        </p>
    </div>

    <div>
        <label class="text-secondary small fw-semibold">
            TANGGAL DITAMBAHKAN
        </label>

        <p class="mt-2 mb-0">
            {{ $bookmark->created_at->format('d F Y, H:i') }}
        </p>
    </div>

</div>

@endsection
