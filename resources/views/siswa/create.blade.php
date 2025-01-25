<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Create</title>
</head>
<body>
    <div class="container-fluid">
        <div class="container mt-5">
            <form action="{{ route('siswa.create') }}" method="POST">
                @csrf
                <!-- Display success message -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Display error messages -->
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <label for="nama_depan" class="form-label">Nama Depan</label>
                <input type="text" class="form-control" id="nama_depan" aria-describedby="nama_depan" name="nama_depan">
                @error('nama_depan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="nama_belakang" class="form-label">Nama Belakang</label>
                <input type="text" class="form-control" id="nama_belakang" aria-describedby="nama_belakang" name="nama_belakang">
                @error('nama_belakang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" aria-describedby="jenis_kelamin" name="jenis_kelamin">
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control" id="agama" aria-describedby="agama" name="agama">
                @error('agama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" aria-describedby="alamat" name="alamat">
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-success mt-5">Simpan</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>