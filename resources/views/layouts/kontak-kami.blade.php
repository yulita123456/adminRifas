<svg xmlns="http://www.w3.org/2000/svg" style="margin-bottom: -1px;" viewBox="0 0 1440 320"><path fill="#FA2D93" fill-opacity="1" d="M0,64L80,58.7C160,53,320,43,480,58.7C640,75,800,117,960,122.7C1120,128,1280,96,1360,80L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
<div class="kontak-kami text-white" id="kontak-kami">
    @foreach($dataToko as $item)
    <div class="row pt-2 pb-5">
        <div class="col-4 mx-auto">
            <h1 class="fw-semibold">Kontak Kami</h1>
            <div class="info">
                <p class="fs-5 fw-light">Untuk info lebih lanjut silahkan hubungi kontak dibawah ini</p>
                <div class="email d-flex align-items-center">
                    <i class="bi bi-envelope fs-1"></i>
                    <p class="ms-2 fs-5 m-auto">{{ $item->email_toko }}</p>
                </div>
                <div class="lokasi d-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1"></i>
                    <p class="ms-2 fs-5 m-auto">{{ $item->alamat_toko }}</p>
                </div>
            </div>
        </div>
        <div class="col-4 mx-auto">
            <form action="" class="bg-white p-3 rounded">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nama" name="nama">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" placeholder="No Hp" name="no_hp">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="3" placeholder="Pesan..." name="pesan"></textarea>
                </div>
                <button type="submit" class="btn">Kirim</button>
            </form>
        </div>
    </div>
    @endforeach
</div>