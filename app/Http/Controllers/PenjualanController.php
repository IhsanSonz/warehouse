<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $penjualans = Penjualan::with('transaksi_stoks')
            ->when(!empty($request->s), function($query) use ($request) {
                $search = $request->s;
                return $query->where('nama_barang', 'like', "%$search%");
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        foreach ($penjualans as $penjualan) {
            $penjualan['date'] = \Carbon\Carbon::parse($penjualan->transaksi_stoks->tgl_transaksi)->setTimezone('Asia/Jakarta')->format('d M Y');
            $penjualan['time'] = \Carbon\Carbon::parse($penjualan->transaksi_stoks->tgl_transaksi)->setTimezone('Asia/Jakarta')->format('g:i A');
        }
        // echo '<pre>';
        // print_r($penjualans->toArray());
        // echo '</pre>';

        // return dd($penjualans);

        return view('pages.penjualan', [
            'asset' => 'barang/barang',
            'search'        => $request->s,
            'penjualans'    => $penjualans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
