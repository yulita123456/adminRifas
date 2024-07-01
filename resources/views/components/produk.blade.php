<div class="kumpulan-produk grid mt-5 mb-2 ms-3 me-3">
  <h3 class="text-center">Produk Terlaris</h3>
  <div class="row mb-4">
    @foreach($dataProduk as $item)
    <div class="col-2 mb-4">
      <div class="card">
        <a href="{{ route('produk.show', ['id' => $item->id_produk]) }}">
          <img src="{{ asset('assets/imgProduks/'.$item->gambar_produk) }}" class="card-img-top" height="200px" alt="...">
        </a>
        <div class="card-body">
          <a href="{{ route('produk.show', ['id' => $item->id_produk]) }}" class="text-decoration-none">
            <p class="card-title fw-semibold text-black">{{ $item->nama_produk }}</p>
            <p class="card-text text-dark text-truncate" style="font-size:smaller;">{{ $item->deskripsi_produk }}</p>
          </a>
          <a href="{{ route('produk.show', ['id' => $item->id_produk]) }}" class="text-decoration-none">
            <p class="card-text text-dark fs-5 fw-semibold">{{ number_format($item->harga_produk, 0, '.', '.') }}</p>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>