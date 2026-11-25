
@extends('layouts.app')

@section('title', 'Detail Kategori - Bookmark Manager')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Detail Kategori</h2>
        <p class="text-secondary mb-0">
            Informasi kategori dan bookmark di dalamnya.
        </p>
    </div>

    <a href="{{ route('categories.index') }}"
       class="btn btn-outline-secondary">
        Kembali
    </a>
</div>

<div class="content-card mb-4">
    <div class="d-flex align-items-center gap-3 mb-3">
        <div class="rounded-3 bg-primary-subtle p-3">
            <span class="fs-3">📁</span>
        </div>

        <div>
            <h4 class="fw-bold mb-1">{{ $category->name }}</h4>
            <span class="text-secondary small">
                Dibuat {{ $category->created_at->format('d M Y') }}
            </span>
        </div>
    </div>

    <p class="text-secondary mb-4">
        {{ $category->description ?: 'Belum ada deskripsi kategori.' }}
    </p>

    <div class="d-flex gap-2">
        <a href="{{ route('categories.edit', $category->id) }}"
           class="btn btn-warning">
            Edit Kategori
        </a>

        <a href="{{ route('categories.index') }}"
           class="btn btn-outline-secondary">
            Kembali ke Daftar
        </a>
    </div>
</div>

<div class="content-card">
    <h5 class="fw-bold mb-3">Bookmark dalam Kategori Ini</h5>

    @forelse ($category->bookmarks as $bookmark)
        <div class="border-bottom py-3 d-flex justify-content-between align-items-center gap-3">
            <div>
                <h6 class="fw-semibold mb-1">
                    {{ $bookmark->title }}
                </h6>

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
    @empty
        <div class="text-center py-4">
            <p class="text-secondary mb-0">
                Belum ada bookmark dalam kategori ini.
            </p>
        </div>
    @endforelse
</div>

@endsection
