<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\toko;

class tokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $dataToko = toko::all();
        $dataOrderBaru = order::whereIn('status', ['Sudah bayar', 'Belum bayar'])->get();
        view()->share(compact('dataToko', 'dataOrderBaru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.seting-toko-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'logo_toko' => 'image|mimes:jpeg,png,jpg|max:2048',
            'baner1' => 'image|mimes:jpeg,png,jpg|max:2048',
            'baner2' => 'image|mimes:jpeg,png,jpg|max:2048',
            'baner3' => 'image|mimes:jpeg,png,jpg|max:2048',
            'foto_ba' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $toko = toko::first();

        if($request->hasFile('logo_toko1')){
            // Proses unggah file baru
            $image = $request->file('logo_toko1');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/images'), $imageName);

            // Update nama gambar di database
            $toko->update(['logo_toko' => $imageName]);
        }

        if($request->hasFile('baner1')){
            $image = $request->file('baner1');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/images'), $imageName);

            $toko->update(['baner1' => $imageName]);
        }
        if($request->hasFile('baner2')){
            $image = $request->file('baner2');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/images'), $imageName);

            $toko->update(['baner2' => $imageName]);
        }
        if($request->hasFile('baner3')){
            $image = $request->file('baner3');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/images'), $imageName);

            $toko->update(['baner3' => $imageName]);
        }

        if($request->hasFile('foto_ba')){
            // Proses unggah file baru
            $image = $request->file('foto_ba');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/images'), $imageName);

            // Update nama gambar di database
            $toko->update(['foto_ba' => $imageName]);
        }

        $toko->update([
            'email_toko' => $request->email_toko,
            'alamat_toko' => $request->alamat_toko,
            'tentang_toko'=> $request->tentang_toko,
        ]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
