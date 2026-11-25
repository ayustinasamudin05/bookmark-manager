
@extends('layouts.app')

@section('title', 'Categories - Bookmark Manager')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">My Categories</h2>
        <p class="text-secondary mb-0">
            Kelompokkan bookmark agar lebih mudah ditemukan.
        </p>
    </div>

    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4">
    @forelse ($categories as $category)
        <div class="col-md-6 col-xl-4">
            <div class="content-card h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="rounded-3 bg-primary-subtle p-3">
                        <span class="fs-4">📁</span>
                    </div>

                    <span class="badge bg-light text-secondary">
                        {{ $category->bookmarks()->count() }} Bookmarks
                    </span>
                </div>

                <h5 class="fw-bold mb-2">
                    {{ $category->name }}
                </h5>

                <p class="text-secondary small mb-4">
                    {{ $category->description ?: 'Belum ada deskripsi kategori.' }}
                </p>

                <div class="d-flex gap-2 mt-auto">
                    <a href="{{ route('categories.show', $category->id) }}"
                       class="btn btn-sm btn-outline-primary">
                        Detail
                    </a>

                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="btn btn-sm btn-outline-warning">
                        Edit
                    </a>

                    <form action="{{ route('categories.destroy', $category->id) }}"
                          method="POST"
                          onsubmit="return confirm('Menghapus kategori ini juga akan menghapus seluruh bookmark di dalamnya. Lanjutkan?')">
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
        <div class="col-12">
            <div class="content-card text-center py-5">
                <div class="fs-1 mb-3">📂</div>
                <h5 class="fw-bold">Belum ada kategori</h5>
                <p class="text-secondary">
                    Buat kategori pertama untuk mengorganisasi bookmark kamu.
                </p>

                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    Buat Kategori
                </a>
            </div>
        </div>
    @endforelse
</div>

@endsection
