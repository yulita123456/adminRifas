<div class="tentang-kami" id="tentang-kami">
    @foreach($dataToko as $item)
    <div class="row text-justify">
        <div class="slogan text-start ms-4">
            <p>Perfect Yourself</p>
            <p>Achieve True Beauty</p>
        </div>
        <div class="col-4 position-relative ms-5">
            <div class="shadow card border border-white border-5" style="width: 22rem; height: 12rem; margin-top: 9rem;">
            </div>
            <div class="card position-absolute top-0 start-5 border border-5 border-white" style="width: 22rem; height: 20rem; transform: rotate(-8.65deg);">
                <img src="{{asset('assets/images/'.$item->foto_ba)}}" class="card-img-top" alt="..." style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
        <div class="col-6 text-justify">
            <h2 class="fw-semibold fs-1">Flo Beauty Bar</h2>
            <p class="fs-5">{{ $item->tentang_toko }}</p>
        </div>
    </div>
    @endforeach
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFC8C6" fill-opacity="1" d="M0,64L80,58.7C160,53,320,43,480,58.7C640,75,800,117,960,122.7C1120,128,1280,96,1360,80L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>