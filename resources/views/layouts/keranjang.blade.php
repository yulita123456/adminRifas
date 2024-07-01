<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h4 class="offcanvas-title fw-semibold" id="offcanvasWithBothOptionsLabel">KERANJANG</h4>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php $total_harga = 0; ?>
    
    @if(auth()->check() && $dataKeranjang->isNotEmpty())
      @foreach($dataKeranjang as $item)
        <hr class="border border-secondary border-1 opacity-10">
        <div class="row produk-keranjang mb-4">
          <div class="col-md-4">
            <img src="{{ asset('assets/imgProduks/'.$item->gambar_produk) }}" class="card-img-top" alt="...">
          </div>
          <div class="col-md-6 lh-1">
            <p>{{ $item->nama_produk }}</p>
            <p style="color: #FFA3B2;">Rp {{ number_format($item->harga_kuantitas, 0, '.', '.') }}</p>
            <input type="number" class="rounded border-1" min="1" value="{{ $item->kuantitas }}" style="width: 6rem; height: 2rem" name="kuantitas">
          </div>
          <div class="col-md-2">
            <a class="nav-link text-dark fw-bold" href="{{ url('/hapus-keranjang', $item->id_keranjang) }}">Hapus</a>
          </div>
        </div>
        <!-- Menghitung total harga -->
        <?php $total_harga = $total_harga + $item->harga_kuantitas ?>
      @endforeach

      <div class="d-flex justify-content-between">
        <p class="fs-4">TOTAL</p>
        <p class="fs-4" style="color: #FFA3B2;">{{ number_format($total_harga, 0, '.', '.') }}</p>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <a class="btn btn-batal border-danger-subtle w-100 fw-semibold" href="{{ route('view-order') }}">Beli Sekarang</a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-simpan w-100 fw-semibold">Lanjut Belanja</a>
        </div>
      </div>
    @else
      <div class="text-center my-4 btn-keranjang-kosong">
        <img src="{{ asset('/assets/images/belanja.png') }}" alt="">
        <p class="fs-5">Keranjang Anda kosong.</p>
        <a class="btn" href="/semua" role="button">Belanja Sekarang</a>
      </div>
    @endif
  </div>
</div>
