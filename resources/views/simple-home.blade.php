<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Signup</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }
        .signup-container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
        }
        .signup-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background-color: #ffffff;
        }
    </style>
</head>
<body>

<div class="signup-container">
    <div class="card signup-card">
        <div class="card-header bg-primary text-white text-center">
            <h3>Sign Up</h3>
            <p>Create your account</p>
        </div>
        <div class="card-body p-4">

            <!-- Alert untuk errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Registrasi Gagal!</h6>
                    <p class="mb-1">Berikut requirement untuk registrasi:</p>
                    <ul class="mb-0">
                        <li>Name wajib diisi</li>
                        <li>Email harus valid</li>
                        <li>Password minimal 8 karakter</li>
                        <li>Password harus mengandung huruf kecil, huruf besar, dan angka</li>
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('signup.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" required value="{{ old('name') }}" 
                           placeholder="Enter your full name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" required value="{{ old('email') }}" 
                           placeholder="Enter your email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" required 
                           placeholder="Enter your password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-text">
                        Password harus mengandung minimal 8 karakter, huruf kecil, huruf besar, dan angka.
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>