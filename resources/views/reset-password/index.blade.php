<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">

    <title>Lupa Password</title>
</head>
<body>
    <div class="container">
        <div class="card">           
            <div class="card-body">
                <h3 style="font-weight: bold;">Lupa Password</h3>

                @if(session('success'))
                    <div class="alert alert-info">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('lupa.password.post') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="background: rgba(235, 239, 184, 0.756)" placeholder="Masukan email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputnamaLengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleInputnamaLengkap" style="background: rgba(235, 239, 184, 0.756)" placeholder="Masukan nama" name="nama_lengkap" required>
                    </div>
                    <div class="d-grid mt-5">
                        <button type="submit" class="btn btn-success btn-login custom-button" style="background: rgba(230, 83, 176, 0.756)">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
