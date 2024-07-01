<?php

namespace App\Http\Controllers;

use App\Models\countLogin;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class dashboardController extends Controller
{
    public function __construct()
    {
        $dataOrderBaru = order::whereIn('status', ['Sudah bayar', 'Belum bayar'])->get();

        view()->share('dataOrderBaru', $dataOrderBaru);
    }


    public function index()
    {
        // Ambil semua data user registrasi
        $dataUserRegistrasi = User::all();

        // Query untuk menggabungkan total_harga dan total_login
        $userOrder = DB::table('users')
        ->select(
            'users.id', // Pastikan id diambil untuk digunakan dalam normalisasi atau algoritma
            'users.name as nama_user',
            DB::raw('COALESCE(countLogin.countLogin, 0) as countLogin'),
            DB::raw('SUM(order.total_harga) as total_harga')
        )
        ->leftJoin('order', 'users.id', '=', 'order.id_user')
        ->leftJoin('countLogin', 'users.id', '=', 'countLogin.id_user')
        ->groupBy('users.id', 'users.name', 'countLogin.countLogin')
        ->orderBy('users.id')
        ->get();


        // Hitung pendapatan dari order dengan status 'dikirim'
        $pendapatan = Order::where('status', 'dikirim')->sum('harga_produk');

        // Bobot kriteria untuk algoritma pengambilan keputusan
        $weights = [0.7,0.3]; // Sesuaikan bobot sesuai dengan kebutuhan

        // Normalisasi matriks keputusan (jika diperlukan)
        $alternatives = [];
        foreach ($userOrder as $user) {
            $totalHarga = $user->total_harga;
            $totalLogin = $user->countLogin;

            // Buat array asosiatif untuk setiap user
            $alternatives[] = [
                'user_id' => $user->id,
                'nama_user' => $user->nama_user,
                'total_harga' => $totalHarga,
                'total_login' => $totalLogin,
            ];
        }

        // Normalisasi matriks keputusan (misalnya, menggunakan nilai maksimum)
        $normalizedMatrix = [];
        $maxShopping = max(array_column($alternatives, 'total_harga'));
        $maxLoginFrequency = max(array_column($alternatives, 'total_login'));
        foreach ($alternatives as $index => $alternative) {
            $normalizedMatrix[$index]['total_harga'] = $alternative['total_harga'] / $maxShopping;
            $normalizedMatrix[$index]['total_login'] = $alternative['total_login'] / $maxLoginFrequency;
        }

        // Menghitung nilai akhir dengan algoritma pengambilan keputusan
        $finalScores = [];
        foreach ($normalizedMatrix as $index => $normalizedValues) {
            $finalScores[$index] = 0;
            foreach ($weights as $criteriaIndex => $weight) {
                $finalScores[$index] += $weight * $normalizedValues['total_harga']; // Menggunakan total_harga sebagai salah satu kriteria
                $finalScores[$index] += $weight * $normalizedValues['total_login']; // Menggunakan total_login sebagai salah satu kriteria
            }
        }

        // Menentukan alternatif terbaik (misalnya, berdasarkan nilai akhir tertinggi)
        $bestAlternativeIndex = array_keys($finalScores, max($finalScores))[0];

        // Set informasi diskon untuk user terpilih
        foreach ($userOrder as $index => $item) {
            $item->diskon = ($index === $bestAlternativeIndex) ? 'Dapat Diskon' : 'Tidak ada diskon';
        }

        // Mengirimkan data ke view
        $labels = ['User Registrasi', 'User Order'];
        $data = [
            'total_user_registrasi' => $dataUserRegistrasi->count(),
            'total_user_order' => count($userOrder),
        ];

        // untuk menampilkan last_seen user
        $user = User::orderBy('last_seen', 'DESC')->get();

        return view('admin.index', compact('labels', 'data', 'userOrder', 'user'));
    }


    public function dataOrder()
    {
        $orders = order::all();

        return response()->json($orders);
    }
}
