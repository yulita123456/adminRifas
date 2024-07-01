<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">

    <title>Form Login</title>
</head>
<body>
    <div class="container">
        <div class="card login-form">           
            <div class="card-body">
                <h3 style="font-weight: bold;">Masuk</h3>
            <form action="{{ route('proses.login') }}" method="post">
                @csrf
                <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="background: rgba(235, 239, 184, 0.756)" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="exampleInputPassword1" style="background: rgba(235, 239, 184, 0.756)" placeholder="Kata Sandi" name="password">
                </div>

                <div class="d-flex justify-content-between">
                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">ingat saya</label>
                    </div>

                    <div>
                        <a href="{{ route('lupa.password.index') }}" class="link">Lupa Kata Sandi?</a>
                    </div>
                </div>

                <div class="d-grid mt-5">
                    <button type="submit" class="btn btn-success btn-login custom-button" style="background: rgba(230, 83, 176, 0.756)">Masuk</button>
                </div>

                <div class="mt-3 mt-3">
                    <div style="text-align: center;">
                        <span>atau masuk dengan</span>
                    </div>
                    <div class="d-grid mt-5 mb-5">
                        <button class="btn btn-light btn-gmail">
                        <img src="assets/images/google2.png" alt="Gmail" class="img-google me-2" style="max-width: 20px; max-height: 20px;"> Masuk dengan akun Google </button>
                    </div>                                    
                    <div style="text-align: center;">
                        <span style="font-weight: bold;">Belum punya akun?</span>
                    </div>
                    <div class="d-grid mt-5">
                        <a href="/register" class="btn btn-success btn-login custom-button" style="background: rgba(235, 239, 184, 0.756)">Daftar di sini</a>
                    </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>
</html>