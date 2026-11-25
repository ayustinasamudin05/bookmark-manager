
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Bookmark Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            max-width: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: clip;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fb;
        }

        .auth-wrapper {
            width: 100%;
            min-height: 100vh;
            padding: 0;
            overflow: hidden;
        }

        .auth-row {
            width: 100%;
            min-height: 100vh;
            margin: 0;
        }

        .auth-banner {
            min-width: 0;
            background: linear-gradient(145deg, #172554, #3659c9);
            color: white;
            padding: 60px clamp(25px, 5vw, 70px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-banner h1 {
            font-size: clamp(30px, 3.2vw, 42px);
            font-weight: 800;
            line-height: 1.2;
            overflow-wrap: break-word;
        }

        .auth-banner p {
            color: #dbeafe;
            line-height: 1.8;
        }

        .auth-form {
            min-width: 0;
            background: white;
            padding: 55px clamp(25px, 5vw, 70px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-form-inner {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            min-width: 0;
        }

        .form-control {
            width: 100%;
            min-width: 0;
            padding: 13px 15px;
            border-radius: 10px;
        }

        .btn-primary {
            background: #3659c9;
            border-color: #3659c9;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #2746a8;
        }

        @media (max-width: 767px) {
            .auth-row {
                min-height: 100vh;
            }

            .auth-banner {
                padding: 35px 25px;
            }

            .auth-banner h1 {
                font-size: 30px;
            }

            .auth-form {
                padding: 40px 25px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid auth-wrapper">
        <div class="row auth-row">

            <div class="col-md-6 auth-banner">
                <div>
                    <div class="fs-1 mb-4">🔖</div>

                    <h1>Mulai Kelola Bookmark-mu dengan Lebih Teratur.</h1>

                    <p class="mt-4">
                        Buat akun dan nikmati kemudahan menyimpan,
                        mengelompokkan, serta mengakses semua tautan pentingmu.
                    </p>

                    <div class="mt-4">
                        <div class="mb-3">✓ Buat koleksi bookmark pribadi</div>
                        <div class="mb-3">✓ Kelompokkan tautan berdasarkan kategori</div>
                        <div>✓ Temukan tautan favorit dengan mudah</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 auth-form">
                <div class="auth-form-inner">

                    <h2 class="fw-bold mb-2">Create Account</h2>

                    <p class="text-secondary mb-4">
                        Daftar untuk mulai menggunakan Bookmark Manager.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Masukkan nama lengkap"
                                value="{{ old('name') }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="nama@email.com"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Minimal 8 karakter"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Konfirmasi Password</label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Masukkan ulang password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Daftar Sekarang
                        </button>
                    </form>

                    <p class="text-center text-secondary mt-4 mb-0">
                        Sudah memiliki akun?

                        <a href="{{ route('login') }}"
                           class="text-primary fw-semibold text-decoration-none">
                            Login di sini
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</body>
</html>
