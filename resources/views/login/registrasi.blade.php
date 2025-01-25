<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <h1 class="display-3 mb-4">Registrasi</h1>
            <form id="registrationForm" action="{{ route('login.store') }}" method="POST">
                @csrf

                <!-- Input Username (Email) -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Username" aria-label="Username" aria-describedby="basic-addon2" value="{{ old('email') }}" required>
                    <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                </div>
                @if ($errors->has('email'))
                    <div class="text-danger mb-3">{{ $errors->first('email') }}</div>
                @endif

                <!-- Input Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>

                <!-- Input Confirm Password -->
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    <div id="passwordError" class="text-danger mt-2" style="display:none;">Password tidak cocok!</div>
                </div>

                <!-- Alert Password Mismatch -->
                <div id="passwordMismatchAlert" class="alert alert-danger" style="display: none;">Pastikan password sama!</div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Daftar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/registrasi.js')}}"></script>
</body>
</html>
