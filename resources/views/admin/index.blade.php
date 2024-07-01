@extends('template.admin')

@section('title', 'Dashboard admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid">
    <div class="row">
        @include('components.sidebar-admin')
        <div class="col kolom-kanan">
            <div class="row" style="background-color: #FA2D93; height:5rem;">
                <p class="fs-3 text-white m-auto">Dashboard Admin</p>
            </div>


            <!-- Button trigger modal -->
            <button type="button" class="btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #FA2D83; color:#fff;">
                User Registrasi <i class="bi bi-chevron-right ps-3"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Total Pembelian</th>
                                        <th scope="col">Frekuensi Login</th>
                                        <th scope="col">Eligible Diskon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userOrder as $item)
                                    <tr>
                                        <td>{{ $item->nama_user }}</td>
                                        <td>{{ $item->total_harga}}</td>
                                        <td>{{ $item->countLogin}}</td>
                                        <td>{{ $item->diskon}}</td>


                                        {{-- <td>{{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</td>
                                        <td class="text-center">
                                            <span class="bg-{{ $item->last_seen >= now()->subMinutes(2) ? 'success' : 'danger' }} p-2 rounded text-white">
                                                {{ $item->last_seen >= now()->subMinutes(2) ? 'Online' : 'Offline' }}
                                            </span>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <canvas id="chartUser"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card text-center">
                        <div class="card-body">
                            <canvas id="chartIncome"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

            {{-- <script>
                const ctx = document.getElementById('chartUser');

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['User Registrasi', 'User Order'],
                        datasets: [{
                            data: [@json($data[0]), @json($data[1])],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                            ],
                        }]
                    },
                    options: {
                        cutout: '60%', // Mengatur ukuran hole pada tengah donat
                        responsive: true,
                    }
                });



                // GRAFIK TOTAL PENDAPATAN PERHARI
                const ctx2 = document.getElementById('chartIncome').getContext('2d');

                // Ambil data dari route Laravel
                fetch('/orders')
                    .then(response => response.json())
                    .then(data => {
                        // Proses data untuk mendapatkan total per hari
                        var dailyTotals = {};

                        data.forEach(order => {
                            var tanggal = moment(order.created_at, 'YYYY-MM-DDTHH:mm:ss.SSSZ').format('DD MMM YYYY HH:mm');

                            var harga = parseFloat(order.harga_produk); // Sesuaikan dengan atribut di model Anda

                            if (dailyTotals[tanggal]) {
                                dailyTotals[tanggal] += harga;
                            } else {
                                dailyTotals[tanggal] = harga;
                            }
                        });

                        // Konversi data ke format yang bisa digunakan oleh Chart.js
                        var labels = Object.keys(dailyTotals);
                        var chartData = {
                            labels: labels,
                            datasets: [{
                                label: 'Total Pendapatan Per Hari',
                                data: Object.values(dailyTotals),
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        };

                        var options = {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        };

                        var myChart = new Chart(ctx2, {
                            type: 'bar',
                            data: chartData,
                            options: options
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));
            </script> --}}

        </div>
    </div>
</div>
@endsection
